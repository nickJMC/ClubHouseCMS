<?php 
	if(empty($_GET['type'])) {
	  exit("error");
	}
	$identifier = htmlspecialchars($_GET['type']);
	if($identifier === "N") {
		$directory = "Newsletter/"; 
	} else if($identifier === "T") {
		$directory = "Technology/";
	} else if($identifier === "P") {
		$directory = "Projects/";
	} else if($identifier ==="A") {
		$directory ="all";//prefix for the allposts.txt file in the local directory
	} else if($identifier ==="S") {
		$directory = "Social/";
	} else {
		exit("error");
	}
	if(file_exists($directory.'posts.txt'))
	{
		$posts = file_get_contents($directory.'posts.txt');
		$posts = explode(',',$posts);
		$postsHTML = "";
		array_pop($posts);
		for($i=count($posts)-1; $i>=0;$i--)
		{
			//replace the _ with white space
			$title = str_replace('_',' ',$posts[$i]); 
		
	
		
			if($identifier==="A")
			{
				$curIdentifier = substr($posts[$i],-2,-1);
			
				$fileName = substr($posts[$i],0,-4);
				//remove the .html of the title
				$title = substr($title, 0,-9);
			}
			else
			{
				$curIdentifier = $identifier;
				$fileName = $posts[$i];
				//remove the .html of the title
				$title = substr($title, 0,-5);
			}	
			$postsHTML .= '<button class="btn btn-link posts" value="'. $fileName .'" name="'. $curIdentifier .'">'. $title .'</button><br>';
			//$postsHTML .= $identifier;
		}
	}
	else
	{
		$postsHTML = "";
	}
	
	
	echo $postsHTML . '
		<script>
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
				directory ="Social/";
			} else {
				directory="";
			}
		
		
		
			$.ajax({url:"blog/blogPosts/" + directory +page,success:function(result){
				$("#blog-view").html(result);	
			}});
			
			//animation of the screen that brings the focus back to the top
			goToByScroll("#blog-view");
			

			
			
			
		});
		</script>';
?>
