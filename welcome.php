<link rel="stylesheet" type="text/css" href="welcome.css">
<title>Rick janssen</title>
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
                echo "<h2>" . $ingelogde['username'] . " is ingelogd!</h2>";
            } else {
                $foutmelding = '<script>alert("username or password incorrect!")</script>';
                $foutmelding .= "<script>location.href='index.php'</script>";
                echo $foutmelding;
            }
        } 
    $render  ='<h3><a href="http://stefanmars.nl">stefan mars</a></h3><br><br><br><br><br><br><br><br><br><br><br>';
    $render .='<form action="index.php" method="post"><button type="submit" id ="logout" value ="logout" name ="logout">logout</button></form>';
    $render .='<h3><a href= "colorgame.html">games</a></h3>';
    echo $render;

    if(!empty($post['logout'])){
        header('Location: https://rickjanssenic1e.nl');
        $_SESSION = [];
    }


        // $htmlTable = "<table>";
    // foreach ($collection as $value) {
    //     $htmlTable .= "<tr><td class='info'>" . $value['id'] . "</td>";
    //     $htmlTable .= "<td class='info'>" . $value['username'] . "</td>";
    //     $htmlTable .= "<td class='info'>" . $value['password'] . "</td>";

    // }
    // $htmlTable .= "</table>";

    //echo ($htmlTable);
    //echo "<pre>"; var_dump($_POST); echo "</pre>";
    //echo "<pre>"; var_dump($collection); echo "</pre>";

    // if(!empty($_POST['Login'])){ // check of op knop is gedrukt
    // if (empty($_SESSION['status'])) {
                    // echo md5($_POST["password"]);
            // echo "- " . $person['password'];echo "<br>";
            //}
            //}