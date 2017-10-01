<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

session_start();

if (login_check($mysqli) == true) {
   header('Location: protected_page.php');
   die;
} 
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login &amp; Register Form</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>User</strong> Login Forms</h1>
                           <?php

							process_si_contact_form(); // Process the form, if it was submitted

							if (isset($_SESSION['ctform']['error']) &&  $_SESSION['ctform']['error'] == true): /* The last form submission had 1 or more errors */ ?>
							<div class="error">There was a problem with your submission.  Errors are displayed below in red.</div><br>
							<?php elseif (isset($_SESSION['ctform']['success']) && $_SESSION['ctform']['success'] == true): /* form was processed successfully */ ?>
							<div class="success">The captcha was correct and the message has been sent!  The captcha was solved in <?php echo $_SESSION['ctform']['timetosolve'] ?> seconds.</div><br />
							<?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="omb_login">

			<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="includes/process_login.php" method="post" class="login-form" name="login_form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="email" name="email" placeholder="Email" class="form-username form-control" id="form-username" required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required>
				                        </div>
										 <div class="form-group">
				                        <?php
										  // show captcha HTML using Securimage::getCaptchaHtml()
										  require_once 'includes/securimage/securimage.php';
										  $options = array();
										  $options['input_name']             = 'ct_captcha'; // change name of input element for form post
										  $options['icon_size']             = 18; // change name of input element for form post
										  $options['disable_flash_fallback'] = false; // allow flash fallback

										  if (!empty($_SESSION['ctform']['captcha_error'])) {
											// error html to show in captcha output
											$options['error_html'] = $_SESSION['ctform']['captcha_error'];
										  }

										  echo "<div id='captcha_container_1'>\n";
										  echo Securimage::getCaptchaHtml($options);
										  echo "\n</div>\n";
										  ?>
				                        </div>
										
				                        <button type="button" onclick="formhash(this.form, this.form.password);" class="btn">Sign in!</button>
										<a href="register.php">Create an account</a>
				                    </form>
			                    </div>
		                    </div>
                        </div>
                        
                        
                        	
                       
                    </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by Monam Bhatt <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
		<script type="text/JavaScript" src="assets/js/sha512.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>