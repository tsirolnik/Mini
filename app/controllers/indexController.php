<?php

    class Index extends Mini\BaseController {

        public function main() {
            $this->viewManager->setViewFolder('default');
            $this->viewManager->bind('var', $results[0]['data']);
            $this->viewManager->loadView('index.html');
        }

    }
