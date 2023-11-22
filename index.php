
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>
<body>
  <h1>Registration Form</h1>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="mobile" class="form-label">Mobile No</label>
      <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkme">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "datafile";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    
    $_name = mysqli_real_escape_string($conn, $_POST['name']);
    $_mail = mysqli_real_escape_string($conn, $_POST['email']);
    $_mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO `data` (`name`, `mobile no`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_name, $_mobile, $_mail, $_password);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}


mysqli_close($conn);
?>


