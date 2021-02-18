<?php
// On demarre une session
session_start();

// Est ce que l'id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('crud/connect.php');

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
        header('Location: admin.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails utilisateur : <?= $users['username']?></h1>
                <p>ID: <?= $users['id']?></p>
                <p><a href="admin.php">Retourner a la liste</a><a href="crud/edit.php?id=<?=$users['id'] ?>">modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>