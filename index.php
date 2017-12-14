<?php require "container.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>meteo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="jumbotron text-center" id="meteo-jumbotron">
        <h1>Application web météo</h1>
            <p><i>PHP5 , Boostrap 3, API météo (openweathermap)</i></p> 
    </div>
    <div class="container">
        <div  class="row">
            <div class="col-sm-12">
                <div class="meteo-form-search">
                     <form class="form" method="post">
                        <div class="input-group">
                            <input type="text" name="ville"  class="form-control" placeholder="Rechercher par ville.">
                            <b class="input-group-btn">
                                <button class="btn btn-default" type="submit" style="background-color:#E8B627">Rechercher</button>
                            </b>
                         </div><!-- /input-group -->
                     </form>
               </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12" id="meteo-block">
                 <?php 
                    if(isset($_POST['ville']))echo DisplayHtml(($_POST['ville']));
                  ?>
             </div>
        </div>
    </div>
</body>
</html>
