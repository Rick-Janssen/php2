<?php 
session_start();

if (isset($_GET["page"])) {

 $_SESSION["page"] = $_GET["page"];

} else {
 $_SESSION["page"] = "home";

}
?>
<link rel="stylesheet" type="text/css" href="css\welcome.scss">
<title>Rick janssen</title>
<body>
<header class="header">
		<h1 class="logo"><a href="index.php?page=home">Rick Janssen</a></h1>
      <ul class="main-nav">
          <li><a href="index.php?page=home">home</a></li>
          <li><a href="index.php?page=about">about</a></li>
          <li><a href="index.php?page=portfolio">portfolio</a></li>
          <div class="dropdown">
          <li><a href="#">account</a></li>
            <div class="dropdown-content">
            <a href="index.php?page=account">login</a>
            <a href="index.php?page=create">create</a>
            </div>
            </div>
      </ul>
	</header> 
  <h1><a></a></h1>
</body>
<?php 
  include("pages/".$_SESSION["page"].".php"); 
?>
