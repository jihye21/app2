<?php


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ex2";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = $_POST["title"];
$content = $_POST["content"];

$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Post saved successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>
