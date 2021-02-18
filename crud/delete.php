<?php
// On demarre une session
session_start();

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
        die();
    }

    $sql = 'DELETE FROM `users` WHERE `id` = :id';

    // On prepare la requête
    $query = $db->prepare(($sql));

    // On assigne les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On execute la requête
    $query->execute();

    $_SESSION['message'] = "Utilisateur supprimer";
    header('Location: ../admin.php');

}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: ../admin.php');
}
?>