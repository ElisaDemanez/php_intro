<?php  

if (!isset($_SESSION['username'])) :?>                                            Ya'll need to be logged in ma boi
 <?php endif ?>
                        
<!-- if logged in -->
<?php  if (isset($_SESSION['username'])) :       

?>
 <div class="row">
        <div class="col s9">
                        <h1>evnts</h1>
        </div>
        <div class ="col s3 right-aligned">
        <a class="btn-floating btn-large waves-effect waves-light" href="index.php?selected=event_search">
                <i class="material-icons right">search</i>
        </a>
  </div>
</div>
<?php if(isset($_GET['filter'])) :  ?>
        <p>Showing results for '<?php print $_GET['input'] ?>'</p>
<?php endif; ?>
        <div class="events">
                <?php

//date checker
$today = getdate();
$now = $today['year'].'-'.$today['mon'].'-'.$today['mday'];


// if you clicked past events
if(isset($_GET['past']))   $operator = '<=';
if(!isset($_GET['past']))  $operator = '>='; 

     
// filters from event_search.php
if(isset($_GET['filter'])) : 
        $input =$_GET['input'];
        $filter = $_GET['filter'];

         $myarticles = mysqli_query($connection,"SELECT * FROM `evenements` WHERE title LIKE '%$input%' AND WHERE ending $operator '$now'");
       
        
        if(isset($filter) == "all" )    
        {     
                $myarticles = mysqli_query($connection,"SELECT * FROM `evenements` WHERE `title`  LIKE '%$input%' OR `description` LIKE '%$input%' OR `place` LIKE '%$input%' AND ending $operator '$now'");
               
        };
else : 
        $myarticles = $connection->query("SELECT * FROM `evenements` WHERE ending $operator '$now' ORDER BY beginning ASC" );


endif;

        //print events
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
if(isset($_GET['past']))
{  
        if(isset($_GET['filter'])) :
                 ?>

                <p class="right-align"><a href="index.php?selected=evenements&filter=<?php  print $_GET['filter']?>&input=<?php print $_GET['input'] ?>">Current events >></a> </p>
                <?php
                else : 
                        ?>
                <p class="right-align"><a href="index.php?selected=evenements">Current events >></a> </p>
                <?php
                endif;
        };
         if(!isset($_GET['past']))
          {
                if(isset($_GET['filter'])) :
                ?>

                <p class="right-align"><a href='index.php?selected=evenements&past=1&filter=<?php  print $_GET['filter']?>&input=<?php print $_GET['input'] ?>'>Past event >></a>
                 </p>

                <?php else : ?>
                <p class="right-align"><a href="index.php?selected=evenements&past=1">All past event >></a> </p>
                <?php endif;
          }
endif ?>

