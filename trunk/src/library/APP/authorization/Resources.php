<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APP_Authorization_Resources
 *
 * @author Admin
 */
class APP_Authorization_Resources {

    public static function getListOfControllers() {
        $front = Zend_Controller_Front::getInstance();
        $controllers = array();
        foreach ($front->getControllerDirectory() as $module => $path) {
            foreach (scandir($path) as $file) {
                $controller = strtolower(substr($file, 0, strpos($file, "Controller")));
                if (strlen($controller) > 0)
                    array_push($controllers, $controller);
            }
        }

        return $controllers;
    }

    public static function getListOfActionsInController($controllername) {
        $actions = array();
        $controller = new ReflectionClass($controllername);
        foreach ($controller->getMethods() as $method) {
            if (strstr($method->name, 'Action')) {
                array_push($actions,
                        strtolower(
                                substr($method->name, 0,
                                        strpos($method->name, "Action")
                                )
                        )
                );
            }
        }
        return $actions;
    }

}
