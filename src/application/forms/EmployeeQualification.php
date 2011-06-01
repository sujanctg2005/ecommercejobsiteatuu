<?php

class Application_Form_EmployeeQualification extends Zend_Form
{

    public function init()
    {
     $this->setName("EmployeeQualification");
        $this->setAction("");
        $this->setAttrib('enctype', 'multipart/form-data');

        // First Level Of Education
        $LOE = new Zend_Form_Element_Select('LevelOfEducation');
        $LOE->setLabel('Level Of Education:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(array('Doctorial','Masters','Bachelor',
                    'Higher Secondary', 'Secondary'));

        $Degree = new Zend_Form_Element_Select('DegreeTitle');
        $Degree->setLabel('Degree Title:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(array('Computer Science & Engineering',
                    'BioMedical','Civil Engineering',
                    'Banking', 'Agricultural'));;

        $Major = new Zend_Form_Element_Text('Major');
        $Major->setLabel('Major:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $InstitutionName = new Zend_Form_Element_Text('InstitutionName');
        $InstitutionName->setLabel('Institution Name:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Grade = new Zend_Form_Element_Text('Grade');
        $Grade->setLabel('Grade:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');


        $YearOfPassing = new Zend_Form_Element_Select('YearOfPassing');
        $YearOfPassing->setLabel('Year Of Passing:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setMultiOptions(range(1950,2020));

        $Duration = new Zend_Form_Element_Text('Duration');
        $Duration->setLabel('Duration:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        //Second Level Of Education

        $SecondLOE = new Zend_Form_Element_Select('SecondLevelOfEducation');
        $SecondLOE->setLabel('Level Of Education:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(array('Doctorial','Masters','Bachelor',
                    'Higher Secondary', 'Secondary'));

        $SecondDegree = new Zend_Form_Element_Select('SecondDegreeTitle');
        $SecondDegree->setLabel('Degree Title:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(array('Computer Science & Engineering',
                    'BioMedical','Civil Engineering',
                    'Banking', 'Agricultural'));;

        $SecondMajor = new Zend_Form_Element_Text('SecondMajor');
        $SecondMajor->setLabel('Major:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $SecondInstitutionName = new Zend_Form_Element_Text('SecondInstitutionName');
        $SecondInstitutionName->setLabel('Institution Name:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $SecondGrade = new Zend_Form_Element_Text('SecondGrade');
        $SecondGrade->setLabel('Grade:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');


        $SecondYearOfPassing = new Zend_Form_Element_Select('SecondYearOfPassing');
        $SecondYearOfPassing->setLabel('Year Of Passing:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setMultiOptions(range(1950,2020));

        $SecondDuration = new Zend_Form_Element_Text('SecondDuration');
        $SecondDuration->setLabel('Duration:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        //Professional Experience Qualification\
        $qualificationID = $this->createElement('hidden', 'qualificationID');
        $qualificationID->addFilter('Int');

        $Organization = new Zend_Form_Element_Text('Organization');
        $Organization->setLabel('Organization:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $OrganizationAddress = new Zend_Form_Element_Text('OrganizationAddress');
        $OrganizationAddress->setLabel('Organization Address:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $FromDate = new Zend_Form_Element_Select('FromDate');
        $FromDate->setLabel('From Date:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(range(1950,2020));

        $ToDate = new Zend_Form_Element_Select('ToDate');
        $ToDate->setLabel('To Date:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setMultiOptions(range(1950,2020));

        $SecondOrganization = new Zend_Form_Element_Text('SecondOrganization');
        $SecondOrganization->setLabel('Organization:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $SecondOrganizationAddress = new Zend_Form_Element_Text('SecondOrganizationAddress');
        $SecondOrganizationAddress->setLabel('Organization Address:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $SecondFromDate = new Zend_Form_Element_Select('SecondFromDate');
        $SecondFromDate->setLabel('From Date:')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(range(1950,2020));


        $SecondToDate = new Zend_Form_Element_Select('SecondToDate');
        $SecondToDate->setLabel('To Date:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setMultiOptions(range(1950,2020));

        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');

        $this->addElements(array($LOE, $Degree, $Major,
            $InstitutionName, $Grade, $YearOfPassing, $Duration,
            $SecondLOE, $SecondDegree, $SecondMajor,
            $SecondInstitutionName, $SecondGrade, $SecondYearOfPassing,
            $SecondDuration, $Organization, $OrganizationAddress,
            $FromDate, $ToDate, $SecondOrganization, $SecondOrganizationAddress,
            $SecondFromDate, $SecondToDate, $Submit));

        //first level
        $this->addDisplayGroup(array(
            'LevelOfEducation',
            'DegreeTitle',
            'Major',
            'InstitutionName',
            'Grade',
            'YearOfPassing',
            'Duration'
        ), 'contact1', array('legend' => 'Academic Qualification 1'));
        $contact1 = $this->getDisplayGroup('contact1');
        $contact1->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:100%;;float:center;padding-bottom:10px;'))
        ));

        //second level
        $this->addDisplayGroup(array(
            'SecondLevelOfEducation',
            'SecondDegreeTitle',
            'SecondMajor',
            'SecondInstitutionName',
            'SecondGrade',
            'SecondYearOfPassing',
            'SecondDuration'
        ), 'contact2', array('legend' => 'Academic Qualification 2'));
        $contact2 = $this->getDisplayGroup('contact2');
        $contact2->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:100%;;float:center;padding-bottom:20px;'))
        ));

        //First Professional Qualification
        $this->addDisplayGroup(array(
            'Organization',
            'OrganizationAddress',
            'FromDate',
            'ToDate'
        ), 'contact3', array('legend' => 'Professional Qualification 1'));
        $contact3 = $this->getDisplayGroup('contact3');
        $contact3->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:100%;;float:center;padding-bottom:10px;'))
        ));

        //Second Professional Qualification
        $this->addDisplayGroup(array(
            'SecondOrganization',
            'SecondOrganizationAddress',
            'SecondFromDate',
            'SecondToDate',
            'Submit'
        ), 'contact4', array('legend' => 'Professional Qualification 2'));
        $contact4 = $this->getDisplayGroup('contact4');
        $contact4->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:100%;;float:center;padding-bottom:10px;'))
        ));
    }
}

