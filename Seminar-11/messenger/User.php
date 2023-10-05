<?

class User {
    
    private int $user_id;
    private string $user_name;
    
    function __construct(int $user_id, string $user_name) {
        
        $this->user_id   = $user_id;
        $this->user_name = $user_name;
    }
    
    public function getUserID() {
        return $this->user_id;
    }

    public function setUserID($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }
}

?>