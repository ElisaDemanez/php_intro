<?php


$id = ($_GET['id']);
            
$article = $connection->query("SELECT * FROM `blog_article` WHERE id= $id" )->fetch_assoc();

?> 
<div class="blog">
<h2>
        <?php print $article['titre']; ?>
</h2>

<p class="date"> 
        <?php print $article['date']; ?>
</p>
<img src="images/<?php print $article['image']; ?>" alt="the article picture" class="img">

<p>
<?php print $article['texte']; ?>
</p>
</div>