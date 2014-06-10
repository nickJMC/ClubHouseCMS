<!DOCTYPE html>
<?php


?>
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
$('document').ready(function(){
	$("button").click(function(){
		var id = $(this).attr("id");
		var url;
		if(id === "poke"){url = 'pokeForm.html';}
		else if(id === 'melee'){url = 'meleeForm.html';}
		//else if(id === 'civ'){url = 'civForm.html';}

	
	$.ajax({url:url,success:function(result){
		$("#activeForm").html(result);
	}});
});


});

   
   
   </script>
   
   
</head>

<body>
<?php echo file_get_contents('http://www.csclub.stthomas.edu/header.html'); ?>


    <div class="container" style="margin-top: 5em;">

        <div class="row" style='margin-top: 2em;'>
			
		    <div class="col-lg-6">
<div style=' text-align: center;'>
               <button id='poke' class='btn btn-link'   style='' >Pokemon Tournament</button>
		<button id='melee' class='btn btn-link'  style='' >Super Smash Brothers Melee</button>
               
</div>
<p style='text-align: center;'>
The Computer Science Club will be hosting a LAN (Local Area Network) Party.
 The LAN Party is an open event available to all students at the University of St. Thomas.
 There will be food, beverages, organized tournaments, and prizes.
 Click one of the links above to sign up for a tournament!
 Let me know if you run into any problems :)
<br> -<a href='http://www.csclub.stthomas.edu/aboutUs.php?name=Braden'>Braden</a>
</p>
        <img src='http://www.csclub.stthomas.edu/images/lanflyer2.jpg' class='img-responsive' />       
             
            </div>
			
			<div class="col-lg-1"></div>
		
            <div id='activeForm' class="col-lg-5">
			
			
			</div>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><i>University of St. Thomas Computer Science Club</i></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->



</body>
</html>



