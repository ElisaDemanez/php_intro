
<?php
$num = ($_GET['num']);

$connection = mysqli_connect("localhost","root","sqlroot", "php")
or die("Impossible de se connecter : " . mysqli_error());
            
$article = $connection->query("SELECT * FROM `blog_article` WHERE id= $num" )->fetch_assoc();

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