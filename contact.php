<?php

  if (isset($_POST["my_form_name"]) && (stripos($_POST["my_form_name"],"simplon")=== false )) :
?>

<h5>Your message has been sent succesfully !  </h5>
               <p>
                         <?php echo $_POST["my_form_name"] ?> 
                </p>
                <p>
                         <?php echo $_POST["my_form_message"] ?> 
                </p>   
                <?php
                if (!empty($_POST["age"])) :
                     
                ?>
             
                                 <p>
                                        You  <?php echo $_POST["age"] ?> yo
                                </p>
                <?php
                else :$_POST["age"] = NULL ;
                endif; 
                if (!empty($_POST["my_form_option"])) :
                        $option = $_POST["my_form_option"];
                ?>
             
                                 <p>
                                        You chose  <?php echo $_POST["my_form_option"] ?> as option
                                </p>
                <?php 
                //  else : $option = false;
                   
                ?>
             
                                <p>   No options selected   </p>
                 <?php 
                    
                endif;

                if (isset($_SESSION['username'])) :
                        $connected = true;
                        ?>
                     
                                 <p>
                                       You were connected
                                </p>
                        <?php
                        // else : $connected = false;
                endif; 
        
 $connection = mysqli_connect("localhost","root","sqlroot", "php")
   or die("Impossible de se connecter : " . mysqli_error());
               
               
  $sql = "INSERT INTO contact_forms (subject, message, age, theme, user_account)  VALUES ('".$_POST["my_form_name"]."','". $_POST["my_form_message"]."', '".$_POST["age"]."', '$option','$connected')";


               
 if (mysqli_query($connection, $sql)) {
         echo "New record created successfully";
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($connection);
          }
               
        return;

        elseif (isset($_POST["my_form_name"]) && (stripos($_POST["my_form_name"],"simplon") !== false )) :  
                ?>
                                    
                       <p>
                       incorrect input.
                       </p>
               <?php
 endif;

    

?>


<form action ="" method="post" name="my_form">

        <div class="row">
                <div class="input-field col s6">
                        <input placeholder="Subject" name="my_form_name" id="subject" type="text" required>
                        <label for="subject">Subject</label>
                </div>
        </div>
        <div class="row">
                <div class="input-field col s6">
                        <textarea id="message" class="materialize-textarea" name="my_form_message" required></textarea>
                        <label for="message">Textarea</label>
                </div>
        </div>
        <div class="row">

                <div class="input-field col s2">

                        <input placeholder="Your age" id="age" type="number" name="age">
                        <label for="age">Your age</label>

                </div>

                <div class="input-field col s4">
                        <select name="my_form_option">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="css">css</option>
                                <option value="js">js</option>
                                <option value="html">html</option>
                        </select>
                        <label>Themes</label>
                </div>

            
        </div>


        <!-- <div class="row">

                <p class="col s6">
                        user account ?
                        <input type="checkbox" id="account" name="your_form_account" value="checked" />
                        <label for="account"> Yes </label>
                </p>


        </div> -->


        <input type="submit">

</form>
