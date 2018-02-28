<?php
        $name = $_POST["my_form_name"];
        $message = $_POST["my_form_message"];
        $age = $_POST["age"];
        $option = $_POST["my_form_option"];

if (!empty($_POST) && (stripos($name,"simplon")=== false )) :
?>
        <h5>Your message has been sent succesfully !  </h5>

        <p>   <?php echo $name ?>  </p>
        <p>  <?php echo $message ?>  </p>   
       
       
       <?php
        if (!empty($age)) :
        ?>
                <p> You  <?php echo $age ?> yo </p>
        <?php
        else : $age = NULL ;
        endif; 
        
        
        if (!empty($option)) :
        ?>
                <p>
                You chose  <?php echo $option ?> as option
                </p>
         <?php 
         else :       $option=null;
         ?>
                <p>   No options selected   </p>
        <?php 
        endif;
        

        if (isset($_SESSION['username'])) :
                $connected = true;
        ?>
                <p> You were connected  </p>
        <?php      
        else : $connected = null;
        endif; 
        
        
        $sql = "INSERT INTO contact_forms (subject, message, age, theme, user_account)  VALUES ('$name','$message', '$age', '$option','$connected')";
        
        
       if (mysqli_query($connection, $sql)) {
                echo "New record created successfully";
        } else {
                echo "Error: ";
        }
        

        elseif (isset($name) && (stripos($name,"simplon") !== false )) :  
        ?>
                <p> incorrect input.</p>
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
        <input type="submit">
</form>
        