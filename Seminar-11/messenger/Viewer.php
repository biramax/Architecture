<?

require_once 'ViewerInterface.php';

class Viewer implements ViewerInterface {
    
    // Страница всех чатов юзера
    public function allChatsPage(array $chats): void {
        
        $this->pageHeader('Мессенджер / Все беседы'); ?>
        
        <div class="add-chat">+</div>
        
        <h1>Беседы</h1>
        
        <div class="chats"><?
        
        foreach ($chats as $chat) { ?>
            
            <a href="?respondent=<?= $chat['respondent_id'] ?>">
                <span class="avatar"></span>
                <span class="details">
                    <span class="respondent"><?= $chat['respondent_name'] ?></span>
                    <span class="message"><?= $chat['text'] ?></span>
                </span>
                <span class="date"><span><?= date('d.m.Y H:i:s', strtotime($chat['datetime'])) ?></span></span>
            </a><?
        } ?>
        
        </div><?
        
        $this->pageFooter();
    }
    
    public function chatPage(string $respondent_name, array $messages): void {
        
        $this->pageHeader('Мессенджер / Беседа с '.$respondent_name); ?>
        
        <div class="chat-wrapper">
        
            <div>
        
                <div class="back">
                    <a href="/messenger/">← Беседы</a>
                </div>
                
                <h1>
                    <div class="avatar"></div>
                    <?= $respondent_name ?>
                </h1>
                
                <div class="chat"><?
                
                foreach ($messages as $message) { ?>
                    
                    <div class="<?= $message['direction'] ?>">
                        <div>
                            <div><?= $message['text'] ?></div>
                            <div class="date"><?= date('d.m.Y H:i:s', strtotime($message['datetime'])) ?></div>
                        </div>
                    </div><?
                } ?>
                
                </div>
            
            </div>
                        
            <div class="new-message">
                <div>+</div>
                <input placeholder="Сообщение" type="text" />
                <button type="button">Отправить</button>
            </div>
            
        </div><?

        $this->pageFooter();
    }
    
    public function pageHeader(string $title): void { ?>
    
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <title><?= $title ?></title>
            <style>
                html, body              { font: 16px/23px Tahoma, sans-serif; margin: 0; padding: 0 }
                .page-wrapper           { width: 800px; margin: 0 auto; padding: 40px; box-sizing: border-box }
                .avatar                 { float: left; width: 60px; height: 60px; background: #EEE; border-radius: 30px; margin-right: 20px }
                h1                      { font-size: 48px; line-height: 62px; font-weight: normal; margin-top: 0 }
                h1 .avatar              { width: 80px; height: 80px; border-radius: 40px; margin-right: 30px }
                
                .add-chat               { float: right; width: 60px; height: 60px; background: #2DA076; border-radius: 30px; color: #FFF; font-size: 60px; line-height: 50px; text-align: center; cursor: pointer }
                .back                   { margin-bottom: 30px }
                .back a                 { color: #000; text-decoration: none }
                
                .chats > a              { display: block; margin-bottom: 30px; display: flex; text-decoration: none }
                .chats > a .details     { flex-grow: 1 }
                .chats > a .respondent  { display: block; margin-bottom: 10px; font-size: 26px; font-weight: bold; line-height: 140%; color: #000 }
                .chats > a .message     { width: 600px; color: #666 }
                .chats > a .date        { text-align: right; display: flex; align-items: flex-start; margin-left: 40px; white-space: nowrap; margin-top: 40px }
                .chats > a .date > span { background: #EEE; color: #000; padding: 2px 6px; border-radius: 5px; font-size: 11px; line-height: 140% }
                
                .chat-wrapper           { display: flex; flex-direction: column; justify-content: space-between; height: calc(100vh - 80px) }
                .chat > div             { margin-bottom: 20px }
                .chat > div > div       { display: inline-block; background: #EEE; padding: 8px 16px; border-radius: 15px; max-width: 500px; font-size: 13px; line-height: 18px }
                .chat .outgoing         { text-align: right }
                .chat .outgoing > div   { background: #E7FAF3 }
                .chat .date             { margin-top: 10px; float: right; font-size: 10px; line-height: 140% }
                
                .new-message            { display: flex }
                .new-message div        { background: #EEE; border-radius: 5px; padding: 5px 12px; margin-right: 10px; cursor: pointer; font-size: 30px; line-height: 30px }
                .new-message input      { background: #EEE; border-radius: 5px; border: 0; width: 100%; flex-grow: 1; margin-right: 10px; padding: 5px 10px }
                .new-message button     { background: #2DA076; border-radius: 5px; color: #FFF; border: 0; padding: 5px 15px; font-weight: bold; cursor: pointer }
            </style>
        </head>
        <body>
            <div class="page-wrapper"><?
    }
    
    public function pageFooter(): void { ?>
            
            </div>
        </body>
        </html><?        
    }
}

?>