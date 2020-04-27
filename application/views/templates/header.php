<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
	<title>ECommece</title>

</head>
<body class="bg-light body-log">
		 <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark"  >
      <a class="navbar-brand" href="<?php echo site_url();?>home">ECommerc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarsExample">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url();?>home">Home <span class="sr-only"></span></a>
            </li>
            <?php if (!$this->session->userdata('loggedin')) : ?>
               <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url();?>Users/register">Sign up <span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url();?>Users/login">Login <span class="sr-only"></span></a>
              </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('loggedin')) : ?>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url();?>Templates/addTemplate">Add Template <span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url();?>users/logout">Logout <span class="sr-only"></span></a>
              </li>
            <?php endif; ?>
            
          </ul>
        </div>
    </nav>
    <div class="pb-5"></div>
    <?php 
          if ($this->session->flashdata('user_registered')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('user_registered');
            echo'</div>';
             echo '</div>';
          }
           if ($this->session->flashdata('payment_success')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('payment_success');
            echo'</div>';
             echo '</div>';
          }
                    if ($this->session->flashdata('template_insertet')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('template_insertet');
            echo'</div>';
             echo '</div>';
          }
          if ($this->session->flashdata('user_loggedin')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('user_loggedin');
            echo'</div>';
             echo '</div>';
          }

          if ($this->session->flashdata('user_loggedout')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('user_loggedout');
            echo'</div>';
             echo '</div>';
          }
          if ($this->session->flashdata('login_faild')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo  $this->session->flashdata('login_faild');
            echo'</div>';
             echo '</div>';
          }
                    if ($this->session->flashdata('document_error')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo  $this->session->flashdata('document_error');
            echo'</div>';
             echo '</div>';
          }
                    if ($this->session->flashdata('image_error')) {
             echo '<div class="container mt-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo  $this->session->flashdata('image_error');
            echo'</div>';
             echo '</div>';
          }
       ?>