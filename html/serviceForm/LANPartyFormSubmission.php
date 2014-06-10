<?php
	if(isset($_POST['specialKey']))
	{
		if($_POST['specialKey'] != 5)
		{
			echo 'error, form submission invalid';
		}else if(strlen(trim($_POST['email'])) === 0)
		{
			echo 'error, form submission invalid';
		}
		else
		{
		
		//save the form data
		$dir = htmlspecialchars($_POST['dir']);
		
		
		//$data = json_encode($_POST);
		
		$result = "";
		foreach ($_POST as $key => $value)
		{
			$result .= $key . ": " . $value . "\n";
		}
		
		$fileName = trim($_POST['email']);
		
		file_put_contents('tournaments/' . $dir .'/' . $fileName . '.txt ', $result);
		$onloadDiv = '<div onload="back"><div>';
		echo 'Submission successful! sending you back... ';
		
		}
		
	}
	else
	{
		echo 'error, form submission invalid. Sending you back...';
	}
	
	
?>

<script>
window.onload = function()
{
	setTimeout(function(){window.location.href = 'http://www.csclub.stthomas.edu/lanparty';},1500);
}
</script>
