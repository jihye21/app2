<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ex2";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sender = $_POST['sender'];
$content = $_POST['content'];
$postId = $_POST['postId'];


$sql = "INSERT INTO messages (sender, content, post_id) VALUES ('$sender', '$content', '$postId')";
if ($conn->query($sql) === true) {
    
    $partnerSql = "SELECT conversation_partner FROM posts WHERE post_id = '$postId'";
    $partnerResult = $conn->query($partnerSql);

    if ($partnerResult->num_rows > 0) {
        $partnerRow = $partnerResult->fetch_assoc();
        $partner = $partnerRow['conversation_partner'];
        echo "Message saved successfully. Conversation partner: " . $partner;
    } else {
        echo "No conversation partner found for the post.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
