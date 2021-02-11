<!DOCTYPE html>

<html>

<head>
    <title>CNFP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body>

<?php error_reporting (E_ALL ^ E_NOTICE);

require_once "config.php";

$nom = $_POST["nom"];
$client = $_POST["client"];
$statut = $_POST["statut"];
$datee = $_POST["datee"];



?>



<div id="entete">
    <div id="focus-container" class="container">
        <div class="left-side"></div>
        <div class="right-side"></div>
        <div class="hover">
            <div class="tri-1">
                <div class="bit-top"></div>
                <div class="bit-top-left"></div>
            </div>
            <div class="tri-2">
                <div class="bit-top-right"></div>
                <div class="bit-top-right-2"></div>
            </div>

            <div class="tri-3">
                <div class="bit-bottom-left"></div>
                <div class="bit-bottom-left-2"></div>
            </div>

            <div class="tri-4">
                <div class="bit-bottom-right"></div>
                <div class="bit-bottom-right-2"></div>
            </div>

        </div>
        <p class="blur">CNFPinside</p>
        <p class="focus">CNFPinside</p>
    </div>



</div>

<div id="main">

    <h2>
        <img src="image/cnfp_logo.png" height="85px" /><br />
    </h2>
    <br />


    <table>
        <tr>
            <td>Nom formation</td>
            <td>Nom du client</td>
            <td>Date de Formation</td>
            <td>Statut</td>
        </tr>
        <tr>
            <td><?php echo $_POST["nom"];?></td>
            <td><?php echo $_POST["client"];?></td>
            <td><?php echo $_POST["datee"];?></td>
            <td><?php echo $_POST["statut"];?></td>
        </tr>
    </table>


    <a href="ajout_session.php"> <input type="button" value="Ajouter une session" class = "BtnCreeAnnonce"> </a>
    <a href="welcome.php"> <input type="button" value="retour acceuil" class = "BtnCreeAnnonce"> </a>




</div>

<div id="footer">
    <br />
    <p> Copyright Jeremy Guez</p>
    <p>
        &copy; 2010
        <script>
            new Date().getFullYear() > 2010 && document.write("-" + new Date().getFullYear());
        </script>, CNFP.
    </p>
</div>


<script type="text/javascript" src="style.js"></script>



</body>

</html>