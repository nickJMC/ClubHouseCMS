<?php 
	
		
?>
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
	   background-image: url('images/ustpurple.png');
	   background-repeat: repeat-x;
	}

	.well
	{
	  overflow-x: hidden;
	}

   </style>

</head>

<body>
<?php echo file_get_contents('header.html'); ?>
  
    <div class="container">

        <div class="row" style="margin-top: 5em;">
		
		    <div class="col-lg-3">
               
                <div class="well" style="">
                   <button id="all" type="button" class="btn btn-link">All Updates</button><br>
                   <button id="newsletter" type="button" class="btn btn-link">Newsletter</button><br>
                   <button id="projects" type="button" class="btn btn-link">Projects</button><br>
                   <button id="social" type="button" class="btn btn-link">Social</button><br>
                   <button id="tech" type="button" class="btn btn-link">Tech Updates</button><br>
                </div>
                <!-- /well -->
                <div class="well" >
                    <h4>Blog Posts</h4>
                    <div id="blogPosts">
			
		    </div>
                </div>
                <!-- /well -->
            </div>
			<div class="col-lg-1"></div>
		
            <div class="col-lg-6" id="blog-view">
				<?php echo file_get_contents("blog/blogPosts/mostRecent.html"); ?>
            </div>

        
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><i>University of St. Thomas Computer Science Club</i></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
   <script>
		function goToByScroll(id){
      // Remove "link" from the ID
    //id = id.replace("link", "");
      // Scroll
		$('html,body').animate({
			scrollTop: $(/*"#"+*/id).offset().top + (-7*16)},
		'slow');
	}
   $(document).ready(function(){
$.ajax({url:"blog/blogPosts/getPosts.php?type=A",success:function(result){
					//console.log(result);
					$("#blogPosts").html(result);	
				}});
		$('#all').on('click', function(event) {
			$.ajax({url:"blog/blogPosts/mostRecent.html",success:function(result){
				$("#blog-view").html(result);	
			}});
				//add another AJAX call to a script that will return the html list of all the links
				var identifier = "A";
				$.ajax({url:"blog/blogPosts/getPosts.php?type="+identifier,success:function(result){
					//console.log(result);
					$("#blogPosts").html(result);	
				}});
		});
		
		$('#newsletter').on('click', function(event) {
			$.ajax({url:"blog/blogPosts/Newsletter/mostRecent.html",success:function(result){
				$("#blog-view").html(result);	
			}});
				//AJAX call to a script that will return the html list of all the links
				var identifier = "N";
			$.ajax({url:"blog/blogPosts/getPosts.php?type="+identifier,success:function(result){
				//console.log(result);
				$("#blogPosts").html(result);	
			}});
		});
		$('#social').on('click',function(event) {
			$.ajax({url:"blog/blogPosts/Social/mostRecent.html",success:function(result){
				$("#blog-view").html(result);
			}});
			var identifier = "S";
			$.ajax({url:"blog/blogPosts/getPosts.php?type="+identifier,success:function(result){
				$("#blogPosts").html(result);
			}});
		});

		$('#tech').on('click', function(event) {
			$.ajax({url:"blog/blogPosts/Technology/mostRecent.html",success:function(result){
				$("#blog-view").html(result);
			}});
			
			//AJAX call to a script that will return the html list of all the links
			var identifier = "T";
			$.ajax({url:"blog/blogPosts/getPosts.php?type="+identifier,success:function(result){
				$("#blogPosts").html(result);	
			}});
				
		});
		
		$('#projects').on('click', function(event) {
			$.ajax({url:"blog/blogPosts/Projects/mostRecent.html",success:function(result){
				$("#blog-view").html(result);	
			}});
				//AJAX call to a script that will return the html list of all the links
				var identifier = "P";
			$.ajax({url:"blog/blogPosts/getPosts.php?type="+identifier,success:function(result){
				$("#blogPosts").html(result);	
			}});
		
		});

		
		$(".posts").on("click", function(event) {
			var page = $(this).attr("value");
			var identifier = $(this).attr("name");
			if(identifier === "N") {
				directory = "Newsletter/"; 
			} else if(identifier === "T") {
				directory = "Technology/";
			} else if(identifier === "P") {
				directory = "Projects/";
			} else if(identifier === "S") {
				directory = "Social/";
			} else {
				directory="";
			}
		
		
		
			$.ajax({url:"blog/blogPosts/" + directory +page,success:function(result){
				$("#blog-view").html(result);	
			}});
			
			//animation of the screen that brings the focus back to the post
			goToByScroll('#blog-view');
			

			
			
			
		});
		
		
   });
   
   </script>

</body>

</html>
