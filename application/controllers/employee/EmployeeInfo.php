<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class EmployeeInfo extends CI_Controller {

	public function index() {
		$this -> form_validation -> set_rules('name', 'Name', 'required|alpha');
		$this -> form_validation -> set_rules('email', 'Email id', 'required|valid_email|is_unique[employees.email]');
		if ($this -> form_validation -> run()) {
			$name = $this -> input -> post('name');
			$email = $this -> input -> post('email');
			$designation = $this -> input -> post('designation');
			$this -> load -> model('EmployeeInfo_Model');
			$this -> EmployeeInfo_Model -> insert($name, $email, $designation);
		} else {
			$this -> load -> view('employee/Add_Employee');
		}

	}

}
