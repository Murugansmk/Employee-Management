<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		form {
			padding: 25px;
		}
</style>
<title>Employees Information</title>
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

      <!-- Sidebar -->
  <?php
		include APPPATH . 'views/includes/sidebar.php';
	?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url(); ?>">Employees</a>
            </li>
            <li class="breadcrumb-item active">Add Employee Information</li>
          </ol>

          <!-- Page Content -->
         
          <hr>
<!---- Success Message ---->



 <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Fill The Employee Information</div>
 



   <?php echo form_open('employee/EmployeeInfo'); ?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
					<?php echo form_input(['name'=>'name','id'=>'name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('name')]);?>
					<?php echo form_label('Enter your name', 'name'); ?>
					<?php echo form_error('name', "<div style='color:red'>", "</div>"); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">			
					<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email')]);?>
					<?php echo form_label('Enter your email', 'email'); ?>
					<?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
				<?php echo form_input(['name'=>'designation','id'=>'designation','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('designation')]);?>
				<?php echo form_label('Enter your designation', 'designation'); ?>
				<?php echo form_error('designation', "<div style='color:red'>", "</div>"); ?>
              </div>
            </div>
            
           
           
			        <div class="card-body">
			<!---- Success Message ---->
			<?php if ($this->session->flashdata('success')) { ?>
			<p style="color:green; font-size:18px;"><?php echo $this -> session -> flashdata('success'); ?></p>
			</div>
			
			
			<?php 

			
			} ?>
			
			<!---- Error Message ---->
			
			<?php if ($this->session->flashdata('error')) { ?>
			<p style="color:red; font-size:18px;"><?php echo $this -> session -> flashdata('error'); ?></p>
			
			<?php } ?> 
   
 			<?php echo form_submit(['name'=>'Submit','value'=>'Add','class'=>'btn btn-primary btn-block']); ?>

          </form>
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
