<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Employee extends CI_Controller {
function __construct(){
parent::__construct();
$this->load->model('Manage_Employee_Model');
$this->load->model('EmployeeInfo_Model');
}
public function index(){
$employee_details=$this->Manage_Employee_Model->get_employee_details();
$this->load->view('employee/Manage_Employee',['EmployeeDetails'=>$employee_details]);
}

// For particular Record
public function get_employeedetail()
{
$actual_link  = $this->uri->segment_array();
$EmPId = end($actual_link);
$employee_details=$this->Manage_Employee_Model->get_employeedetail($EmPId);
$this->load->view('employee/Get_Employee_Details',['EmployeeDetails'=>$employee_details]);
}

public function delete_employee()
{
$actual_link  = $this->uri->segment_array();
$EmPId = end($actual_link);
$this->Manage_Employee_Model->delete_employee($EmPId);
$this->session->set_flashdata('success', 'Employee data deleted');
redirect(site_url());
}

function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
public function EmployeeDetailsUpload()
     {
     		$base_urls = base_url();
			$actual_link  = $this->uri->segment_array();
			$EmPId = end($actual_link);
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$designation=$this->input->post('designation');			
			$this->EmployeeInfo_Model->UpdateEmpInfo($EmPId,$name,$email,$designation);
			$employee_name = $this->Manage_Employee_Model->get_employee_name($EmPId);
     		$co_name=$employee_name->Name;
     		$DegreeCertificate      = $PassportCopy      = $Resume = "";
			$file_name_DegreeCertificate      = $file_name_PassportCopy      = $file_name_Resume = "";
     		$file_name     = $this->clean($co_name);
			
     		if (!empty($_FILES['DegreeCertificate']) && $_FILES['DegreeCertificate']['name'])
            {
                $target_dir = "./uploads/$EmPId/DegreeCertificate/";
				if (!file_exists($target_dir)) {
				    mkdir($target_dir, 0777, true);
				}
                
                $file_name_DegreeCertificate = strtolower(str_replace(" ", "_", $file_name)) . "_DegreeCertificate_" . strtotime(date('Y-m-d H:i:s'));
                $file_size        = $_FILES['DegreeCertificate']['size'];
                $file_tmp         = $_FILES['DegreeCertificate']['tmp_name'];
                $file_type        = $_FILES['DegreeCertificate']['type'];
                $expl2            = explode('.', $_FILES['DegreeCertificate']['name']);
                $file_ext3        = end($expl2);
                $errors           = 0;
                
                if ($errors == 0)
                {
                    move_uploaded_file($file_tmp, $target_dir . $file_name_DegreeCertificate . '.' . $file_ext3);
                    $DegreeCertificate = 'uploads/'.$EmPId.'/DegreeCertificate/' . $file_name_DegreeCertificate . '.' . $file_ext3;
                    $file_name_DegreeCertificate = $file_name_DegreeCertificate . '.' . $file_ext3;
				}
            }
			  if (!empty($_FILES['PassportCopy']) && $_FILES['PassportCopy']['name'])
	            {
	                $target_dir = "./uploads/$EmPId/PassportCopy/";
	                if (!file_exists($target_dir)) {
				    mkdir($target_dir, 0777, true);
					}
	                $file_name_PassportCopy = strtolower(str_replace(" ", "_", $file_name)) . "_PassportCopy_" . strtotime(date('Y-m-d H:i:s'));
	                $file_size      = $_FILES['PassportCopy']['size'];
	                $file_tmp       = $_FILES['PassportCopy']['tmp_name'];
	                $file_type      = $_FILES['PassportCopy']['type'];
	                $expl2          = explode('.', $_FILES['PassportCopy']['name']);
	                $file_ext1      = end($expl2);
	                move_uploaded_file($file_tmp, $target_dir . $file_name_PassportCopy . '.' . $file_ext1);
	                $PassportCopy       = 'uploads/'.$EmPId.'/PassportCopy/' . $file_name_PassportCopy . '.' . $file_ext1;
					$file_name_PassportCopy = $file_name_PassportCopy . '.' . $file_ext1;
	            }
            if (!empty($_FILES['Resume']) && $_FILES['Resume']['name'])
            {
                $target_dir = "./uploads/$EmPId/Resume/";
                if (!file_exists($target_dir)) {
				    mkdir($target_dir, 0777, true);
				}
                $file_name_Resume = strtolower(str_replace(" ", "_", $file_name)) . "_Resume_" . strtotime(date('Y-m-d H:i:s'));
                $file_size       = $_FILES['Resume']['size'];
                $file_tmp        = $_FILES['Resume']['tmp_name'];
                $file_type       = $_FILES['Resume']['type'];
                $expl2           = explode('.', $_FILES['Resume']['name']);
                $file_ext4       = strtolower(end($expl2));
                $file_ext4       = strtolower($file_ext4);
                $errors          = 0;                
                if ($errors == 0)
                {
                    move_uploaded_file($file_tmp, $target_dir . $file_name_Resume . '.' . $file_ext4);					
                    $Resume = 'uploads/'.$EmPId.'/Resume/' . $file_name_Resume . '.' . $file_ext4;
					$file_name_Resume = $file_name_Resume . '.' . $file_ext4;
                }
            }
            if(!empty($file_name_DegreeCertificate) OR !empty($file_name_DegreeCertificate) OR !empty($file_name_Resume))
			{
				$this->EmployeeInfo_Model->UpdateEmployeeInformation($EmPId,$file_name_DegreeCertificate,$file_name_PassportCopy,$file_name_Resume,$DegreeCertificate,$PassportCopy,$Resume);
			}
			else {
				
			}
            
      
     }

}
