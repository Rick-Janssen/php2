<link rel="stylesheet" type="text/css" href="stylelogin.css">
<title>login</title>

<body>
    <form action="welcome.php" method="post">
        <table>
            <tr>
                <th colspan="2">
                    <h2>Login</h2>
                </th>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td style="text-align: right" colspan="2"><input type="submit" name="Login" value="Login"></td>
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
                <h4>dont have a account?</h4>
            </th>
        <tr>
            <td>create one here:<a conspan="2" href="create.php"><button>create account</button></a></td>
        </tr>
    </table>
</body>