<?php

class Application_Form_EmployeeProfile extends Zend_Form
{

    public function init()
    {
        $this->setName("EmployeeProfile");

        $userID = new Zend_Form_Element_Hidden("EmployeeID");
        $userID->addFilter('Int');
    }


}

