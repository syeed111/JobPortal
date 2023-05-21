<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ctgjob";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, perform login logic
        header("Location: index.html");
        exit();
        // Redirect to another page or perform further actions
    } else {
        // User does not exist or invalid credentials
        echo "Invalid email or password. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>

<!-- HTML sign-in form -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Sign In">
    <label for="signup">Don't have an account ?</label>
    <a href="sign-up.php">Sign-up</a>
</form>
