<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login - ICT</title>
</head>
<body>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
                            <div>
                                <h4 id="titulo">Bem vindo</h4>
                                <span >Faça login para acessar ao sistema</span>
                            </div>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group my-4 py-3">
									<label for="email">Endereço de e-mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email invalido
									</div>
								</div>

								<div class="form-group pt-2 pb-4">
									<label for="password">Senha
										<a href="forgot.html" class="float-right">
											Esqueceu a sua senha?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	A senha é obrigatória
							    	</div>
								</div>

								<div class="form-group mt-4">
									<button type="submit" class="btn btn-primary btn-block">
										Entrar
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2023 &mdash; Turma de TI (2023) 
					</div>
				</div>
			</div>
		</div>
	</section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/my-login.js"></script>

</body>
</html>