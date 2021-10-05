<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class EmployeeInfo_Model extends CI_Model {

	public function insert($name, $email, $designation) {
		$data = array('Name' => $name, 'Email' => $email, 'Designation' => $designation);
		$sql_query = $this -> db -> insert('employees', $data);
		if ($sql_query) {
			$this -> session -> set_flashdata('success', 'Employee Information added successfull');
			redirect('employee/EmployeeInfo');
		} else {
			$this -> session -> set_flashdata('error', 'Somthing went worng. Error!!');
			redirect('employee/EmployeeInfo');
		}

	}

	public function UpdateEmpInfo($EmPId, $name, $email, $designation) {
		$data = array('Name' => $name, 'Email' => $email, 'Designation' => $designation);
		$sql_query = $this -> db -> where('EmpId', $EmPId) -> update('employees', $data);
	}

	public function UpdateEmployeeInformation($EmPId, $file_name_DegreeCertificate, $file_name_PassportCopy, $file_name_Resume, $DegreeCertificate, $PassportCopy, $Resume) {
		$data = array('EmpId' => $EmPId, 'DegreeCertificate' => $file_name_DegreeCertificate, 'DegreeCertificatePath' => $DegreeCertificate, 'PassportCopy' => $file_name_PassportCopy, 'PassportCopyPath' => $PassportCopy, 'Resume' => $file_name_Resume, 'ResumePath' => $Resume);
		$sql_query = $this -> db -> insert('employees_details', $data);
		if ($sql_query) {
			$this -> session -> set_flashdata('success', 'Employee Information added successfull');
			redirect('employee/EmployeeInfo');
		} else {
			$this -> session -> set_flashdata('error', 'Somthing went worng. Error!!');
			redirect('employee/EmployeeInfo');
		}
	}

}
