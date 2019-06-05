<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>	Registro de usuário usando PHP e MySQL </title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div class="header">
		<h2>Registro</h2>

	</div>

	<form method="post" action="registro.php">
		<!--colocar erros de validação aqui-->
		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Usuário</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
			<label>Senha</label>
			<input type="password" name="password_1">
		</div>

		<div class="input-group">
			<label>Confirmar Senha</label>
			<input type="password" name="password_2">
		</div>

		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>

		<p>
			Já é membro? <a href="login.php">Entrar</a>
		</p>

	</form>

</body>
</html>