<?php

class QualificationController extends Zend_Controller_Action {

    protected $_qualificationform;
    protected $_alreadyexists;

    public function init() {
        $this->_qualificationform = new Application_Form_EmployeeQualification();
        $this->_alreadyexists = false;

        $table = Zend_Db_Table_Abstract::getDefaultAdapter();

        $EmployeeID = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->getUserID();
        $sql = 'select * from  tbl_academic_qualification T1 LEFT JOIN
            tbl_qualification T2
            ON T1.employeeid = T2.employeeid
            where
            T1.employeeid = ' . $EmployeeID;

        $result = $table->fetchAll($sql);
                
        if (count($result) > 0) {
            $this->_qualificationform->populate($result[0]);
            $this->_alreadyexists = true;
        }

        $this->_qualificationform->setMethod("POST");

         if($this->_alreadyexists)
        {
            $this->_qualificationform->Submit->setLabel('Update');
            $this->_qualificationform->setAction('update');
        }
        else
        {
            $this->_qualificationform->Submit->setLabel('Submit');
            $this->_qualificationform->setAction('add');
        }
    }

    public function indexAction() {
       
        
    }

        private  function getQualificationDataArray($form)
        {
            $EmployeeID = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->getUserID();
            $optionLOE = $form->getElement('LevelOfEducation')->getMultiOptions();
                $LOE = $optionLOE[$form->getValue('LevelOfEducation')];
                $optionDegree = $form->getElement('DegreeTitle')->getMultiOptions();
                $Degree = $optionDegree[$form->getValue('DegreeTitle')];
                $Major = $form->getValue('Major');
                $InstitutionName = $form->getValue('InstitutionName');
                $Grade = $form->getValue('Grade');
                $optionYOP = $form->getElement('YearOfPassing')->getMultiOptions();
                $YearOfPassing = $optionYOP[$form->getValue('YearOfPassing')];
                $Duration = $form->getValue('Duration');
                //Second Level of Academic qualification
                $SecondoptionLOE = $form->getElement('SecondLevelOfEducation')->getMultiOptions();
                $SecondLOE = $SecondoptionLOE[$form->getValue('SecondLevelOfEducation')];
                $SecondoptionDegree = $form->getElement('SecondDegreeTitle')->getMultiOptions();
                $SecondDegree = $optionDegree[$form->getValue('SecondDegreeTitle')];
                $SecondMajor = $form->getValue('SecondMajor');
                $SecondInstitutionName = $form->getValue('SecondInstitutionName');
                $SecondGrade = $form->getValue('SecondGrade');
                $SecondoptionYOP = $form->getElement('SecondYearOfPassing')->getMultiOptions();
                $SecondYearOfPassing = $optionYOP[$form->getValue('SecondYearOfPassing')];
                $SecondDuration = $form->getValue('SecondDuration');
                //Professional Experience
                $Organization = $form->getValue('Organization');
                $OrganizationAddress = $form->getValue('OrganizationAddress');
                $optionFromDate = $form->getElement('FromDate')->getMultiOptions();
                $FromDate = $optionFromDate[$form->getValue('FromDate')];
                $optionToDate = $form->getElement('ToDate')->getMultiOptions();
                $ToDate = $optionToDate[$form->getValue('ToDate')];
                //Second Level of Professional Experience
                $SecondOrganization = $form->getValue('SecondOrganization');
                $SecondOrganizationAddress = $form->getValue('SecondOrganizationAddress');
                $SecondoptionFromDate = $form->getElement('SecondFromDate')->getMultiOptions();
                $SecondFromDate = $SecondoptionFromDate[$form->getValue('SecondFromDate')];
                $SecondoptionToDate = $form->getElement('SecondToDate')->getMultiOptions();
                $SecondToDate = $SecondoptionToDate[$form->getValue('SecondToDate')];

            $result = array();

            $employeeAcademic = array(
            'EmployeeID' => $EmployeeID,
            'LevelOfEducation' => $LOE,
            'Degree'=>$Degree,
            'Major'=>$Major,
            'InstitutionName'=>$InstitutionName,
            'Grade'=>$Grade,
            'YearOfPassing'=>$YearOfPassing,
            'Duration'=>$Duration,
            'SecondLevelOfEducation'=>$SecondLOE,
            'SecondDegree'=>$SecondDegree,
            'SecondMajor'=>$SecondMajor,
            'SecondInstitutionName'=>$SecondInstitutionName,
            'SecondGrade'=>$SecondGrade,
            'SecondYearOfPassing'=>$SecondYearOfPassing,
            'SecondDuration'=>$SecondDuration
            );

            array_push($result, $employeeAcademic);

            $employeeQualification = array(
            'EmployeeID' => $EmployeeID,
            'Organization'=>$Organization,
            'OrganizationAddress'=>$OrganizationAddress,
            'FromDate'=>$FromDate,
            'ToDate'=>$ToDate,
            'SecondOrganization'=>$SecondOrganization,
            'SecondOrganizationAddress'=>$SecondOrganizationAddress,
            'SecondFromDate'=>$SecondFromDate,
            'SecondToDate'=>$SecondToDate
                );
            array_push($result,$employeeQualification);

            return $result;

        }

    public function updateAction(){
        $this->view->form = $this->_qualificationform;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if ($this->_qualificationform->isValid($formData)) {
                var_dump($formData);
                $this->_qualificationform->populate($formData);
                $employeeQualification = new Application_Model_DbTable_EmployeeQualification();
                $updateEmployeeQualification = $employeeQualification->
                                updateQualification($this->getQualificationDataArray($this->_qualificationform));
                $this->_helper->redirector('index');
            }
        }
    }

    public function addAction() {        
        $this->view->form = $this->_qualificationform;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($this->_qualificationform->isValid($formData)) {
                $employeeQualification = new Application_Model_DbTable_EmployeeQualification();
                $addEmployeeQualification = $employeeQualification->
                                addQualification($this->getQualificationDataArray($this->_qualificationform));
                $this->_helper->redirector('index');
            }
        }
    }
}

