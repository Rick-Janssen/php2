<?php
$conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>