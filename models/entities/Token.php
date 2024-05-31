<?php

class Token{
    private $ID_user;
    private $reset_token_hash;
    private $reset_token_expires_at;

    public function __construct($ID_user, $reset_token_hash = null,  $reset_token_expires_at = null) {
        $this->ID_user = $ID_user;
        $this->reset_token_hash = $reset_token_hash;
        $this->reset_token_expires_at = $reset_token_expires_at;

    }

    public function getID_user() {
        return $this->ID_user;
    }

    public function getToken() {
        return $this->reset_token_hash;
    }

    public function getResetDate() {
        return $this->reset_token_expires_at;
    }
}

?>