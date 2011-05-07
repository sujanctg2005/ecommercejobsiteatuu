<?php

class Application_Form_CreateJobCategory extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('Add Job Category');

        $Job_Category_ID = new Zend_Form_Element_Hidden('JobCategoryID');

        $JobCategory = new Zend_Form_Element_Text('jobcategory');

        $JobCategory->setLabel('Job Category:)')
                    ->setRequired()
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($Job_Category_ID, $JobCategory, $submit));

    }


}
