<?php include 'includes/header.php'; ?>
<?php

$db = new Database();

if(isset($_POST['submit'])){
  $title = mysqli_real_escape_string($db->link,
  $_POST['title']);
  $body = mysqli_real_escape_string($db->link,
  $_POST['body']);
  $catagory = mysqli_real_escape_string($db->link,
  $_POST['catagory']);
  $tags = mysqli_real_escape_string($db->link,
  $_POST['tags']);
  $author = mysqli_real_escape_string($db->link,
  $_POST['author']);

  if($title == "" || $body ==''
  ||$catagory == "" || $author == ""){
    $error = "Please fill out all require fields";
  }else{
    $sql = "INSERT INTO posts (title,body,
    catagory,author,tags) ";
    $sql .= "VALUES ('$title','$body','$catagory',
    '$author','$tags')";

    $insert_row = $db->insert($sql);


  }

}

 ?>

<?php


$query = "SELECT * FROM catagories";


$catagories = $db->select($query);

 ?>

<form method="post" action="add_post.php">
  <div class="form-group">
    <label >Post title</label>
    <input type="text" class="form-control"
    name="title"  placeholder="Enter title">
  </div>

  <div class="form-group">
    <label >Post body</label>
    <textarea name="body" class="form-control"
     placeholder="Enter post body"></textarea>
  </div>
  <div class="form-group">
    <label >Catagory select</label>
    <select name="catagory"
    multiple class="form-control">
    <?php while($row = $catagories->fetch_assoc()) : ?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
      </select>
  </div>
  <div class="form-group">
    <label >Author</label>
    <input type="text" class="form-control"
    name="author"
     placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label >Tags</label>
    <input type="text" class="form-control"
    name="tags"  placeholder="Enter tags">
  </div>
<div>
  <button type="submit" name ="submit"
  class="btn btn-default">Submit</button>

</div>
<hr>
<div>
  <a href="index.php"
  class="btn btn-default">Cancel</a>
</div>
</form>


<?php include 'includes/footer.php'; ?>
