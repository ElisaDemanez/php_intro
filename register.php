 <h1>Register </h1>
<?php 

if(isset($error_message)) echo $error_message;
?>


<form action="" method="post" name="form_register">

  <div class="row">
        <div class="input-field col s9">
          <input placeholder="Placeholder" id="username" type="text" class="username" name="username" required>
          <label for="username">Username</label>
        </div>
        <div class="input-field col s3" id="username_available">
        </div>
    
    </div>

  <div class="row">
        <div class="input-field col s9">
          <input id="password" type="password" class="validate" name="password" required>
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s9">
          <input id="conf_password" type="password" class="validate" name="conf_password"required >
          <label for="conf_password">Confirm Password</label>
        </div>
      </div>

        <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
        </button>

      </form>

<?php

if($_POST) {
  
  if($_POST["password"] != $_POST["conf_password"]){ 
    $error_message = 'wrong passw';
    echo'non';
    }
    
    
  $usernames = mysqli_query($connection, "SELECT * FROM accounts WHERE username = '".$_POST["username"]."'");
    
    
  if($usernames->num_rows != 0) {
    $error_message= 'username already exist';
    }
    
 $pw_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
 $sql = "INSERT INTO accounts (username,password)  VALUES ('".$_POST["username"]."','$pw_hash')";
 

  if(($_POST["password"] == $_POST["conf_password"] )&& ($usernames->num_rows == 0) ) {

     if( mysqli_query($connection, $sql)) {
     
       $_SESSION['username'] = $_POST['username'];
       $_SESSION['successfully_created'] = true;
       header('Location: index.php?selected=home');
      } 

      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
       }
                
    }
}

?>