<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ex2";


if (isset($_GET['postId'])) {
    $postId = $_GET['postId'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT sender, content FROM messages WHERE post_id = $postId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $messages = array();

        while ($row = $result->fetch_assoc()) {
            $message = array(
                'sender' => $row['sender'],
                'content' => $row['content']
            );
            $messages[] = $message;
        }

        
        header('Content-Type: application/json');
        echo json_encode($messages);
    } else {
        echo "No messages found for the specified postId.";
    }

    $conn->close();
} else {
    echo "No postId parameter provided.";
}
?>
