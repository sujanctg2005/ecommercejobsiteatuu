<?php

class JobpostController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        
    }

    public function postformAction() {
        
    }

    public function postjobAction() {
        $form = new Application_Form_JobRegistrationForm();

        $form->setMethod("post");

        $form->setAction($this->view->url(array('controller' => 'jobpost', 'action' => 'postjob')));

        if ($this->getRequest()->isPost()) {

            $request = $this->getRequest()->getParams();

            if ($form->isValid($request)) {
                $request = $this->getRequest();
                $application_Model_Jobvacancy = new Application_Model_Jobvacancy();
                $application_Model_Jobvacancy->setJobTitle(
                        $request->getParam("jobtitle"));
                $application_Model_Jobvacancy->setNoOfVacancy(
                        $request->getParam("vacancynumber"));
                $application_Model_Jobvacancy->setJobCategoryID(
                        $request->getParam("jobcategory"));
                // $application_Model_Jobvacancy->setJobPostDate( $request->getParam("cboYear"). "-" . $request->getParam("cboMonth") . "-" .$request->getParam("cboDay"));
                $application_Model_Jobvacancy->setApplicationDeadline(2011 . "-" . 5 . "-" . 30);
                $application_Model_Jobvacancy->setEmployeerID(1);
                $application_Model_Jobvacancy->setDesignation(
                        $request->getParam("designation"));
                $application_Model_Jobvacancy->setCompanyName("company alias name");
                $application_Model_Jobvacancy->setHideCompanyName(false);
                $application_Model_Jobvacancy->setGender(
                        $form->getComboboxValue('gender'));
                $application_Model_Jobvacancy->setMinimumAgeLimit(
                        $form->getComboboxValue('agefrom'));
                $application_Model_Jobvacancy->setMaximumAgeLimit(
                        $form->getComboboxValue('ageto'));
                $application_Model_Jobvacancy->setJobType(
                        $request->getParam("jobtype"));
                $application_Model_Jobvacancy->setEducationalQualificationalID("Masters Degree");
                $application_Model_Jobvacancy->setMinexperience(
                        $request->getParam("experience"));
                $application_Model_Jobvacancy->setMixexperience(
                        5);
                $application_Model_Jobvacancy->setJobResponsibility(
                        $request->getParam("jobdescription"));
                $application_Model_Jobvacancy->setAdditionalJobRequirement("Additional job requirement");
                $application_Model_Jobvacancy->setMinimumSalaryRange(5000);
                $application_Model_Jobvacancy->setMaximumSalaryRange(10000);
                $application_Model_Jobvacancy->setBenifits(
                        $request->getParam("benefits"));
                $application_Model_Jobvacancy->setEmployeerID(2);
                $application_Model_Jobvacancy->setJobCategoryID(1);
                $application_Model_Jobvacancy->insertJobVacancey();
            }
        }
        echo $form;
    }

    public function paymentformAction() {
        $request = $this->getRequest();
        $this->view->assign('postjob', $request->getBaseURL() . "/jobpost/postform");
        $this->view->assign('searchcv', $request->getBaseURL() . "/searchcv/index");
        $this->view->assign('servicecharge', $request->getBaseURL() . "/servcecharge/index");
        $this->view->assign('home', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('contact', $request->getBaseURL() . "/employer/index");
        $this->view->assign('sendpayment', $request->getBaseURL() . "/jobpost/send-payment");
    }

    public function sendPaymentAction() {
        // action body
    }

    public function editPostAction() {
        $request = $this->getRequest();
        $application_Model_Jobvacancy = new Application_Model_Jobvacancy();
        $application_Model_Jobvacancy->setJobID($request->getParam("edi"));
        $application_Model_Jobvacancy->findJobVacanceyById();
        $this->view->editjoblist = $application_Model_Jobvacancy;
        $this->view->assign('modify', $request->getBaseURL() . "/jobpost/modifyjob");
    }

    public function deltePostAction() {
        $request = $this->getRequest();
        $application_Model_Jobvacancy = new Application_Model_Jobvacancy();
        $application_Model_Jobvacancy->setJobID($request->getParam("del"));
        $application_Model_Jobvacancy->deleteJobVacancey();
        $this->_redirect('/jobpost/index');
    }

    public function modifyjobAction() {

        $request = $this->getRequest();
        $application_Model_Jobvacancy = new Application_Model_Jobvacancy();
        $application_Model_Jobvacancy->setJobID(
                $request->getParam("jobId"));
        $application_Model_Jobvacancy->setJobRequirementID(
                $request->getParam("requirmentId"));
        $application_Model_Jobvacancy->setJobTitle(
                $request->getParam("txtJobTitle"));
        $application_Model_Jobvacancy->setNoOfVacancy(
                $request->getParam("txtTotalVacancy"));
        $application_Model_Jobvacancy->setJobCategoryID(
                $request->getParam("cboJobCategory"));
        // $application_Model_Jobvacancy->setJobPostDate( $request->getParam("cboYear"). "-" . $request->getParam("cboMonth") . "-" .$request->getParam("cboDay"));
        $application_Model_Jobvacancy->setApplicationDeadline($request->getParam("cboYear") . "-" . $request->getParam("cboMonth") . "-" . $request->getParam("cboDay"));
        $application_Model_Jobvacancy->setEmployeerID($request->getParam("txtBillingContact"));
        $application_Model_Jobvacancy->setDesignation(
                $request->getParam("txtDesignation"));
        $application_Model_Jobvacancy->setCompanyName(
                $request->getParam("optAliasName"));
        $application_Model_Jobvacancy->setHideCompanyName(
                $request->getParam("txtAliasName"));
        $application_Model_Jobvacancy->setGender(
                $request->getParam("optGender"));
        $application_Model_Jobvacancy->setMinimumAgeLimit(
                $request->getParam("cboAgeFrom"));
        $application_Model_Jobvacancy->setMaximumAgeLimit(
                $request->getParam("cboAgeTo"));
        $application_Model_Jobvacancy->setJobType(
                $request->getParam("optJobType"));
        $application_Model_Jobvacancy->setEducationalQualificationalID($request->getParam("txtEducation"));
        $application_Model_Jobvacancy->setMinexperience(
                $request->getParam("cboExperienceFrom"));
        $application_Model_Jobvacancy->setMixexperience(
                $request->getParam("cboExperienceTo"));
        $application_Model_Jobvacancy->setJobResponsibility(
                $request->getParam("txtJobDescription"));
        $application_Model_Jobvacancy->setAdditionalJobRequirement(
                $request->getParam("txtJobRequirements"));
        $application_Model_Jobvacancy->setMinimumSalaryRange(
                $request->getParam("txtSalaryFrom"));
        $application_Model_Jobvacancy->setMaximumSalaryRange(
                $request->getParam("txtSalaryTo"));
        $application_Model_Jobvacancy->setBenifits(
                $request->getParam("txtOtherBenefits"));

        // $application_Model_Jobvacancy->editJobVacancey();
        $this->view->assign('paymentform',
                $request->getBaseURL() . "/jobpost/paymentform");
        $this->view->assign('viewpostjob',
                $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('postjob',
                $request->getBaseURL() . "/jobpost/postjob");
        $this->_redirect('/jobpost/index');
    }

}

