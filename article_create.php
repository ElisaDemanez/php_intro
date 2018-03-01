<?php

if (!empty($_POST['my_article_name'])) :
       
        $title = $_POST["my_article_name"];
        $text = $_POST["my_article_text"];
        $option = $_POST["my_article_image"];
        $intro = $_POST["my_article_intro"];
?>

        <h5>Your article has been sent succesfully !  </h5>
        <p>   <?php echo $title ?>  </p>
        <p>  <?php echo $intro ?>  </p> 
        <p>  <?php echo $text ?>  </p>   
         <p>You chose  <?php echo $option ?>  </p>


    <?php
        $today = getdate();
        $now = $today['year'].'-'.$today['mon'].'-'.$today['mday'];

        
        $sql = "INSERT INTO blog_article (titre, image, intro,texte,date)  VALUES ('$title','$option',  '$intro','$text','$now')";
        
        
       if (mysqli_query($connection, $sql)) {
                echo "New record created successfully";
        } else {
                echo "Error: " . mysqli_error($connection);
        }
        
        
        else :
        ?>


<form action ="index.php?selected=article_create" method="post" name="article_creation">
    
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Title" name="my_article_name" id="title" type="text" required>
            <label for="title">Title</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <textarea id="text" class="materialize-textarea" name="my_article_text" required></textarea>
            <label for="text">Content</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Intro" id="intro" type="text" name="my_article_intro" required>
            <label for="intro">Text intro</label>
        </div>
        
        <div class="input-field col s4">
            <select name="my_article_image" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="img1.jpg">image 1</option>
                                <option value="img2.jpg">image 2</option>
                                <option value="img3.jpg">image 3</option>
                            </select>
                            <label>image</label>
                        </div>
                        
                    </div>
                    <input type="submit">
                </form>
    <?php
      endif;