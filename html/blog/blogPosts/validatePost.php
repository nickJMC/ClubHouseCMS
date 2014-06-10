<?PHP
//validatePost.php

$errors	=	array();	//array to hold validation errors
$data 	=	array();	//array to  pass back data

//validate the variables
$invalidCharacters = array("#",">","<",":",'"','/','\\','|','?','*');
	if(empty($_POST['title'])){
		$errors['title'] = "Title is required";
	}else
	{
	$errors["title"] = "";
	 for($i = 0; $i<count($invalidCharacters);$i++){
	  if(is_numeric(strpos($_POST['title'],$invalidCharacters[$i]))){
	   $errors["title"] .= $invalidCharacters[$i] . " is an invalid title character.<br>";
	  }
	  if(strlen($errors["title"]) === 0){unset($errors["title"]);}
	 }
	}
	
	if(empty($_POST['author'])){
		$errors['author'] = 'your name is required';
	}	
	if(empty($_POST['paragraph'])){
		$errors['paragraph'] = 'Please enter text for your blog post.';
	}
	
	if(empty($_POST['type'])){
		$errors['type'] = 'Please select what type of blog post this is';
	}
	
//return a response
	
	// response if there are errors
	if( ! empty($errors)) {
		$data['success'] = false;
		$data['errors']	 = $errors;
	} else {
		
		//if there are no errors, return a message
		$data['success'] = true;
		$data['message'] = 'All required fields are filled :D <br> Double check your spelling and grammar before clicking submit.';	
	}
	
	//return all our data to an AJAX call
	echo json_encode($data);

?>
