
<h1>Log in </h1>
<p>working id : bjr <i>bjr</i> </p>

<form action="" method="post" name="form_login">
<div class="row">
        <div class="input-field col s9">
          <input placeholder="Placeholder" id="log_username" type="text" class="log_username" name="log_username" required>
          <label for="log_username">Username</label>
        </div>
        </div>

  <div class="row">
        <div class="input-field col s9">
          <input id="log_password" type="password" class="validate" name="log_password" required>
          <label for="log_password">Password</label>
        </div>
      </div>


      <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Log in
        </button>

      </form>

      <p><a href="index.php?selected=register">Don't have an account ? : register  </a></p>

<?php
if($_POST) {
$connection = mysqli_connect("localhost","root","sqlroot", "php")
        or die("Impossible de se connecter : " . mysqli_error());

$username = $_POST["log_username"];

$account = mysqli_query($connection, "SELECT * FROM accounts WHERE username = '$username'");

$info = $account->fetch_assoc();

if(($account->num_rows == 1) ) {

  if (password_verify($_POST['log_password'], $info['password'])) {


   $_SESSION['username'] = $username;
   header('Location: index.php?selected=home');
   
  } 

  else {
    echo 'Le mot de passe est invalide.';
  }
      
}

}

?>