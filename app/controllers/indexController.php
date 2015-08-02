<?php

    class Index extends Mini\BaseController {

        public function main() {
            $sqlManager = Mini\SqlManager::instance();
            $sqlManager->configMaster(
                'localhost',
                'testing',
                'root',
                '123456'
            );
            $sqlManager->insert('test', array(
                'id' => NULL,
                'data' => 'works'
            ));
            $this->viewManager->setViewFolder('default');
            $this->viewManager->bind('var', 'TWIG IS WORKING!!!');
            $this->viewManager->loadView('index.html');
        }

    }
