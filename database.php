<?php
$servername = "localhost"; // Replace with your database server name
$username = "username";       // Replace with your database username
$password = "password";       
$dbname = "content";    


/** @var mysqli $conn */
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert content into the database
function insertContent($email, $rv) {
    global $conn;
    $email = mysqli_real_escape_string($conn, $email);
    $rv = mysqli_real_escape_string($conn, $rv);

    $sql = "INSERT INTO content (email, rv) VALUES ('$email', '$rv')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to retrieve content from the database
function getContent() {
    global $conn;
    $sql = "SELECT * FROM content";
    $result = $conn->query($sql);

    $content = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $content[] = $row;
        }
    }

    return $content;
}

// Close the database connection (call this at the end of your PHP scripts)
function closeConnection() {
    global $conn;
    $conn->close();
}
?>
