<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php error_reporting (E_ALL ^ E_NOTICE);



$nom = $_POST["nom"];
$disquedur = $_POST["client"];
$commentaire = $_POST["commentaire"];
$date = $_POST["date"];



?>
<style>
    table {
        border: medium solid #6495ed;
        border-collapse: collapse;
        width: 50%;
    }
    th {
        font-family: monospace;
        border: thin solid #6495ed;
        width: 50%;
        padding: 5px;
        background-color: #D0E3FA;

    }
    td {
        font-family: sans-serif;
        border: thin solid #6495ed;
        width: 50%;
        padding: 5px;
        text-align: center;
        background-color: #ffffff;
    }
    caption {
        font-family: sans-serif;
    }
</style>

<h1>Afficher info dans un tableau</h1>

<table>
<tr>
    <td>Nom formation</td>
    <td>Nom du client</td>
    <td>Date</td>
    <td>Commentaire</td>
</tr>
<tr>
    <td><?php echo $_POST[nom];?></td>
    <td><?php echo $_POST[client];?></td>
    <td><?php echo $_POST[date];?></td>
    <td><?php echo $_POST[commentaire];?></td>
</tr>
</table>


</body>
</html>

