<h1> Blog</h1>

<?php

        
$connection = mysqli_connect("localhost","root","sqlroot", "php")
or die("Impossible de se connecter : " . mysqli_error());
            
$myarticles = $connection->query("SELECT * FROM `blog_article` ORDER BY date DESC" );

    
// if($row = $myuser->fetch_assoc()) { echo "1"; }  
// else {echo "0" ;}

   
while ($article = $myarticles->fetch_assoc()) {
        ?> 
  
<div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="images/<?php print $article['image'] ?>">
              <span class="card-title"><?php echo $article['titre'] ?></span>
            </div>
            <div class="card-content">
              <p><?php  print  $article['intro'] ?></p>
                 <small>   <?php print  $article['date'] ?> </small>
            </div>
            <div class="card-action">
              <a href="index.php?selected=article&amp;num= <?php print  $article['id']; ?> ">Read more</a>
            </div>
          </div>
        </div>
      </div>
 
        
<?php 
}; 


