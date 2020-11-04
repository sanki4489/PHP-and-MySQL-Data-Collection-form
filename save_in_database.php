<?php
	//Declaring the variables and posting the data
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$occupucation = $_POST['occupation']
	$company = $_POST['company']
	$number = $_POST['number'];
	$address = $_POST['address']

	//Checking for the connection to database
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		//if fails shows error
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		//sending to database
		$stmt = $conn->prepare("insert into Database(firstName, lastName, gender, email, password, occupation, company, number, address) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		//binding to the above values
		$stmt->bind_param("sssssssis", $firstName, $lastName, $gender, $email, $password, $occupation, $company, $number, $address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Data Stored to Database";
		echo "check in mysql database to confirm";
		<h1>Submit another form<h1>
		
		$stmt->close();
		$conn->close();
	}
?>