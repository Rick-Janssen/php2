<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="welcome.css">
<title>Rick janssen</title>
<body>
<nav>
  <a class="active" href="#">
    <svg viewBox="0 0 100 100">
      <g transform="translate(10 5) scale(0.8 0.9)">
        <path d="M 0 30 v 70 h 100 v -70 l -50 -30 z" stroke="currentColor" stroke-width="10" fill="none"
          stroke-linejoin="round" stroke-linecap="round" />
      </g>
    </svg>
    <span>
      Home
    </span>
  </a>
  <a href="#">
    <svg viewBox="0 0 100 100">
      <g transform="translate(5 5) scale(0.9 0.9)">
        <path d="M 50 35 a 20 20 0 0 1 50 0 q 0 25 -50 60 q -50 -35 -50 -60 a 25 25 0 0 1 50 0" stroke="currentColor"
          stroke-width="10" fill="none" stroke-linejoin="round" stroke-linecap="round" />
      </g>
    </svg>
    <span>
      Likes
    </span>
  </a>

  <a href="#">
    <svg viewBox="0 0 100 100">
      <g transform="translate(5 5) scale(0.9 0.9)">
        <circle cx="45" cy="38" r="38" stroke="currentColor" stroke-width="10" fill="none" />
        <line x1="66" y1="65" x2="100" y2="100" stroke="currentColor" stroke-width="10" />
      </g>
    </svg>
    <span>
      Search
    </span>
  </a>
  <a href="">
    <svg viewBox="0 0 100 100">
      <g transform="translate(5 5) scale(0.9 0.9)">
        <circle cx="50" cy="35" r="18" stroke="currentColor" stroke-width="10" fill="none" />
        <rect x="15" y="75" width="70" height="50" rx="25" stroke="currentColor" stroke-width="10" fill="none" />
      </g>
    </svg>
    <span>
      Profile
    </span>
  </a>
</nav>
<script src="script.js"></script>
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
                $foutmelding .= "<script>location.href='index.php'</script>";
                echo $foutmelding;
            }
        } 
        $renderimg ='<a href="colorgame.php"><img src="colorgame.jpeg"style="max-width: 300px; max-height: 300px;/></a>';
        echo $renderimg;
        //$render ='<h3><a href="http://stefanmars.nl">stefan mars</a></h3>';
       // $render .='<form action="index.php" method="post"><button type="submit" id ="logout" value ="logout" name ="logout">logout</button></form>';
    
        echo $render;

    if(!empty($post['logout'])){
        header('Location: https://rickjanssenic1e.nl');
        $_SESSION = [];
    }
    ?>
    