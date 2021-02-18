<?php

// On demare une session
	session_start();

	if($_POST){
		if (isset($_POST['username']) && !empty($_POST['username'])
		&& isset($_POST['password']) && !empty($_POST['password'])){
			// On inclut la connection a la base
			require_once("connect.php");

			// On nettoie les données envoyé
			$username = strip_tags($_POST['username']);
			$password = strip_tags($_POST['password']);

			$sql = 'INSERT INTO `users` (`username`, `password`) VALUES (:username, :password);';

			// On prepare la requête
			$query = $db->prepare($sql);

			$query->bindValue(':username', $username, PDO::PARAM_STR);
			$query->bindValue(':password', $password, PDO::PARAM_STR);

			// On exécute la requête
			$query->execute();

			$_SESSION['message'] = "Utilisateur créer";
			require_once('close.php');

			header('Location: ../admin.php');


		}else{
			$_SESSION['erreur'] = "Le formulaire est incomplet";
		}
	}



?>

<!DOCTYPE html>

<html lang="fr">

	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<script src="jquery.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajouter un utilisateurs</title>
	</head>


	<body>
    <main class="container">
			<div class="row">
				<section class="col-12">
					<?php
						if (!empty($_SESSION['erreur'])) {
							echo '<div class="alert alert-danger" role="alert"> '. $_SESSION['erreur'].' </div>';
							$_SESSION['erreur'] = "";
						}
					?>
					<h1>Ajouter utilisateur</h1>
					<form action="" method="post">
						<div class="form-group">
							<label for="username">Nom utilisateur</label>
							<input type="text" id="utilisateur" name="username" class="form-control">
						</div>
						<div class="form-group">
						<label for="password">Mot de passe</label>
							<input type="password" id="mot-de-passe" name="password" class="form-control">
						</div>
						<button class="btn btn-primary">Creer</button>
					</form>
				</section>
			</div>
		</main>
	</body>

</html>
