<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>create account</title>
    <body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Create Account</h2>
                    <div class="inputbox">
                        <ion-icon name="username-outline"></ion-icon>
                        <input type="username" name="createUsername" required>
                        <label for="">username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="createPassword" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="Login" value="Login">create</button>
                    <div class="register">
                        <p>already have a account <a href="index.php">login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
    <?php

    $conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (!empty($_POST['createUsername']) && !empty($_POST["createPassword"])) {
        if (isset($_POST['createUsername']) && isset($_POST["createPassword"])) {
            $createUsername = $_POST["createUsername"];
            $createPassword = md5($_POST["createPassword"]);

            $sql = "INSERT INTO inlog (id, username, password)
    VALUES ('','$createUsername','$createPassword')";
            if ($conn->query($sql) === TRUE) {
                $reroute = "<script>location.href='index.php'</script>";
                echo $reroute;
            } else {
            }
        }
    }

    