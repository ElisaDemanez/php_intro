<?php 
if(isset($_GET['filter'])) : 
         $input =$_GET['input'];
        $filter = $_GET['filter'];

         $myarticles = mysqli_query($connection,"SELECT * FROM `evenements` WHERE title LIKE '%$input%' AND WHERE ending $operator '$now' LIMIT $limit_per_page  OFFSET $offset");
        
                
                if(isset($filter) == "all" )    
                {     
                        $myarticles = mysqli_query($connection,"SELECT * FROM `evenements` WHERE `title`  LIKE '%$input%' OR `description` LIKE '%$input%' OR `place` LIKE '%$input%' AND ending $operator '$now' LIMIT $limit_per_page  OFFSET $offset");
                
                };
 else : 
           $myarticles = $connection->query("SELECT * FROM `evenements` WHERE ending $operator '$now'  ORDER BY beginning ASC LIMIT $limit_per_page  OFFSET $offset " );


endif;


        ?>