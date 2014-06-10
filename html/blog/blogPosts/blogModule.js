var blog = angular.module('blogModule', []);


  blog.directive('fallbackSrc', function () {
  var fallbackSrc = {
    link: function postLink(scope, iElement, iAttrs) {
      iElement.bind('error', function() {
        angular.element(this).attr("src", iAttrs.fallbackSrc);
      });
    }
   }
   return fallbackSrc;
});

blog.controller('blogController', function($scope, $http, $timeout, $sce){
	
	$scope.formData = {}; 
	
	$scope.title="";
	$scope.author ="";
	$scope.imageURL = "";
	$scope.months = new Array("January","February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

	 

	 $scope.setTime = function(){
	 	$scope.myTime = new Date();
		$scope.month = $scope.months[$scope.myTime.getMonth()];
		$scope.day = $scope.myTime.getDate();
		$scope.year = $scope.myTime.getFullYear();
	 	 $scope.hour = $scope.myTime.getHours();
		$scope.ampm="";
		
		if($scope.hour >= 12){$scope.ampm = "PM";}else{$scope.ampm="AM";}
		
		$scope.hour = $scope.hour%12;
		
		if($scope.hour == 0){$scope.hour = 12;}
		
		$scope.minute = $scope.myTime.getMinutes();
		
		if($scope.minute < 10){ $scope.minute = "0"+$scope.minute; }
		
		$scope.time = $scope.hour + ":" + $scope.minute + " " + $scope.ampm;
		$scope.formData.dateString = $scope.month + " " + $scope.day +", "+ $scope.year + " at " + $scope.time;
	 }
	 $scope.setTime();
		
		 $scope.safeHtml = function() {
    return $sce.trustAsHtml($scope.formData.paragraph);
  };
	
	

	$scope.submitPost = function() {
	 $scope.setTime();
	 $scope.formData.user = $('#user').attr('value');
		$http({
			method	:	'POST',
			url		:	'submitPost.php',
			data	:	$.param($scope.formData),
			headers	:	{ 'Content-Type': 'application/x-www-form-urlencoded' } //allows angular to pass the data as form data (not a request)
		})
			.success(function(data) {
				console.log(data);
				
				if(!data.success) {
					$scope.alertType = 'alert-danger';
					$scope.display = 'show';
					$scope.formData.ok = false;
					document.getElementById("alertBox").innerHTML = data.error + '<br>' + data.specificError;
				} else {
					//submission was successful!
						document.getElementById("alertBox").innerHTML = data.message;
					$scope.alertType = "alert-success";
					$timeout(function(){$scope.display = 'hide';},2000);
					$scope.formData.ok = false;
				}
				
				
			});
		
		
		
	}
	
	
	
	
	$scope.paragraph = "";
	$scope.errors = "";
	$scope.formData.ok = false;
	
	$scope.processForm = function() {
	 $scope.setTime();
	document.getElementById("alertBox").innerHTML = "";

				$scope.message = "";
	//var xsrf = $.param({fkey: "key"});
		$http({
			method	:	'POST',
			url		:	'validatePost.php',
			data	:	$.param($scope.formData),
			headers	:	{ 'Content-Type': 'application/x-www-form-urlencoded' } //allows angular to pass the data as form data (not a request)
		})
			.success(function(data) {
				console.log(data);
				
				if(!data.success) {
					// if not successful, we bind the error to the status variable
					$scope.message = "";
					for(var er in data.errors){
						$scope.message += data.errors[er] + "<br>";
					}
					$scope.alertType = 'alert-danger';
					$scope.display = 'show';
					$scope.formData.ok = false;
				} else {
					$scope.message = data.message;
					$scope.alertType = "alert-success";
					$scope.display = 'show';
					$scope.formData.ok = true;
				}
				document.getElementById("alertBox").innerHTML = $scope.message;
				
			});
	}
	
	
	
});