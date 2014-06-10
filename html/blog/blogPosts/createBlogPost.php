<?php
$possibleUsers = array('bald6456@stthomas.edu' => 'Chris', 'spit5921@stthomas.edu' => 'Spitzer', 'mari2295@stthomas.edu' => 'Amanda','mars6268@stthomas.edu' => 'Alex','eric0988@stthomas.edu' => 'Braden');

	if(!isset($_POST['password'],$_POST['user'])) {
		header('Location: '. 'enterPassword.php?error=3');
		exit;
	}
	else
	{
		$user = htmlspecialchars($_POST['user']);
		//$hash = password_hash('computerScienceRocks!',PASSWORD_DEFAULT);
		$password = htmlspecialchars($_POST['password']);
		$check = $password === 'computerScienceRocks!';//password_verify($password, $hash);
		
		//if password is incorrect
		if(!$check)
		{
			header('Location: ' . 'enterPassword.php?error=2');

		}
		else //if password is correct
		{
			if(!isset($possibleUsers[$user]))
			{
				header('Location: '. 'enterPassword.php?error=3');
				exit;
			}
			else
			{
				$user = $possibleUsers[$user];
			}
		
		


?>

<!doctype html>

<html lang="en" ng-app="blogModule">
<head>
  <meta charset="utf-8">

  <title>Create Blog Post</title>
  <meta name="description" content="Platform used to post a blog post to the CS Club Blog">
  <meta name="author" content="Braden Ericson">

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="blogModule.js"></script>

	
</head>

<body ng-controller="blogController">

 <div class="row" style="margin: 2em;">
 
<div class="col-lg-1"></div>
  <div class="col-lg-4">
	<form role="form" ng-submit="processForm()" method="POST">
	 <div class="form-group">
		<label for="title">Title</label>
		<input type="text" ng-model="formData.title" name="title" class="form-control" id="title" placeholder="Enter post title"  />
	 </div>
	  <div class="form-group">
		<label for="user">User</label>
		<input type='text' ng-model='formData.user' class='form-control' name='user' value="<?php echo $user; ?>" id='user' placeholder='<?php echo $user; ?>' disabled>
	 </div>
	 <div class="form-group">
		<label for="author">Display Name</label>
		<input type="text" ng-model="formData.author" name="author" class="form-control" id="author" placeholder="Enter your name"  />
	 </div>
	 <div class="form-group">
		<label for="imageURL">Image URL</label>
		<input type="text" ng-model="formData.imageURL" class="form-control" id="imageURL" placeholder="http://" disabled>
		<label for="blogType">Blog Type</label>
		<select id='blogType'class="form-control" ng-model="formData.type" >
			<option>Newsletter</option>
			<option>Technology</option>
			<option>Projects</option>
			<option>Social</option>

		</select>
	 </div>	
	 <div class='form-group'>
	  <label for='isHTML'>HTML Mode</label>
	 <input name='isHTML' type='checkbox' class='' ng-model='formData.isHTML'>
	 </div>
	 <div class="form-group">
		<label for="blogData" >Paragraph</label>
		<textarea type="text" ng-model="formData.paragraph" name="paragraph" rows="10" cols="50" class="form-control" id="blogData" placeholder="enter blog post here..." ></textarea>
	 </div>
  
  <button type="submit" class="btn btn-default">Verify</button>
  <div class="btn btn-default" ng-click="submitPost()">Submit</div>
  <div id="alertBox" class="alert {{display}} {{alertType}}" ></div>
</form>
</div>

<div class="col-lg-1"></div>



        <!-- the actual blog post: title/author/date/content -->
		<div id='livePreview' class="col-lg-4">
	
        <h1>{{formData.title}}</h1>
        <p class="lead">by <a href="../../aboutUs.php?name=<?php echo $user; ?>">{{formData.author}}</a>
        </p>
        <hr>
        <p>
            <span class="glyphicon glyphicon-time"></span> Posted on {{formData.dateString}}</p>
            <hr>
            <img fallback-src="http://placehold.it/900x300" src="{{imageURL}}" class="img-responsive" alt="optional image">
            <hr>
           <pre ng-show='!formData.isHTML'>{{formData.paragraph}}</pre>
			<div ng-show='formData.isHTML' ng-bind-html="safeHtml()"></div>
        </p>
        <hr>
		</div>



 </div>
 
 
</body>
</html>


<?php
		}
	}

?>
