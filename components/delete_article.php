<?php 
$article_id = $_GET['article_id'];

$sql = "DELETE FROM `blog_article` WHERE `id` = $article_id ";
        
if (mysqli_query($connection, $sql)) {
    header('Location: index.php?selected=blog');
} else {
    echo "Error: ";
}
?>