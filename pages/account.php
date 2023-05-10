
<link rel="stylesheet" type="text/css" href="index.css">
<title>login</title>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="#" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="username-outline"></ion-icon>
                        <input type="username" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me</label>

                    </div>
                    <button type="submit" name="Login" value="Login">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="create.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<?php
    include 'databaseconn.php';
    $result = mysqli_query($conn, 'SELECT * FROM `inlog`');
    $collection = [];
        if (mysqli_num_rows($result) > 0)
             {
            while ($row = mysqli_fetch_assoc($result)) {
                $collection[] = $row;
            }
        }
        if (isset($_POST['password']) && (isset($_POST['username']))) {
            $bInlogOke = false;
            $ingelogde = null;
            foreach ($collection as $person) {
                if ((md5($_POST["password"]) == $person['password']) && ($_POST["username"] == $person['username'])) {
                    $bInlogOke = true;
                    $ingelogde = $person;
                }
            }
            if ($bInlogOke) {
                echo "<h2>" . $ingelogde['username'] . " logged in!</h2>";
            } else {
                $foutmelding = '<script>alert("username or password incorrect!")</script>';
                //$foutmelding .= "<script>location.href='index.php'</script>";
                echo $foutmelding;
            }
        } 
    if(!empty($post['logout'])){
        header('Location: https://rickjanssenic1e.nl');
        $_SESSION = [];
    }
    ?>
    
