<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

session_start();
?>
<!DOCTYPE html>
<html>
   <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secure Login : Protected Page</title>

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
        <?php if (login_check($mysqli) == true) :
		$row =	user_info($mysqli);
		?>
           <br><br>
<div class="container-fluid well span6">
	<div class="row-fluid">
        <div class="span2" >
		    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" class="img-circle">
        </div>
        
        <div class="span8">
            <h3>User Name : <?php echo $row['username']; ?></h3>
            <h6>Email: <?php echo $row['email']; ?></h6>
            <h6>Age: <?php echo $row['age']; ?></h6>
            <h6>Gender: <?php echo $row['gender']; ?></h6>
            <h6>Country: <?php echo $row['country_name']; ?></h6>
            <h6>State: <?php echo $row['state_name']; ?></h6>
           
            
        </div>
        
        <div class="span2">
            <div class="btn-group">
               <p><a href="includes/logout.php">Logout</a></p>
                
            </div>
        </div>
</div>
</div>
           
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>