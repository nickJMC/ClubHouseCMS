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
		if(id === "lol"){url = 'lolForm.html';}
		else if(id === 'melee'){url = 'meleeForm.html';}
		else if(id === 'civ'){url = 'civForm.html';}

	
	$.ajax({url:url,success:function(result){
		$("#activeForm").html(result);
	}});
});


});

   
   
   </script>
   
   
</head>

<body>
<?php echo file_get_contents('http://www.csclub.stthomas.edu/header.html'); ?>

<div class='containter'>
  <div class='row'>
    <div class='col-lg-12'>
	<h3>
	Use this form to submit your service hours for the Spring Semester of 2014.
	<br> -<a href='http://www.csclub.stthomas.edu/aboutUs.php?name=Braden'>Braden</a>
	</h3>
    </div>
  </div>
  <div class='row'>
    <div class='col-lg-12'>


    </div>
  </div>
</div>
         
             
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



