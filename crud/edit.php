<?php

	// On demare une session
	session_start();

	if($_POST){
		if (isset($_POST['id']) && !empty($_POST['id'])
		&& isset($_POST['username']) && !empty($_POST['username'])
		&& isset($_POST['password']) && !empty($_POST['password'])){
			// On inclut la connection a la base
			require_once("connect.php");

			// On nettoie les données envoyé
			$id = strip_tags($_POST['id']);
			$username = strip_tags($_POST['username']);
			$password = strip_tags($_POST['password']);

			$sql = 'UPDATE `users` SET `username`=:username, `password`=:password WHERE `id`=:id;';

			// On prepare la requête
			$query = $db->prepare($sql);

			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->bindValue(':username', $username, PDO::PARAM_STR);
			$query->bindValue(':password', $password, PDO::PARAM_STR);

			// On exécute la requête
			$query->execute();

			$_SESSION['message'] = "Utilisateur modifier";
			require_once('close.php');

			header('Location: ../admin.php');


		}else{
			$_SESSION['erreur'] = "Le formulaire est incomplet";
		}
	}

	// Est ce que l'id existe et n'est pas vide dans l'URL
	if (isset($_GET['id']) && !empty($_GET['id'])) {
			require_once('connect.php');

			// On nettoie l'id envoyé
			$id = strip_tags($_GET['id']);

			$sql = 'SELECT * FROM `users` WHERE `id` = :id';

			// On prepare la requête
			$query = $db->prepare(($sql));

			// On assigne les paramètre (id)
			$query->bindValue(':id', $id, PDO::PARAM_INT);

			// On execute la requête
			$query->execute();

			// On récupère les utilisateurs
			$users = $query->fetch();

			// On verifie si l'utilisateur existe
			if (!$users){
				$_SESSION['erreur'] = "Cet id n'existe pas ";
				header('Location: ../admin.php');
			}
		}else{
			$_SESSION['erreur'] = "URL invalide";
			header('Location: ../admin.php');
		}
?>

<!DOCTYPE html>

<html lang="fr">

	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<script src="jquery.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Modifier un utilisateurs</title>
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
					<h1>Modifier un utilisateurs</h1>
					<form action="" method="post">
						<div class="form-group">
							<label for="username">Nom utilisateur</label>
							<input type="text" id="utilisateur" name="username" class="form-control" value="<?= $users['username'] ?>">
						</div>
						<div class="form-group">
							<label for="password">Mot de passe</label>
							<input type="password" id="mot-de-passe" name="password" class="form-control" value="<?= $users['password'] ?>">
						</div>
						<input type="hidden" value="<?= $users["id"]?>" name="id">
						<button class="btn btn-primary">Sauvegarder</button>
					</form>
				</section>
			</div>
		</main>
	</body>

</html>
