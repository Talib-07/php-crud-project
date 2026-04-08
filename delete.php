<?php
include 'db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id=$id");

// redirect with message
header("Location: index.php?msg=deleted");
?>