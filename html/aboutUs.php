<?php 

	if(isset($_GET['name']))
	{
		$div = $_GET['name'];
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The about us page for UST Computer Science Club">
    <meta name="author" content="Braden Ericson">

    <title>UST Computer Science Club</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <!-- Add custom CSS here -->
   <style>
	.navbar-inverse
	{
	   background-image: url('images/ustpurple.png');
	   background-repeat: repeat-x;
	}
	
	body
	{
		height: 100%;
	}

   </style>

</head>

<body <!--style="background-image: url('images/blogBG.png'); background-size: cover;"-->>
<?php echo file_get_contents('header.html'); ?>

	<div  class='fullPage'>
    <div class="container" style=''>

	
<!--body-->
        
		
		
	<!--image cycle-->
		
		<div class="row" style='margin-top: 7em;'>
			<div class='col-lg-2'><!--
			                <div class="well" style="">
                   <button id="BradenEricson" type="button" class="btn btn-link">Braden Ericson</button><br>
                   <button id="AmandaMaricle" type="button" class="btn btn-link">Amanda Maricle-Roberts</button><br>
                   <button id="AlexMarsh" type="button" class="btn btn-link">Alex Marsh</button><br>
                   <button id="ChrisBaldwin" type="button" class="btn btn-link">Chris Baldwin</button><br>
                   <button id="JoeSpitzer" type="button" class="btn btn-link">Joseph Spitzer</button><br>
                     
                </div>
				-->
			</div>
			<div class='col-lg-8'>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">

				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="images/group2.JPG" alt="image1" class='img-responsive img-thumbnail'/>
						<div class="carousel-caption">
							<!--carousel-caption-->Computer Science Club 2013-2014
						</div>
					</div>
					<div class="item">
						<img src="http://computerschools.com/uploads/digital_asset/file/1199/computerschools-main-image_900x300.jpg" alt="image2" class='img-responsive img-thumbnail'/>
						<div class="carousel-caption">
							<!--carousel-caption-->
						</div>
					</div>
					<div class="item">
						<img src="http://www.livewireltd.com/images/2012/06/Slider-copper-900x300.jpg" alt="image2" class='img-responsive img-thumbnail'/>
						<div class="carousel-caption">
							<!--carousel-caption-->
						</div>
					</div>
				</div>

	<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
			</div>
			<div class='col-lg-2'></div>
			
			
		</div><!--image cycle-->
		
	<!-- constitution -->
	<div class='row' style='margin-top: 4em;'>
	<div class='col-lg-2'></div>
	<div class='col-lg-8'>
		<p style='color:gray;'>
		The purposes of the Computer Science (CS) Club is to facilitate the interaction between students having interest in the field of Computer and Information Sciences (CISC),
		to promote communication between students and faculty members of the CISC department, 
		to promote academic activities outside the classroom environment,
		to provide opportunities for social interactions with persons of similar academic interests,
		and to provide opportunity for students to communicate with employers interested in CISC Students.

		</p>
		<p style='float:right; color: gray;'>- Computer Science Club Constitution</p>
		
		
		
	</div>
	<div class='col-lg-2'></div>
	</div>
	</div><!--container-->
	</div><!--fullPage-->
	
	

	<div class='container'>
				
				<?php echo file_get_contents("aboutUsPartials/bios.html"); ?>
      
    
	</div>
       

<!--footer-->
<div class='container'>
            <div class="row">
                <div class="col-lg-12">
					<hr>
					<footer>
						<p><i>University of St. Thomas Computer Science Club</i></p>
					</footer>
                </div>
            </div>


    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script>
	$('.fullPage').css('height',$( window ).height());
	
	$( window ).resize(function() {
		$('.fullPage').css('height',$( window ).height());
	});
	
	function goToByScroll(id){
      // Remove "link" from the ID
    //id = id.replace("link", "");
      // Scroll
		$('html,body').animate({
			scrollTop: $(/*"#"+*/id).offset().top + (-7*16)},
		'slow');
	}
	
	$(document).ready(function(){
		
		goToByScroll(<?php if(isset($div)){ echo $div; }else{echo '"#top"';}?>);
		
	});
	
	//$('#fullPage').css('border','1px solid black');
  </script>

</body>

</html>
