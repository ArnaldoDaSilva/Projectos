<?php
	$firstName = $_POST['nome'];
	$lastName = $_POST['apelido'];
	$gender = $_POST['data'];
	$email = $_POST['identidade'];
	$password = $_POST['nuit'];
	$number = $_POST['residencia'];

	// Database connection
	$conn = new mysqli('localhost','root','','bancario');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cliente(nome, apelido, data, identidade, nuit, residencia) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $nome, $apelido, $data, $identidade, $nuit, $residencia);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>