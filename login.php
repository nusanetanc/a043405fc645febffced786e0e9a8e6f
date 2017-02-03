<?php
$base_url="https://qrbarcode-nurhandiyudi.c9users.io";
session_start();
if(isset($_POST['submit'])){
  if($_POST['username']=="nusanet" && $_POST['password']=="bandung"){
    $_SESSION['crdname_username']=$_POST['username'];
    header('location:'.$base_url);
  } else {
    echo 'login salah';
  }
}
  ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container col-sm-6">
      <form method="post">
        <fieldset>
          <legend>Personal information:</legend>
            username:<br>
            <input type="text" name="username">
            <br>
            password:<br>
            <input type="password" name="password">
            <br><br>
            <input name="submit" id="submit" type="submit" value="Submit">
        <fieldset>
      </form> 
    </div>
</body>
</html>