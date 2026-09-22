<!DOCTYPE html>
<html>
  <head>
  <title>SILATTA | Log in</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  
   <div class="anima"></div>
<body >
  <img class="wave" src="assets/img/wave.png">

  <div class="container">
    <div class="img">
      <img src="assets/img/bg.svg">
    </div>
    <div class="login-content">
      <form action="<?php echo base_url(); ?>loginMe" method="post">
        <img src="<?php echo base_url(); ?>assets/dist/img/spss.png" class="user-image" alt="User Image"/>
        <h3 >Sign In to Start Your Experience!</h3>
        <br>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <font color="red">Password/Username Anda Tidak Sama</font>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>

        
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="email" class="input" name="email" required="">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="password" required="">
                 </div>
              </div>
              <a class="input-top" href="<?php echo base_url('register'); ?>">Dont Have an Account?</a>
              <input type="submit" class="btn input-top" value="Sign In">
               <a class="input-top" href="<?php echo base_url('jadwal'); ?>" ><button style="background-color: light blue" type="button" class="btn btn-primary btn-block" >
                          Cek Jadwal
                         </button></a>

            </form>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/main.js"></script>
    <script src="assets/js/particles.js"></script>
    <script src="app.js"></script>
</body>
</html>