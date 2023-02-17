<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <title>create account</title>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="2">
                    <h2>create account</h2>
                </th>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="createUsername" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="createPassword" required></td>
            </tr>
            <tr>
                <td style="text-align: right" colspan="2"><input type="submit" name="Login" value="create"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <?php print "Today is " . date("Y-m-d") . "<br>";
                    print "Today is " . date("l"); ?>
                </th>
            </tr>
        </table>
    </form>
    <br>
    <table>
        <tr>
            <th>
                <h4>already have a account </h4>
            </th>
        <tr>
            <td> back to login page:<a conspan="2" href="index.php"><button>login page</button></a></td>
        </tr>
    </table>
    <?php

    $conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (!empty($_POST['createUsername']) && !empty($_POST["createPassword"])) {
        if (isset($_POST['createUsername']) && isset($_POST["createPassword"])) {
            $createUsername = $_POST["createUsername"];
            $createPassword = $_POST["createPassword"];
            $sql = "INSERT INTO inlog (id, username, password)
    VALUES ('','$createUsername','$createPassword')";
            if ($conn->query($sql) === TRUE) {
            } else {
            }
        }
    }