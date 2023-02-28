<?php

    class SignupContr {
        private $uid; // private zodat alleen deze class de variabele kan gebruiken.
        private $pwd;
        private $pwdRepeat;
        private $email;

        public function __construct($uid, $pwd, $pwdRepeat, $email){ // variabelen in de contstruct zijn degene uit signup.inc.php, niet de private.
            $this->$uid = $uid; //$this gaat met -> zeggen dat de private $uid gelijk is aan de $uid uit de signup.inc.php
            $this->$pwd = $pwd; 
            $this->$pwdRepeat = $pwdRepeat; 
            $this->$email = $email; 
        }

        // checked of er een lege input is, zoja dan geeft hij false terug.
        private function emtpyInput(){
            $result = NULL; // gaat true or false terug geven
            if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email) ){
                $result = false; // als er een lege input is dan is het false
            }
            else{
                $result = true; // als er geen lege input is dan is het true
            }
            return $result; // geeft het resultaat terug
        }

        // checked of de email geldig is, zoja dan geeft hij true terug.
        private function invalidUid() {
            $result = NULL; // gaat true or false terug geven
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
                $result = false; // als de email niet geldig is dan is het false
            }
            else{
                $result = true; // als de email wel geldig is dan is het true
            }
            return $result; // geeft het resultaat terug
        }

        // checked of de email geldig is, zoja dan geeft hij true terug.
        private function invalidEmail() {
            $result = NULL; // gaat true or false terug geven
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false; // als de email niet geldig is dan is het false
            }
            else{
                $result = true; // als de email wel geldig is dan is het true
            }
            return $result; // geeft het resultaat terug
        }

        // checked of de wachtwoorden overeen komen, zoja dan geeft hij true terug.
        private function pwdMatch() {
            $result = NULL; // gaat true or false terug geven
            if($this->pwd !== $this->pwdRepeat){
                $result = false; // als de wachtwoorden niet overeen komen dan is het false
            }
            else{
                $result = true; // als de wachtwoorden wel overeen komen dan is het true
            }
            return $result; // geeft het resultaat terug
        }

        // checked of de gebruiker al bestaat, zoja dan geeft hij true terug.


    }

    