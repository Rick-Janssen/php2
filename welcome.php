<link rel="stylesheet" type="text/css" href="stylewelcome.css">
<title>Rick janssen</title>
<a href="http://stefanmars.nl/index.php?content=Home">stefan mars</a>
<?php
$conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
if (!$conn) {
    die('Connection Failed' . mysqli_connect_error());
}

$result = mysqli_query($conn, 'SELECT * FROM `inlog`');

$collection = [];
if (mysqli_num_rows($result) > 0)
    ; {
    while ($row = mysqli_fetch_assoc($result)) {
        $collection[] = $row;
    }
}

$htmlTable = "<table>";
foreach ($collection as $value) {
    $htmlTable .= "<tr><td class='info'>" . $value['id'] . "</td>";
    $htmlTable .= "<td class='info'>" . $value['username'] . "</td>";
    $htmlTable .= "<td class='info'>" . $value['password'] . "</td>";

}
$htmlTable .= "</table>";

//echo ($render);
//echo "<pre>"; var_dump($_POST); echo "</pre>";
//echo "<pre>"; var_dump($collection); echo "</pre>";
//die();

// if(!empty($_POST['Login'])){ // check of op knop is gedrukt
// if (empty($_SESSION['status'])) {
if (isset($_POST['password']) && (isset($_POST['username']))) {
    $bInlogOke = false;
    $ingelogde = null;
    foreach ($collection as $person) {
        if (($_POST["password"] == $person['password']) && ($_POST["username"] == $person['username'])) {
            $bInlogOke = true;
            $ingelogde = $person;
        }
    }
    if ($bInlogOke) {
        echo "<h2>" . $ingelogde['username'] . " is ingelogd!</h2>" . $htmlTable;
    } else {
        $foutmelding = '<script>alert("username or password incorrect!")</script>';
        $foutmelding .= "<script>location.href='index.php'</script>";
        echo $foutmelding;
    }
}
// } 
// }  
?>
