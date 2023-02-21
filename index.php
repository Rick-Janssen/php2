<link rel="stylesheet" type="text/css" href="index.css">
<title>login</title>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="welcome.php" method="post">
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