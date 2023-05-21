<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ctgjob";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $experience =$_POST["experience"];
  $university =$_POST["university"];

  // SQL query to insert form data into the database
  $sql = "INSERT INTO signup(name, email,password,experience,university) VALUES ('$name', '$email', '$password','$experience','$university')";

  if ($conn->query($sql) === TRUE) {
      echo "Form submitted successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();

?>

<table>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
<td><label for="name">Name:</label></td>
<td><input type="text" id="name" name="name" required></td>
</tr>
<tr>
<td><label for="email">Email:</label></td>
<td><input type="email" id="email" name="email" required></td>
</tr>
<tr>
<td><label for="password">Password:</label></td>
<td><input type="password" id="password" name="password" required></td>
</tr>
<tr>
<td><label for="experience">Job Experience:</label></td>
<td><input type="text" id="experience" name="experience" required></td>
</tr>
<tr>
<td><label for="university">University:</label></td>
<td><input type="text" id="university" name="university" required></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Signup"></td>
</tr>
</form>
</table>
  <a href="index.html">Home</a>
  