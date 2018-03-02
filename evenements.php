<?php  
if (!isset($_SESSION['username'])) :?>                                            
        <p>Ya'll need to be logged in ma boi</p>
        <p>Redirecting ... </p>
        <?php
        header('Refresh: 1; /index.php?selected=login');
 endif ?>
           


           
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

        <?php
        //date checker
        $today = getdate();
        $now = $today['year'].'-'.$today['mon'].'-'.$today['mday'];

        // if you clicked past events
        if(isset($_GET['past']))   $operator = '<=';
        if(!isset($_GET['past']))  $operator = '>='; 

       // ERROR WHEN FILTER NEEDTO ORDER STUFF. the myevent querry doesnt take filters in account. But filters checker needs the myevent

       
        //pagination
        $limit_per_page = 5;
        $offset = $limit_per_page*$_GET['page'];
    
       $myevents = mysqli_query($connection,"SELECT * FROM `evenements` WHERE ending $operator '$now'");
        $event_items = $myevents->num_rows;
        $number_pages = ceil($event_items/$limit_per_page);


        if(isset($_GET['filter'])) :  ?>
                <p>Showing results for '<?php print $_GET['input'] ?>'</p>
        <?php endif; ?>
                <div class="events">
                        <?php

      
       
        // filters from event_search.php
        include('components/event_filter.php');

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


  //pager


  if(!isset($_GET['filter'])) :

        for ($i=0; $i < $number_pages ; $i++) { 
                if($i == $_GET['page']) :
                        ?>
                        <span ><?php print $i ?> </span>
                        <?php
                else :
                ?>
                        <a href="index.php?selected=evenements&page=<?php print $i ?>"><?php print $i ?> </a>
                
                <?php endif;
        }
endif;


if(isset($_GET['filter'])) :

        for ($i=0; $i < $number_pages ; $i++) { 
                if($i == $_GET['page']) :
                        ?>
                        <span ><?php print $i ?> </span>
                        <?php
                else :
                ?>
                        <a href="index.php?selected=evenements&page=<?php print $i ?>&filter=<?php  print $_GET['filter']?>&input=<?php print $_GET['input'] ?>""><?php print $i ?> </a>
                
                <?php endif;
        }
endif;

       include('components/events_past_current_button.php');
        endif;
?>

