<?php  if (!isset($_SESSION['username'])) :?>
                                        Ya'll need to be logged in ma boi
                                <?php endif ?>
                        


<?php  if (isset($_SESSION['username'])) :?>
                                       

<h1>evnts</h1>
       
<div class="events">
<?php

        
$connection = mysqli_connect("localhost","root","sqlroot", "php")
or die("Impossible de se connecter : " . mysqli_error());
            
$myarticles = $connection->query("SELECT * FROM `evenements`" );


   
while ($article = $myarticles->fetch_assoc()) {
        ?> 

        <div class="card medium">
         <div class="card-image waves-effect waves-block waves-light">
                 <img class="activator" src="images/<?php print $article['image'] ?>">
         </div>
          <div class="card-content">
                 <span class="card-title activator grey-text text-darken-4"> <?php echo $article['title'] ?> <i class="material-icons right">more_vert</i></span>
                 <p> At : <?php print $article['place'] ?> </p>
                 <p> From :<?php print $article['beginning'] ?>  to <?php print $article['ending'] ?> </p>
         </div>
          <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $article['title'] ?><i class="material-icons right">close</i></span>
                 <p><?php  print  $article['description'] ?></p>
                 <p> At : <?php print $article['place'] ?> </p>
                 <p> From :<?php print $article['beginning'] ?>  to <?php print $article['ending'] ?> </p>
        </div>
        </div>
        


<?php
}
?> 
</div>
<?php
endif ?>

