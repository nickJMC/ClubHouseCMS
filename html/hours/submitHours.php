<?php
	if(isset($_POST['specialKey']))
	{
		if($_POST['specialKey'] != 6)
		{
			echo 'error, form submission invalid0';
		}else if(strlen(trim($_POST['email'])) === 0)
		{
			echo 'error, form submission invalid1';
		}
		else
		{
		
		//save the form data
		$dir = 'serviceHours';
		
		
		//$data = json_encode($_POST);
		
		$result = "";
		foreach ($_POST as $key => $value)
		{
			$result .= $key . ": " . htmlspecialchars($value) . "\n";
		}
		
		$email = htmlspecialchars(trim($_POST['email']));
		
		//file_put_contents($dir .'/' . $fileName . '.txt ', $result);
		$onloadDiv = '<div onload="back"><div>';
		
			$to = 'csclub@stthomas.edu';
			$subject ='Service Hours';
			$headers ='From: ' . $email;
			
			mail($to,$subject,$result,$headers);
			
			echo 'Submission successful! sending you back... ';
		}
		
	}
	else
	{
		echo 'error, form submission invalid. Sending you back...2';
	
	}
	
	
?>

<script>
window.onload = function()
{
	setTimeout(function(){window.location.href = 'http://www.csclub.stthomas.edu/hours';},3000);
}
</script>