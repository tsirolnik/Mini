<?php

    class InputHandler extends Mini\BaseModule {

        public function __construct() {
            parent::__construct();

            $this->blockXSS = true;
        }

        public function issetInput($inputArgs, $type = 'REQUEST') {
            $type = '_' . $type;
            foreach ($inputArgs as $key => $value) {
                if(!isset($GLOBALS[$type][$value])) {
                    return false;
                }
            }
            return true;
        }

        public function shouldBlockXSS($shouldBlock) {
            $this->blockXSS = $shouldBlock;
        }

        public function get($inputName) {
            return $this->getInput($inputName, 'GET');
        }

        public function post($inputName) {
            return $this->getInput($inputName, 'POST');
        }

        public function cookie($cookieName) {
            return $this->getInput($cookieName, 'COOKIE');
        }

        private function getInput($inputName, $type) {
            $type = '_' . $type;
            if(!isset($GLOBALS[$type][$inputName])) {
                return NULL;
            }
            if($this->blockXSS) {
                return  $this->blockXSS($GLOBALS[$type][$inputName]);
            }
            return $GLOBALS[$type][$inputName];
        }

        private function blockXSS($input) {
             return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }

    }
