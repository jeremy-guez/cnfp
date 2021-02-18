<?php

// On demare une session
	session_start();

	require_once("crud/connect.php");

	$sql = 'SELECT * FROM `users`';

	// On prepare la requête
	$query = $db->prepare($sql);

	// On exécute la requête
	$query->execute();

	//On stocke le resultat dans un tableau associatif
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	require_once('crud/close.php')

?>

<!DOCTYPE html>

<html lang="fr">

	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<script src="jquery.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Liste des utilisateurs</title>
	</head>


	<body>
    <main class="container">
			<div class="row">
				<section class="col-12">
					<?php
						if(!empty($_SESSION['erreur'])){
							echo '<div class="alert alert-danger" role="alert">
									'. $_SESSION['erreur'].'
								</div>';
							$_SESSION['erreur'] = "";
						}
					?>
					<?php
						if(!empty($_SESSION['message'])){
							echo '<div class="alert alert-success" role="alert">
									'. $_SESSION['message'].'
								</div>';
							$_SESSION['message'] = "";
						}
					?>
					<h1>liste utilisateur</h1>
					<table class= "table">
						<thead>
							<tr>
							<th>id</th>
								<th>Nom</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// Boucle sur la variable result
								foreach($result as $users){
							?>
								<tr>
									<td><?= $users['id'] ?></td>
									<td><?= $users['username'] ?></td>
									<td><a href="details.php?id=<?= $users['id'] ?>">Details</a> 
										<a href="crud/edit.php?id=<?= $users['id'] ?>">Modifier</a>
										<a href="crud/delete.php?id=<?= $users['id'] ?>">Supprimer</a>
									</td>
								</tr>
							<?php
								}
							?>
						</tbody>
					</table>
					<a href="crud/add.php" class="btn btn-primary">Creer un utilisateur</a>
				</section>
			</div>
		</main>
	</body>

</html>
