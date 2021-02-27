<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>GestorPMM - Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h2>GestorPMM</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Encontre informações relevantes</h1>

			<p class="text-danger"><strong>SIMPLES E FÁCIL</strong></p>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="/login" method="POST">
			<h1>Entrar</h1>

			<input type="text" name="cpf" placeholder="Digite seu CPF" />
			<input type="password" name="senha"  placeholder="Digite sua senha" />
			<button type="submit">Entrar</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Seja Bem-vindo novamente!</h1>
				<p>clique no botão abaixo para fazer login no sistema</p>
				<button class="ghost" id="signIn">Entrar</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Bem-Vindo ao GestorPMM!</h1>
				<p>Informação rápida e precisa para os gestores e colaboradores!</p>
				<button class="ghost" id="signUp">Saiba Mais</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Criado com <i class="fa fa-heart"></i> por
		<a target="_blank" href="https://unicorpconsultoria.com/colaboradores/robisonmachado">Robison Pereira Machado</a>.
	</p>
</footer>
<!-- partial -->
  <script  src="assets/js/script.js"></script>

</body>
</html>
