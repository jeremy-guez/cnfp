


<!DOCTYPE html>

<html>

<head>
    <title>CNFP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body>


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
    <button class="deco"><a href="deconexion.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" color="#FFC300" fill="currentColor" class="bibi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg><legend>deconnexion</legend></a></button>


</div>

<div id="main">

    <h2>
        <img src="image/cnfp_logo.png" height="85px" /><br />
    </h2>
    <br />

<div class="choix">

    <a href="facture.php"> <input type="button" value="Facturation" class = "BtnCreeAnnonce"> </a>&emsp;
    <a href="gestion.php"> <input type="button" value="Gestion" class = "BtnCreeAnnonce"> </a>
</div>

</div>

<div id="footer">
    <br />
    <p> Copyright CNFP </p>
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