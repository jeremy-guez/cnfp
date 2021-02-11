<?php
// Include config file
require_once "config.php";

// Définir des variables et initialiser avec des valeurs vides
$nom = $client = $datee = $statut= "";
$nom_err = $client_err = $datee_err = $statut_err= "";
echo"<script>console.log('coucouu')</script>";
// Traitement des données du formulaire lors de la soumission du formulaire
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Valider le nom d'utilisateur
if(empty(trim($_POST["nom"]))){
    $nom_err = "Entrer un nom de session.";
} else{
// Préparer une instruction select
$sql = "SELECT id FROM tab_session WHERE nom = ?";

if($stmt = mysqli_prepare($link, $sql)) {
    // Lier des variables à l'instruction préparée en tant que paramètres
    mysqli_stmt_bind_param($stmt, "s", $param_nom);

    // Définir les paramètres
    $param_nom = trim($_POST["nom"]);

    // Tentative d'exécuter l'instruction préparée
    if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            $nom_err = "Ce nom de session existe déja.";
        } else {
            $nom = trim($_POST["nom"]);
        }
    } else {
        echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
}

// Valider le nom du client
if(empty(trim($_POST["client"]))){
    $client_err = "Entrer un nom de client.";
} else{
// Préparer une instruction select
    $sql = "SELECT id FROM tab_session WHERE client = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        // Lier des variables à l'instruction préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "s", $param_client);

        // Définir les paramètres
        $param_client = trim($_POST["client"]);

        // Tentative d'exécuter l'instruction préparée
        if (mysqli_stmt_execute($stmt)) {
            /* store result */
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 10000000) {   //A VERRIFIER
                $client_err = "client utiliser trop de fois.";
            } else {
                $client = trim($_POST["client"]);
            }
        } else {
            echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Valider le champ date
if(empty(trim($_POST["datee"]))){
    $datee_err = "Entrer une date.";
} else{
// Préparer une instruction select
   $sql = "SELECT id FROM tab_session WHERE datee = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        // Lier des variables à l'instruction préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "s", $param_datee);

        // Définir les paramètres
        $param_datee = trim($_POST["datee"]);

        // Tentative d'exécuter l'instruction préparée
        if (mysqli_stmt_execute($stmt)) {
            /* store result */
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 10000000) {   //A VERRIFIER
                $datee_err = "date utiliser trop de fois.";
            } else {
                $datee = trim($_POST["datee"]);
            }
        } else {
            echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}


// Valider le champ statut
if(empty(trim($_POST["statut"]))){
    $statut_err = "Entrer un statut.";
} else{
// Préparer une instruction select
    $sql = "SELECT id FROM tab_session WHERE statut = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        // Lier des variables à l'instruction préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "s", $param_statut);

        // Définir les paramètres
        $param_statut = trim($_POST["statut"]);

        // Tentative d'exécuter l'instruction préparée
        if (mysqli_stmt_execute($stmt)) {
            /* store result */
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 10000000) {   //A VERRIFIER
                $statut_err = "date utiliser trop de fois.";
            } else {
                $statut = trim($_POST["statut"]);
            }
        } else {
            echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

//Vérifiez les erreurs d'entrée avant de les insérer dans la base de données

    if(empty($nom_err) && empty($client_err) && empty($datee_err) && empty($statut_err)){

        // Préparer une instruction d'insertion
        $sql = "INSERT INTO tab_session (nom, client, datee, statut) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Lier des variables à l'instruction préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "ss", $param_nom, $param_client, $param_datee, $param_statut);

            // Définir les paramètres
            $param_nom = $nom;
            $param_client = $client;
            $param_datee = $datee;
            $param_statut = $statut;

            //
            //Tentative d'exécuter l'instruction préparée
            if(mysqli_stmt_execute($stmt)){

                header("location: gestion.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}

?>


<!DOCTYPE HTML>
<html>
<head>
</head>
<body>



<h2>Ajouter une session</h2>
<form action="gestion.php" method="post">
    Nom de la session: <input type="text" name="nom" value="<?php echo $nom; ?>">
    <br><br>

    Nom du Client: <input type="text" name="client" value="<?php echo $client; ?>">
    <br><br>
    Date de formation <input type="date" name="datee" value="<?php echo $datee; ?>">
    <br><br>
    Statut de la formation: <input type="text" name="statut" value="<?php echo $statut; ?>">
    <br><br>
    <input type="submit" name="submit" value="Envoyer">
</form>


</body>
</html>

