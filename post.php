<?php include 'includes/header.php'; ?>
<?php
  $db = new Database();

  $id = $_GET['id'];
  $query = "SELECT * FROM posts WHERE id=".$id;


  $post = $db->select($query);
  $post = $post->fetch_assoc();

  $query = "SELECT * FROM catagories";


  $catagories = $db->select($query);

 ?>
 <div class="blog-post">
   <h2 class="blog-post-title">
     <?php echo $post['title']; ?></h2>
   <p class="blog-post-meta">
     <?php echo format_date($post['date']); ?> by
      <a href="#"><?php echo $post['author']; ?>
      </a></p>
     <?php echo $post['body']; ?>
 </div><!-- /.blog-post -->


<?php include 'includes/footer.php'; ?>
