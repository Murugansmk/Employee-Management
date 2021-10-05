<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Employees</title>

<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>

  </head>

  <body id="page-top">
    <?php
	include APPPATH . 'views/includes/header.php';
?>

    <div id="wrapper">

        <?php
	include APPPATH . 'views/includes/sidebar.php';
?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url(); ?>">Employees Details</a>
            </li>
       
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="d-flex align-items-center" style="margin-top: 15px;">

						<a href="<?php echo site_url(); ?>" class="btn btn-default" style="margin-left: 10px;color:#007bff;text-decoration: underline;">
							<i class="fa fa-align-left"></i>&nbsp; Employees Details
						</a>

						<a href="<?php echo site_url('employee/EmployeeInfo'); ?>" class="btn btn-default" style="margin-left: 15px;color:#007bff;text-decoration: underline;">
							<i class="fa fa-plus"></i>&nbsp; Add Employees Details
						</a>

					</div>


            <div class="card-body">
              <div class="table-responsive">
<!---- Success Message ---->
<?php if ($this->session->flashdata('success')) { ?>
<p style="color:green; font-size:18px;"><?php echo $this -> session -> flashdata('success'); ?></p>
</div>
<?php } ?>
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Certificate</th>
                      <th>Certificate Path</th>
                      <th>Passport Copy</th>
                      <th>Passport Copy Path</th>
                      <th>Resume</th>
                      <th>Resume Path</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>

<?php
if(count($EmployeeDetails)) :
$cnt=1; 
foreach ($EmployeeDetails as $row) :
?>                    
                    <tr>
                      <td><?php echo htmlentities($cnt); ?></td>
                      <td><?php echo htmlentities($row->Name)?></td>
                      <td><?php echo htmlentities($row->Email)?></td>
                      <td><?php echo htmlentities($row->Designation)?></td>
                      <td><?php echo htmlentities($row->DegreeCertificate)?></td>
                      <td><?php echo htmlentities($row->DegreeCertificatePath)?></td>
                      <td><?php echo htmlentities($row->PassportCopy)?></td>
                      <td><?php echo htmlentities($row->PassportCopyPath)?></td>
                      <td><?php echo htmlentities($row->Resume)?></td>
                      <td><?php echo htmlentities($row->ResumePath)?></td>
                      <td><?php echo htmlentities($row->CreatedDate)?></td>
                      <td><?php echo  anchor("employee/Manage_Employee/get_employeedetail/{$row->EmpId}",' ','class="fa fa-edit"')?>
                        <?php echo  anchor("employee/Manage_Employee/delete_employee/{$row->EmpId}",' ','class="fa fa-trash"')?>

                      </td>
                    </tr>
 <?php $cnt++;
						endforeach;
						else :
 ?>

<tr>
<td colspan="6">No Record found</td>
</tr>
<?php endif; ?>                
              
        
                  </tbody>
                </table>
              </div>
            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
    <?php
			include APPPATH . 'views/includes/footer.php';
		?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>



  <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>

  </body>

</html>
