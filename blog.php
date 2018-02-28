
<h1> Blog</h1>
<div class="row">
<form action ="" method="POST" class="input-field col s3" id="blog_form">
    <select name="option" id = "blog_filter">
      <option value="" disabled selected>Order By</option>
      <option value="ASC">Asc</option>
      <option value="DESC">Desc</option>
    </select>

    <noscript>
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
      </button>
    </noscript>

  </form>
  </div>
<?php

        
// if sorted           
if(isset($_POST['option']))  {
  $order = $_POST['option'];
  $myarticles = $connection->query("SELECT * FROM `blog_article` ORDER BY date $order" );
}

else {
$myarticles = $connection->query("SELECT * FROM `blog_article` ORDER BY date DESC" );
}


while ($article = $myarticles->fetch_assoc()) {
        ?> 
  
<div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="images/<?php print $article['image'] ?>">
              <span class="card-title"><?php echo $article['titre'] ?></span>
            </div>
            <div class="card-content">
              <p><?php  print  $article['intro'] ?></p>
                 <small>   <?php print  $article['date'] ?> </small>
            </div>
            <div class="card-action">
              <a href="index.php?selected=article&amp;id= <?php print  $article['id']; ?> ">Read more</a>
            </div>
          </div>
        </div>
      </div>
 
        
<?php 
}; 


