<?php include 'includes/header.php'; ?>

<?php
  $db = new Database();

if(isset($_GET['catagory'])){
  $catagory = $_GET['catagory'];

  $query = "SELECT * FROM posts Where catagory=".$catagory.
  " ORDER BY id DESC";
  $posts = $db->select($query);
}else{
  $query = "SELECT * FROM posts ORDER BY id DESC";


  $posts = $db->select($query);
}

  $query = "SELECT * FROM catagories";
  $catagories = $db->select($query);

 ?>
 <?php
if($posts) { ?>
  <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title">
              <?php echo $row['title']; ?></h2>
            <p class="blog-post-meta">
              <?php echo format_date($row['date']); ?> by
               <a href="#"><?php echo $row['author']; ?>
               </a></p>
              <?php echo shorten_text($row['body']); ?>
              <a href="post.php?id=<?php echo urldecode($row['id']); ?>" class="readmore">
                read more</a>
          </div><!-- /.blog-post -->
        <?php endwhile; ?>

        <?php }else{ ?>
          <p>there are no posts yet</p>
        <?php } ?>
<?php include 'includes/footer.php'; ?>
