<?

interface ViewerInterface {
    
    public function allChatsPage(array $chats): void;
    
    public function pageHeader(string $title): void;
    
    public function pageFooter(): void;
}

?>