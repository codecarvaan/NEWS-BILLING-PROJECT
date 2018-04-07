<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>TIWARI & SONS</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>sharma.shivam7770@gmail.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+91 8750 097770
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header" >
                <label style="margin:18px ;font-size:30px;color:white">   GLOBAL CRM</label>
            </div>
			</div>
        </div>
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
			<form action="login.php" method="post">
            <div class="row">
                <div class="col-md-6">
                  
                     <h4> Login with <strong>TIWARI & SONS</strong></h4>
                    <br />
					
                     <label>User ID: </label>
                        <input type="text" class="form-control" name="userid"/>
                        <label>Enter Password :  </label>
                        <input type="password" class="form-control" name="password" />
                        <hr />
                        <button type="submit "class="btn btn-info"> &nbsp;Log Me In </button>&nbsp;
                </div>
				</form>
             
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
<?php include "footer.php"?>
