<?

class Presenter {
    
    private ViewerInterface $viewer;
    private Model $model;
    public AccountOwner $accountOwner;
    
    function __construct(Model $model) {
        $this->model = $model;
    }

    // Основной метод, с которого начинается программа
    public function run(AccountOwner $accountOwner): void {
        
        $this->accountOwner = $accountOwner;
        
        // Если через URL есть запрос на определённый чат, показываем беседу с выбранным респондентом
        if (isset($_GET['respondent']))
            $this->loadAndShowChat($_GET['respondent']);
        
        // Иначе показываем все чаты владельца аккаунта
        else
            $this->loadAndShowAllChats();
    }
    
    public function attachView(ViewerInterface $viewer): void {
        $this->viewer = $viewer;
    }
    
    // Получаем все чаты из Модели и отправляем их во Вьюер для отображения 
    public function loadAndShowAllChats(): void {
        
        // Запрашиваем через Модель все чаты владельца аккаунта
        $chats = $this->model->loadAllChats($this->accountOwner->getUserID());
        
        // Говорим Вьюеру отобразить страничку со всеми чатами
        $this->viewer->allChatsPage($chats);
    }
    
    public function loadAndShowChat($respondent_id): void {
        
        // Запрашиваем через Модель все беседы с конкретным респондентом
        $messages = $this->model->loadChat($this->accountOwner->getUserID(), $respondent_id);
        
        // Запрашиваем через Модель имя респондента
        $respondent_name = $this->model->getUserName($respondent_id);
        
        // Говорим Вьюеру отобразить страничку беседы с данным респондентом
        $this->viewer->chatPage($respondent_name, $messages);
    }
}

?>