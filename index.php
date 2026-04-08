<?php
include 'db.php';

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    mysqli_query($conn, "INSERT INTO users(first_name,last_name,email,gender)
    VALUES('$fname','$lname','$email','$gender')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>

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

/* CONTAINER */
.container{
    width:950px;
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

/* FORM GRID */
form{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
    margin-bottom:25px;
}

/* INPUTS */
input, select{
    padding:12px;
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
    grid-column:span 2;
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

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

/* HEADER */
thead{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
}

th, td{
    padding:12px;
    text-align:center;
}

/* ROW */
tbody tr{
    border-bottom:1px solid #eee;
    transition:0.3s;
}

tbody tr:hover{
    background:#f5f7ff;
}

/* ACTION BUTTONS */
a{
    text-decoration:none;
    padding:6px 10px;
    border-radius:6px;
    font-size:13px;
}

.edit{
    background:#28a745;
    color:#fff;
}

.delete{
    background:#dc3545;
    color:#fff;
}

.edit:hover{
    background:#218838;
}

.delete:hover{
    background:#c82333;
}

</style>

</head>

<body>

<div class="container">

<h2>🚀 Student Management System</h2>

<form method="POST">
<input type="text" name="fname" placeholder="First Name" required>
<input type="text" name="lname" placeholder="Last Name" required>
<input type="email" name="email" placeholder="Email" required>

<select name="gender">
<option>Male</option>
<option>Female</option>
</select>

<button name="submit">Register</button>
</form>

<h2>📊 Users List</h2>

<table>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
$res = mysqli_query($conn, "SELECT * FROM users");

while($row = mysqli_fetch_assoc($res)){
?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['first_name']." ".$row['last_name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['gender']; ?></td>
<td>
<a class="edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
<a class="delete" href="delete.php?id=<?= $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>

</div>

</body>
</html>