<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "<br><h6>Entrer votre identifiant.</h6>";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "<br><h6>Enter votre mot de passe.</h6>";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "<br><h6>Le mot de passe est incorrect.</h6>";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "<br><h6>Aucun compte trouvé avec ce nom d'utilisateur.</h6>";
                }
            } else{
                echo "Oops! Un problème est survenu. Veuillez réessayer plus tard.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>


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


    </div>

    <div id="main">

        <h2>
            <img src="image/cnfp_logo.png" height="85px" /><br />
        </h2>
        <br />

		<div class="wrapper">

        <h3>Veuillez remplir vos identifiants pour vous connecter.</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <fieldset> <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Identifiant</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  </br>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password  </label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div></fieldset>

        </form>
    </div>   







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
