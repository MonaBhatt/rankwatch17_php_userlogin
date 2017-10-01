<?php
include_once 'includes/register.inc.php';
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
                            <h1><strong>User</strong> Register Forms</h1>
                           
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
										<p style="color:red;"<?php
										if (!empty($error_msg)) {
											echo $error_msg;
										}
										?></p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="registration_form" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Username</label>
				                        	<input type="text" name="username" id='username'  placeholder="Username" class="form-first-name form-control" >
				                        </div>				                      
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="email" name="email" id="email" placeholder="Email..." class="form-email form-control" >
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Password</label>
				                        	<input type="password" name="password" id="password" placeholder="password" class="form-email form-control">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Confirm password</label>
				                        	<input type="password" name="confirmpwd" id="confirmpwd" placeholder="confirm password" class="form-email form-control">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Age</label>
				                        	<input type="text" name="age" id="age" placeholder="Age" class="form-age form-control" >
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Gender</label>
				                        	<select name="gender" class="form-control" required>
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="other">Other</option>
				                        	</select>
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Mobile</label>
				                        	<input type="text" name="mobile" id="mobile" placeholder="Mobile" maxlength="10" required class="form-age form-control" >
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Country</label>
				                        	<?php
											$query=$mysqli->query("Select * From countries  ORDER BY country_name ASC");

											$rowcount=$query->num_rows;

											?>
											<!– Select Box for county where data is fetch through select query!–>
											<select name="country" id="country" class="form-control" required >
											<option value="">Select Country</option>
											<?php
												if($rowcount>0){

												while($row=$query->fetch_assoc()){
												echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
												}

												}
												else{
												echo '<option value="">Country Not Available</option>';

												}
											?>

											</select>

				                        </div>
										<div class="form-group">
										<label class="sr-only" for="form-state">State</label>
										<select name="state" id="state" class="form-control" required >
										<option value="">Select State</option>
										</select>
										</div>									
				                        <button type="button" class="btn"  onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd,
                                   this.form.age,
                                   this.form.gender,
                                   this.form.country,
                                   this.form.state
								   );">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                   
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                        	
                        	 <ul style="color: #fff;margin-top: 50px;list-style: decimal-leading-zero;">
								<li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
								<li>Emails must have a valid email format</li>
								<li>Passwords must be at least 6 characters long</li>
								<li>Passwords must contain
									<ul>
										<li>At least one uppercase letter (A..Z)</li>
										<li>At least one lowercase letter (a..z)</li>
										<li>At least one number (0..9)</li>
									</ul>
								</li>
								<li>Your password and confirmation must match exactly</li>
							</ul>
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