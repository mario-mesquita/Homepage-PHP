<?php include('server.php');

	// se o usuário não estiver logado, não pode acessar essa página

	if (empty($_SESSION['username'])) {
		header('location: login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>	Registro de usuário usando PHP e MySQL </title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div class="header">
		<h2>Homepage</h2>

	</div>

	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);

					?>
				</h3>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION["username"])): ?>
			<p>Bem-vindo <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p><a href="index.php?logout='1" style="color: red;">Sair</a></p>
		<?php endif ?>

	</div>

</body>
</html>