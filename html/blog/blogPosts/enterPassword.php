<?php
$error ="";
if(isset($_GET['error'])){
	$error = "<p class='bg-danger'>please enter a valid username or password</p>";
}


?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Verify Credentials</title>
  <meta name="description" content="Password page to access blogPost">
  <meta name="author" content="Braden Ericson">
  
  <link rel='stylesheet' href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>

<body>
<div class='container' style="margin-top: 2em;">
<div class='row' >
<div class='col-xs-4'></div><!--spacing-->
<div class='col-xs-4'>
<div><?php echo $error; ?>
<form role="form" action="createBlogPost.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input name='user' type="email" class="form-control" id="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name='password' type="password" class="form-control" id="password" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<div class='col-xs-4'></div><!--spacing-->
</div></div><!--container-->
</body>
</html>