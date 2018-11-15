<? include("login.php"); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary - mySQL Project</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .navbar-brand {
            font-size: 1.8em;
        }

        #home {
            background-image:url("images/day-dream.jpg");
            width: 100%;
            background-size: cover;
        }

        #topRow {
            margin-top: 100px;
            text-align: center;
        }

        #topRow h1 {
            font-size: 300%;
        }

        .bold {
            font-weight: bold;
        }

        .submitButton {
            height: 100px;
            width: 300px;
            font-size: 2em;
        }

        .marginTop {
            margin-top: 30px; 
        }

        .center {
            text-align: center;;
        }

        .title {
            margin-top: 100px;
            font-size: 300%;
        }

        .paddingTop {
            padding-top: 100px;
        }

        #footer {
            background-color: #B0D1FB;
            width: 100%;
        }
    </style>
  </head>

  <body data-spy="scroll" data-target=".navbar-collapse">

    <!-- NAVBAR -->

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#home" class="navbar-brand">Secret Diary</a>
            </div>
            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-right" method="post">
                    <div class="form-group">
                        <input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Log In" />
                </form>
            </div>
        </div>
    </div>


    <!-- CONTENT -->

    <div class="container contentContainer paddingTop" id="home">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1>Secret Diary</h1>
                <p class="lead">Your private diary wherever you go.</p>
                
                <?php
                	if ($error) {
                		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
                	}

                    if ($message) {
                        echo '<div class="alert alert-success">'.addslashes($message).'</div>';
                    }
                ?>
                
                <p class="bold marginTop">Interested? Sign Up Below!</p>
                <form class="marginTop" method="post">
                    <div class="form-group">	
      					<label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Your email" value="<? echo addslashes($_POST['email']); ?>" />
                    </div>
                    <div class="form-group">
      					<label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Your password" value="<? echo addslashes($_POST['password']); ?>" />
                    </div>
                    <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop submitButton" />
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(".contentContainer").css('min-height', $(window).height());

    </script>
  </body>
</html>










