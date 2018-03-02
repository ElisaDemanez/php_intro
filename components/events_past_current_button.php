<?php 
if(isset($_GET['past']))
{  
    if(isset($_GET['filter'])) :
        ?>
        
        <p class="right-align"><a href="index.php?selected=evenements&page=0&filter=<?php  print $_GET['filter']?>&input=<?php print $_GET['input'] ?>">Current events >></a> </p>
        <?php
        else : 
            ?>
            <p class="right-align"><a href="index.php?selected=evenements&page=0">Current events >></a> </p>
            <?php
        endif;
};
if(!isset($_GET['past']))
{
        if(isset($_GET['filter'])) :
            ?>
            
            <p class="right-align"><a href='index.php?selected=evenements&page=0&past=1&filter=<?php  print $_GET['filter']?>&input=<?php print $_GET['input'] ?>'>Past event >></a>
            </p>
            
            <?php else : ?>
            <p class="right-align"><a href="index.php?selected=evenements&page=0&past=1">All past event >></a> </p>
            <?php endif;
}