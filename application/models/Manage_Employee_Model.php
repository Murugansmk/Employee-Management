<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Employee_Model extends CI_Model {
	public function get_employee_details() {
		$query = $this -> db -> select('e1.EmpId, e1.Name, e1.Email, e1.Designation, e2.DegreeCertificate,e2.DegreeCertificatePath,e2.PassportCopy,e2.PassportCopyPath,e2.Resume,e2.ResumePath, e2.CreatedDate') -> from('employees as e1') -> join('employees_details as e2', 'e1.EmpId = e2.EmpId', 'LEFT') -> get();
		return $query -> result();
	}

	//Getting particular employees deatials on the basis of id
	public function get_employeedetail($EmPId) {
		$ret = $this -> db -> select('e1.Name, e1.Email, e1.Designation, e2.DegreeCertificate,e2.DegreeCertificatePath,e2.PassportCopy,e2.PassportCopyPath,e2.Resume,e2.ResumePath, e2.CreatedDate') -> from('employees as e1') -> where('e1.EmPId', $EmPId) -> join('employees_details as e2', 'e1.EmpId = e2.EmpId', 'LEFT') -> get();
		return $ret -> row();
	}

	// Function for use deletion
	public function delete_employee($EmPId) {
		$sql_query = $this -> db -> where('EmpId', $EmPId) -> delete('employees');
		$sql_query = $this -> db -> where('EmpId', $EmPId) -> delete('employees_details');
		//$dirPath .= "./uploads/$EmPId/";
		//$this->deleteDir($EmPId,$dirPath);
	}
function deleteDir($EmPId,$dirPath) {
    
		 if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
	    }
	    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
	        $dirPath .= "./uploads/$EmPId/";
	    }
	    $files = glob($dirPath . '*', GLOB_MARK);
	    foreach ($files as $file) {
	        if (is_dir($file)) {
	            self::deleteDir($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($dirPath);
}

	public function get_employee_name($EmPId) {
		$query = $this -> db -> select('e1.Name') -> from('employees as e1') -> where('e1.EmPId', $EmPId) -> get();
		return $query -> row();
	}

}
