<?php


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ex2";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM posts";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $posts = array();

    
    while ($row = $result->fetch_assoc()) {
        $post = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'content' => $row['content']
        );
        $posts[] = $post;
    }

    
    $jsonPosts = json_encode($posts);

    
    header('Content-Type: application/json');

    
    echo $jsonPosts;
} else {
    echo "No posts found.";
}


$conn->close();

?>
