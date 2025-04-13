<?php

class AuthToken{
    
    private $id;
    private $token;
    private $sessionToken;
    private $timeSession;
    private $flagRetorno;
    
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getToken() {
        return $this->token;
    }
    function setToken($token) {
        $this->token = $token;
    }
    function getSessionToken() {
        return $this->sessionToken;
    }
    function setSessionToken($sessionToken) {
        $this->sessionToken = $sessionToken;
    }
    function getTimeSession() {
        return $this->timeSession;
    }
    function setTimeSession($timeSession) {
        $this->timeSession = $timeSession;
    }
    function getFlagRetorno() {
        return $this->flagRetorno;
    }
    function setFlagRetorno($flagRetorno) {
        $this->flagRetorno = $flagRetorno;
    }

}

