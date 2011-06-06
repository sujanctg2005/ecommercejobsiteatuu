<?php

class Application_Form_JobSearchForm extends Zend_Form
{

    public function init()
    {

        $keyword = $this->getTextElement('keyword','Search Keyword', false);

        $listofjobcategories = $this->getJobCategories();

        $jobcategory = $this->getComboBox('jobcategory', 'Job Category',
                $listofjobcategories, false);
        $jobcategory->setValue(0);

        $employerlist = $this->getEmployerList();

        $employer = $this->getTextElement('employer', 'Company Name', false);
        
        $jobtypeoptions = array('Any','Part Time', "Full Time","Contract");

        $jobtype = new Zend_Form_Element_Radio('jobtype');
        $jobtype->addMultiOptions($jobtypeoptions)
                ->setLabel('Job Type')
                ->setValue(0);

        $salaryfrom = $this->getTextElement('salaryfrom', 'Salary From', false);
        $salaryfrom->addValidator('int');

        $salaryto = $this->getTextElement('salaryto', 'Salary To', false);
        $salaryto->addValidator('int');
        $experiencelist = $this->getExperienceList();

        $experience = $this->getComboBox('experience', 'Experience more than (in years)',$experiencelist, false);

        $sortbylist = $this->getSortByList();

        $sortby = $this->getComboBox('sortby', 'Sort By', $sortbylist, false);
        $sortby->setValue(0);

        $sortorder = $this->getComboBox('sortorder','Sort Order',array('Ascending','Descending'), false);
        $sortorder->setValue(0);

        $submit = new Zend_Form_Element_Submit('Search');

        $this->addElements(array(
                $keyword,
                $jobcategory,
                $jobtype,
                $employer,
                $salaryfrom,
                $salaryto,
                $experience,
                $sortby,
                $sortorder,
                $submit)
                );

    }

    private function getSortByList()
    {
        return array('Job Post Date','Job Title', 'Company Name','Application Deadline');
        
    }

    private function getExperienceList()
    {
        $result = array();
        array_push($result, 'Any');
        foreach(range(1,10) as $year)
        {
            array_push($result, $year . '+ Years');
        }
        array_push($result, 'Fresh Graduate');
        return $result;
    }

    private function getJobCategories()
    {
        $job = new Application_Model_JobsList();
        $output = array();
        array_push($output, 'All');
        return $this->getSingleArray($output,$job->getListOfJobCategory(),'JobCategory');
    }

    private function getEmployerList()
    {
        
        return range(1,10);
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

    private function getSingleArray($output, $result,$columnname)
    {
        foreach($result as $key=>$value)
        {
            array_push($output, $value[$columnname]);
        }
        return $output;
    }

    public function getQuery()
    {
        $querylist = array();
        foreach($this->getElements() as $element)
        {
            if($element->getType() == "Zend_Form_Element_Submit")
                    continue;
            $id = $element->getId();
            $value = $element->getValue();
            if($element->getType() == "Zend_Form_Element_Select" ||
                    $element->getType() == "Zend_Form_Element_Radio")
                    $value = $this->getComboboxValue ($id);
            if(strlen($value) > 0)
            {
                array_push($querylist, array($id, $value));
            }
        }
        return $querylist;
    }

    
    private function getExperience($value)
    {
        $result = array();
        if(preg_match('/[0-9]+/', $value, $result))
                return $result[0];
    }

   
    private function addTableInArray($array, $table, $tablealias)
    {
        if(array_key_exists($table, $array))
                return $array;

        array_push($array, array($tablealias=>$table));
        return $array;
    }
}
