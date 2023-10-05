<?

class Model {
    
    public $dbHandler;
    
    function __construct() {
        
        // Устанавливаем соединение с базой данных
        // и создаём идентификатор соединения
        $this->dbHandler = $this->connectToDb();
    }
    
    // Устанавливаем соединение с базой данных
    public function connectToDb() {
        
        $mysqli = new mysqli('localhost', 'root', 'qwerty', 'messenger');
        
        if (!$mysqli) {
            http_response_code(503);
            header((SAPI_NAME == 'cgi' || SAPI_NAME == 'cgi-fcgi' ? 'Status:' : $_SERVER['SERVER_PROTOCOL']).' 503 Service Temporarily Unavailable'); // не обязательно
            header('Retry-After: 3600');
            header('Content-type: text/html; charset=utf-8');
            exit('Сайт временно не работает. Зайдите, пожалуйста, позже.');
        }
        mysqli_set_charset($mysqli, 'utf8mb4');
        mysqli_query($mysqli, 'SET SQL_BIG_SELECTS=1');
        
        return $mysqli;
    }
    
    // Получаем все чаты владельца аккаунта
    public function loadAllChats(int $accountOwner_id): array {
        
        // Вариант 1 запроса к БД
        $query1 = '
        SELECT
            `subquery`.`respondent_id`,
            `subquery`.`datetime`,
            `m`.`text`,
            `users`.`name` `respondent_name`,
            IF(`m`.`from_user_id` = '.$accountOwner_id.', "outgoing", "incoming") `direction`
        
        FROM (
            SELECT
                CASE
                    WHEN `m`.`from_user_id` = '.$accountOwner_id.' THEN `m`.`to_user_id`
                    ELSE `m`.`from_user_id`
                END AS `respondent_id`,
                MAX(`m`.`datetime`) `datetime`
            FROM `messages` `m`
            WHERE `m`.`from_user_id` = '.$accountOwner_id.' OR `m`.`to_user_id` = '.$accountOwner_id.'
            GROUP BY `respondent_id`
        ) AS `subquery`
        
        LEFT JOIN `messages` `m` ON (
            (`m`.`from_user_id` = '.$accountOwner_id.' AND `m`.`to_user_id` = `subquery`.`respondent_id`) OR
            (`m`.`to_user_id` = '.$accountOwner_id.' AND `m`.`from_user_id` = `subquery`.`respondent_id`)
        ) AND `m`.`datetime` = `subquery`.`datetime`
        
        LEFT JOIN `users` ON `users`.`id` = `subquery`.`respondent_id`';
        
        // Вариант 2 запроса к БД
        $query2 = '        
        WITH
        
            `cte1` AS (
                
                SELECT 
                    `to_user_id` AS `respondent_id`, 
                    `text`, 
                    `datetime`,
                    "outgoing" AS `direction`
                FROM `messages`
                WHERE `from_user_id` = '.$accountOwner_id.'
                
                UNION ALL
                
                SELECT 
                    `from_user_id`, 
                    `text`, 
                    `datetime`,
                    "incoming" AS `direction`
                FROM `messages`
                WHERE `to_user_id` = '.$accountOwner_id.'
            ),
            
            `cte2` AS (
                
                SELECT 
                    `respondent_id`, 
                    `text`, 
                    `datetime`, 
                    `direction`,
                    ROW_NUMBER() OVER `w` AS `row_num`
                FROM `cte1`
                WINDOW `w` AS (
                    PARTITION BY `respondent_id`
                    ORDER BY `datetime` DESC
                )
            )
            
        SELECT 
            `respondent_id`, 
            `users`.`name` `respondent_name`, 
            `text`, 
            `datetime`, 
            `direction`
        FROM `cte2`
        LEFT JOIN `users` ON `users`.`id` = `respondent_id`
        WHERE `row_num` = 1';
        
        // Получаем все последние сообщения с участием владельца аккаунта
        $q = $this->dbHandler->query($query1);
        
        for ($chats = []; $row = $q->fetch_assoc(); $chats[] = $row);
        
        return $chats;
    }
    
    // Получаем все беседы владельца аккаунта с респондентом с данным ID
    public function loadChat(int $accountOwner_id, int $respondent_id): array {
        
        $q = $this->dbHandler->query('
        SELECT 
            `text`, 
            `datetime`, 
            IF(`from_user_id` = '.$accountOwner_id.', "outgoing", "incoming") `direction`
        FROM `messages`
        WHERE 
            (`from_user_id` = '.$accountOwner_id.' AND `to_user_id`   = '.$respondent_id.') OR
            (`to_user_id`   = '.$accountOwner_id.' AND `from_user_id` = '.$respondent_id.')
        ORDER BY `datetime`');
        
        for ($messages = []; $row = $q->fetch_assoc(); $messages[] = $row);
        
        return $messages;
    }
    
    // Возвращаем имя юзера по запрошенному ID
    public function getUserName(int $user_id): string {
        
        $q = $this->dbHandler->query('
        SELECT `name` 
        FROM `users`
        WHERE `id` = '.$user_id);
                
        return $q->fetch_assoc()['name'];
    }
}

?>
