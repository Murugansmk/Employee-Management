<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends CI_Controller {

public function index()
{
	$this->load->model('Manage_Employee_Model');
	$employee_details=$this->Manage_Employee_Model->get_employee_details();
	$this->load->view('employee/EmployeeInfo',['EmployeeDetails'=>$employee_details]);
}

}	