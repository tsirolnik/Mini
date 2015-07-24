<?php

    class Index extends Mini\BaseController {

        public function main() {
            $this->viewManager->setViewFolder('default');
            $this->viewManager->bind('var', 'TWIG IS WORKING!!!');
            $this->viewManager->loadView('index.html');
        }

    }
