<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $usertype = $this->createElement('hidden', 'usertype');
        $username = $this->createElement('text', 'username');
        $username ->setLabel('Username:')
                ->addValidator('alnum', true,
                array('messages'=>
                    array(Zend_validate_alnum::NOT_ALNUM => 'The username contains non alphanumeric character.')))
                ->addValidator('regex', true, array('/^[A-Za-z]+/',
                    'messages'=>array(Zend_Validate_Regex::NOT_MATCH => 'The username should start with alphabet.')
                    ))
                ->addValidator('stringLength', true, array('min'=>6,'max'=>20,
                    'messages'=>array(Zend_Validate_StringLength::TOO_LONG => 'The username cannot be more than 20 characters.',
                                Zend_Validate_StringLength::TOO_SHORT => 'The username should be atleast 6 characters long.')
                    ))
                ->addFilter('stripTags');


        $password = $this->createElement('password', 'password');
        $password->setLabel('Password:')
                ->addValidator('stringLength',false,array('min'=>6))
                ->setRequired(true);

        $submit = $this->createElement('submit', 'login', array('label'=>'Login'));

        $this->addElement($username)
             ->addElement($password)
             ->addElement($submit);

        $this->addDisplayGroup(array($usertype, $username, $password, $submit),'login1');

        $login = $this->getDisplayGroup('login1');

        $login->setDecorators(array('FormElements'));
    }


}

