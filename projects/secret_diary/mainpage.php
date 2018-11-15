<?php 
    session_start();

    include("connection.php");

    $query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    $diary = $row['diary'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

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
            <div class="navbar-header pull-left">
                <a href="#home" class="navbar-brand">Secret Diary</a>
            </div>
            <div class="pull-right">
                <ul class="navbar-nav nav">
                    <li><a href="index.php?logout=1">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- CONTENT -->

    <div class="container contentContainer" id="home">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" id="topRow">
                <textarea class="form-control"><?php echo $diary; ?></textarea>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(".contentContainer").css('min-height', $(window).height());
        $("textarea").css('height', $(window).height()-140);

        $("textarea").keyup(function() {
            $.post("update_diary.php", {diary:$("textarea").val()});
        });

    </script>
  </body>
</html>










