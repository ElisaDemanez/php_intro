<?php
$article_id = ($_GET['id']);
            
$article = $connection->query("SELECT * FROM `blog_article` WHERE id= $article_id" )->fetch_assoc();

?> 
<div class="blog">
        
<h2>  <?php print $article['titre']; ?> </h2>

<p class="date">  <?php print $article['date']; ?> </p>

<img src="images/<?php print $article['image']; ?>" alt="the article picture" class="img">

<p> <?php print $article['texte']; ?> </p>
</div>

<?php  if (isset($_SESSION['username'])) :   
?>


<a class="waves-effect waves-light btn red right-align" id="delete_confirm" href="index.php?selected=delete_article&article_id=<?php print $article['id']; ?>" >Delete article</a>    


<?php

endif;
?>


