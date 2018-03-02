<?php 

if($_POST) :
    $input = $_POST['my_form_input'];

    if(empty($input)) :
        $sql = mysqli_query($connection,"SELECT * FROM `evenements` ");
    $filter = false;
    endif;


    if((isset($input) ) && (isset($_POST['checkbox']) == "on")  ) : 
    echo'itsfull and checlked';

        $sql = mysqli_query($connection,"SELECT * FROM `evenements` WHERE title LIKE '%$input%'") ;
        $filter = "by_title";

    endif;

    if((isset($input) ) && !isset($_POST["checkbox"])   ) : 
        echo'itsfull and UNCHecked';
        
        $sql = mysqli_query($connection,"SELECT * FROM `evenements` WHERE `title`  LIKE '%$input%' OR `description` LIKE '%$input%' OR `place` LIKE '%$input%'");
        $filter = "all";
    endif;

    header('Location: index.php?selected=evenements&filter='.$filter.'&input='.$input.'&page=0');
   

endif;

?>
<h2>Search an event</h2>
<form action ="" method="post" name="my_form">
                
    <div class="row">
            <div class="input-field col s6">
                    <input placeholder="input" name="my_form_input" id="input" type="text" >
                    <label for="input">Input</label>
            </div>
    </div>

    <p>
        <input type="checkbox" id="checkbox"  name="checkbox" />
        <label for="checkbox">Search only in title ? </label>
    </p>

    <input type="submit">
</form>
