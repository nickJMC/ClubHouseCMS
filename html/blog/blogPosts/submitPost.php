<?PHP
/*
	SubmitPost.php
	@author Braden Ericson
	February 6th, 2014
	
	The submitPost.php script verifies all the required parameters are met, then creates the html partial necessary for the blog.
	Read below for more information on how the file system is organized.

*/

$errors	=	array();	//array to hold validation errors
$data 	=	array();	//array to  pass back data
$data['success'] = false;
$error = "There was a problem submitting your post. Either you have in error in your post or you do not have the proper permissions.<br>Please try again later.";
$data['error']	 = $error;
$data['specificError'] ="";
$image = false;

//validate the variables
	if($_POST['ok'] === 'false'){
		//$data['error'] = "";
		$data['error'] = "Error: you must verify your post first";
		exit(json_encode($data));
	}
	if(empty($_POST['title'])){
		 $data['specificError'] ="Error Code: 1";
		 exit(json_encode($data));
	}
	
	if(empty($_POST['author'])){
		$data['specificError'] ="Error Code: 2";
		exit(json_encode($data));
	}	
	if(empty($_POST['paragraph'])){
		$data['specificError'] ="Error Code: 3";
		exit(json_encode($data));
	}
	if(empty($_POST['ok'])) {
		$data['specificError'] ="Error Code: 4";
		exit(json_encode($data));
	}
	
	if(empty($_POST['dateString'])) {
		$data['specificError'] ="Error Code: 5";
		exit(json_encode($data));
	}
	if(empty($_POST['type'])){ //has to be tech, projects, or newsletter
		$data['specificError'] ="Error Code: 6";
		exit(json_encode($data));
	}
	if(empty($_POST['user']))
	{
	$data['specificError'] ="Error Code: 7";
		var_dump($_POST);
		exit(json_encode($data));
	}
	
	if(!empty($_POST['imageURL']))
	{
		//THIS FEATURE IS NOT YET INCLUDED. 
		$image = true;
		$data['error'] = "";
		$data['specificError'] = "image feature not yet enabled";
		exit(json_encode($data));
	}
	
	$title = htmlspecialchars($_POST['title']);
	$author = htmlspecialchars($_POST['author']);
	//if the "HTML Mode" check box is never clicked, it won't be passed.
	if(!isset($_POST['isHTML']))
	{
		$isHTML = false;
		$paragraph = htmlspecialchars($_POST['paragraph']);	
	}
	else if($_POST['isHTML'] == 'true' )
	{
		$isHTML = true;
		$paragraph = $_POST['paragraph'];
	}
	else
	{
		$isHTML = false;
		$paragraph = htmlspecialchars($_POST['paragraph']);	
	}
	
	$dateString = htmlspecialchars($_POST['dateString']);
	$type = htmlspecialchars($_POST['type']);
	$user = $_POST['user'];
	
	if($image){
		$imageHTML = '<img src="' . $_POST['imageURL'] . '" class="img-responsive" alt=""/><hr>';
		$imageHTML = htmlspecialchars($imageHTML);
	}
	else
	{
		$imageHTML = "";
	}
	
	
	/*
	February 6th, 2014
		How is the file system organized?
			Each blog topic (business, mobile, & web) have their own folder. Inside each folder are all the blog posts as partial html files, as well as a file named posts.txt that contains
			a list of all the posts delimited by the "," symbol.
		
	Step by step on what the rest of the script does:
		
		This next part of the script will be taking in our blogTemplate.html and replacing the variable placeholders with their designated content.
		
		Before anything we make sure a post with this title does not already exist. We go into the "type" folder and check for the existance of $title + '.html'
			If it exists, we return an error saying so, otherwise, we continue with our script.
			
		Next it will store the template under the variable $template. 
		  Then, It will replace all of the place-holders. During this process, extra steps are taken for the ==imageHTML== and ==paragraphs== place-holders
			If $image is false, we simply replace ==imageURL== with a blank string. Otherwise, we replace it with the HTML that would show the designated picture.
		  Before replacing ==paragraphs==, we use the string replace function on the $paragraph string to replace all instances of \n\n with </p><p>.
			This will allow us to place new paragraphs in separate <p> instances and therefore display the text properly on our blog.  
		
		Once the template is done replacing place-holders, we move on to save the new blog post.
			First we overwrite the "mostRecent.html" blog post html file so that our new post will be the first post seen.
			Then we append the filename, a '[first letter of "type"]' identifier, and the ',' delimiter to the allPosts.txt file.
			Then, we move into the specified "type" folder and overwrite the "mostRecent.html" with our data as well as save a copy of the post as $title + '.html'
			Then  we append the filename and a ',' delimiter to the posts.txt file (there should be one in each folder).	
	*/
	
	//check if file already exists
			$fileName = str_replace(" ","_", $title);
		$fileName .= ".html";
	if(file_exists($type . '/' . $fileName )){
	//$data['error'] = "";
		$data['error'] = "Error: that title name is already taken. You might have accidentally tried to post twice. Double check that you didn't do that before changing your title.";
		exit(json_encode($data));
	}
	
	
	//grab the template
	$template = file_get_contents("blogTemplate.html");
	
	//replace all the place-holders
	$template = str_replace("==title==", $title, $template);
	$template = str_replace("==author==", $author, $template);
	$template = str_replace("==dateString==", $dateString, $template);
	$template = str_replace("==imageHTML==", $imageHTML, $template);
	$template = str_replace("==user==", $user, $template);
	
	//add <p> tags and replace paragraphs place-holder
	if(!$isHTML)
	{
		$paragraph = str_replace("\n\n", "</p><p>", $paragraph);
		$paragraph = str_replace("\n", "<br>", $paragraph);
	}
	$template = str_replace("==paragraphs==", $paragraph, $template);
	
	//overwrite the mostRecent.html file and append the new title to our allPosts.txt file.
	file_put_contents("mostRecent.html",$template);
	file_put_contents("allposts.txt", $fileName . ' [' . $type[0] . '],', FILE_APPEND);
	
	//goes into the specific type sub-folder, updates most recent, adds to posts.txt, and creates the file
	file_put_contents($type . "/mostRecent.html",$template);
	file_put_contents($type . "/" . $fileName,$template);
	file_put_contents($type . "/posts.txt", $fileName . ',' , FILE_APPEND);
	
	//everything should be done. Now we send a confirmation in response.
	$data['success'] = true;
	$data['error']   = "";
	$data['message'] = "Your post was successful :)";
	echo json_encode($data);


?>
