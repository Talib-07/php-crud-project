<?php
include 'db.php';

$id = $_GET['id'];

$res = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    mysqli_query($conn, "UPDATE users SET 
    first_name='$fname',
    last_name='$lname',
    email='$email',
    gender='$gender'
    WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* BODY */
body{
    background: linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* CARD */
.container{
    width:400px;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:20px;
    color:#333;
}

/* FORM */
input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:0.3s;
}

input:focus, select:focus{
    border-color:#667eea;
    box-shadow:0 0 5px rgba(102,126,234,0.5);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    border:none;
    color:#fff;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
}

</style>

</head>
<body>

<div class="container">

<h2>✏️ Edit User</h2>

<form method="POST">

<input type="text" name="fname" value="<?= $row['first_name']; ?>" required>
<input type="text" name="lname" value="<?= $row['last_name']; ?>" required>
<input type="email" name="email" value="<?= $row['email']; ?>" required>

<select name="gender">
<option <?= $row['gender']=="Male"?"selected":""; ?>>Male</option>
<option <?= $row['gender']=="Female"?"selected":""; ?>>Female</option>
</select>

<button name="update">Update</button>

</form>

</div>

</body>
</html>