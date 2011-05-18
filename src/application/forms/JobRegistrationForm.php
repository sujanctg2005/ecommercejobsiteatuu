<?php

class Application_Form_JobRegistrationForm extends Zend_Form
{
    public function init()
    {
        $jobcategory = $this->getComboBox('jobcategory', 'Job Category',
                $this->getJobCategoryList(), true);

        $jobtitle = $this->getTextElement('jobtitle','Job Title', true);
        $jobdescription = $this->getTextElement('jobdescription','Job Description', false);

        $agefrom = $this->getComboBox('agefrom', 'Age From',
                range(18,90), true);

        $ageto = $this->getComboBox('ageto', 'Age To', range(18,90), true);

        $vacancynumber = $this->getComboBox('vacancynumber','Number of Vacancy',range(1,100), true);

        $deadline = $this->getTextElement('deadline','Application Deadline', true);

        $billingcontact = $this->getTextElement('billingcontact','Billing Contact', true);

        $designation = $this->getTextElement('designation','Designation', true);

        $gender = $this->getComboBox('gender', 'Gender', array('Any','Male Only','Female Only'), true);

        $jobtype = $this->getComboBox('jobtype', 'Job Type', array('Full Time','Part Time','Contract'), true);

        $experience = $this->getTextElement('experience', 'Years Of Experience', true);

        $benefits = $this->getTextElement('benefits', 'Benefits', false);

         $submit = new Zend_Form_Element_Submit('Submit');
        
        $this->addElements(array(
            $jobcategory,
            $jobtitle,
            $jobdescription,
            $agefrom,
            $ageto,
            $vacancynumber,
            $deadline,
            $billingcontact,
            $designation,
            $gender,
            $jobtype,
            $experience,
            $benefits,
            $submit
            ));
    }

    private function getJobCategoryList()
    {
        $category = array();

        array_push($category, 'Accounting');
        array_push($category, 'Banking');
        array_push($category, 'Technology');
        array_push($category, 'Education');
        array_push($category, 'Engineering');
        array_push($category, 'Marketing');
        array_push($category, 'Textile');

        return $category;

    }

    private function getTextElement($name, $label, $required)
    {
        $element = new Zend_Form_Element_Text($name);
        $element->setLabel($label);
        $element->setRequired($required)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        return $element;
    }

    private function getComboBox($name, $label, $values, $required)
    {
        $element = new Zend_Form_Element_Select($name);
        $element ->setLabel($label)
                ->setRequired($required)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions($values);

        return $element;
    }

    public function getComboboxValue($name)
    {
        $option = $this->getElement($name)->getMultiOptions();
        return $option[$this->getValue($name)];

    }
}


?>
