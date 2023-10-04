<?php
$conn = mysqli_connect('localhost', 'root','', 'php');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>
