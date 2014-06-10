<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The blog for UST Computer Science Club">
    <meta name="author" content="Braden Ericson">

    <title>UST Computer Science Club</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <!-- Add custom CSS here -->
   <style>
	.navbar-inverse
	{
	   background-image: url('http://www.csclub.stthomas.edu/images/ustpurple.png');
	   background-repeat: repeat-x;
	}

   </style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
<script src='//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>

   <script>

   </script>
   
   
</head>

<body>
<?php echo file_get_contents('http://www.csclub.stthomas.edu/header.html'); ?>


<div class='row'>

  <div class='col-lg-3'></div>
  <div class='col-lg-6' style='margin-top: 6em; padding-left: 2em; padding-right: 2em;'>
     <form role="form" action='submitHours.php' method='post'>
  <div class="form-group">
    <label for="name">Full Name</label>
    <input name='name' type="text" class="form-control" id="name" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="email">UST Email</label>
    <input name='email' type="email" class="form-control" id="email" placeholder="UST email" required>
  </div>
    <div class="form-group">
    <label for="eventName">Event Name</label>
    <input name='eventName' type="text" class="form-control" id="eventName" placeholder="" required>
  </div>
    <div class="form-group">
    <label for="location">Event Date</label>
    <input name='location' type='text' class="form-control" id="date" placeholder="" required>
  </div>
    <div class="form-group">
    <label for="eventDesc">Event Description</label>
    <textarea name='eventDesc' class="form-control" id="eventDesc" placeholder="" required></textarea>
  </div>
  
  <div class="form-group">
    <label for="location">Event Location</label>
    <input name='location' type='text' class="form-control" id="location" placeholder="" required>
  </div>
    <div class="form-group">
    <label for="location">Event Coordinator</label>
    <input name='coordinator' type='text' class="form-control" id="coordinator" placeholder="" required>
  </div>
    <div class="form-group">
    <label for="hours">Number of Hours</label>
    <input name='hours' type='text' class="form-control"  id="hours" placeholder=""required>
  </div>
    <input type='hidden' name='specialKey' value='6'></input>

<div class="radio-inline">
  <label>
    <input type="radio" name="season" id="season1" value="Fall" >
    Fall
  </label>
</div>
<div class="radio-inline">
  <label>
    <input type="radio" name="season" id="season2" value="Spring" checked>
    Spring
  </label>
</div>
 <br>
 <button type="submit" class="btn btn-default">Submit</button>
</form> 
</div><!--col-lg-6-->
<div class='col-lg-3'></div>
</div><!--row-->

</body>
</html>



