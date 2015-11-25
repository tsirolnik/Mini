<?php

    class ErrorMonkey extends Mini\BaseModule {

        public function __construct() {
            parent::__construct();
            $this->errors = [];
        }


        public function add($error) {
            $this->errors[] = $error;
        }

        public function getErrorAt($index) {
            if(isset($this->errors[$index])) {
                return $this->errors[$index];
            }
            return NULL;
        }

        public function clear() {
            $this->errors = [];
        }

        public function unify($unifier) {
            return implode($this->errors, $unifier);
        }

        public function errorsExists() {
            return empty($this->errors);
        }
    }
