<?php

	session_start();

	$username = "";
	$email = "";
	$errors = array();

	//conectar ao banco de dados
	
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// ao clicar no botão de registrar

	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']); //$username = mysql_real_escape_string($_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);//$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);//$password_1 = mysql_real_escape_string($_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);//$password_2 = mysql_real_escape_string($_POST['password_2']);

		// verificar se os campos estão preenchidos corretamente
		if (empty($username)) {
			array_push($errors, "Nome de usuário incompleto");
		}

		if (empty($email)) {
			array_push($errors, "E-mail Incompleto");
		}

		if (empty($password_1)) {
			array_push($errors, "Senha incompleta");
		}

		if ($password_1 != $password_2) {
			array_push($errors, "As senhas não correspondem");
		}

		//se não tiver erros, salvar usuário no banco de dados

		if (count($errors) == 0) {

			$password = md5($password_1); // encrypt password before storing in database (security)
			$sql = "INSERT INTO users (username, email, password) 
					VALUES ('$username', '$email', '$password')";

			mysqli_real_query($db, $sql);//mysqli_master_query($db, $sql);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php'); // redirecionar para a home page

		}

	}

	//log user in from login page
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']); //$username = mysql_real_escape_string($_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);//$password_2 = mysql_real_escape_string($_POST['password_2']);

		// verificar se os campos estão preenchidos corretamente
		if (empty($username)) {
			array_push($errors, "Nome de usuário incompleto");
		}

		if (empty($password)) {
			array_push($errors, "Senha Incompleta");
		}

		if (count($errors) == 0) {
			$password = md5($password); // encrypt password before comparing with that from database
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1) {
				// log user in
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php'); // redirecionar para a home page
			} else {
				array_push($errors, "O nome de usuário e(ou) senha está(ão) errado(s)");
				//header('location: login.php');
			}
		}

	}

	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($SESSION['uername']);
		header('location: login.php');
	}


?>