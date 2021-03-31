<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/login/custom.css'; ?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/login/custom.js'; ?>"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>user/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url().'assets/'; ?>user/js/bootstrap.min.js"></script>
    <title>LOGIN ADMIN</title>
</head>
<body>
    
<!------ Include the above in your HEAD tag ---------->

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url().'assets/logo.png'; ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
                if ($this->session->flashdata('gagal')) {
            ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('gagal');; ?>
                    </div>
            <?php
                }

                $data = array('class' => 'form-signin', );
                echo form_open(base_url().'index.php/login/login', $data);
            ?>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="test" id="inputEmail" name="user" class="form-control" placeholder="Email / Username" required autofocus>
                <input type="password" id="inputPassword" name="passw" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>