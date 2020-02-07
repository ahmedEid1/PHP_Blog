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

 <?php
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
     $sql = "UPDATE  posts SET title='$title',
      body='$body',
      catagory='$catagory',
      author = '$author',
      tags = '$tags'  WHERE id = '$id'";

     $update_row = $db->update($sql);


   }

 }
 ?>
 <?php
if(isset($_POST['delete'])){
  $sql = "DELETE FROM posts WHERE id=".$id;
  $delete_row = $db->delete($sql);
}


  ?>
<form method="post" action="edit_post.php?id=<?php echo $id;  ?>">
  <div class="form-group">
    <label >Post title</label>
    <input type="text" class="form-control"
    name="title" value="<?php echo $post['title']; ?>" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label >Post body</label>
    <textarea name="body" class="form-control"
     placeholder="Enter post body">
     <?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label >Catagory select</label>
    <select name="catagory"
    multiple class="form-control">
    <?php while($row = $catagories->fetch_assoc()) : ?>
      <option value="<?php echo $row['id'] ?>"
      <?php if($post['catagory'] == $row['id'])
      {echo "selected";}
      ?>><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label >Author</label>
    <input type="text" class="form-control"
    name="author" value="<?php echo $post['author']; ?>"
     placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label >Tags</label>
    <input type="text" class="form-control"
    name="tags" value="<?php echo $post['title']; ?>"
     placeholder="Enter tags">
  </div>
<div>
  <button type="submit" name ="submit"
  class="btn btn-default">Submit</button>
</div>
<hr>
<input type="submit" name="delete"
 class="btn btn-danger" value="delete">
<hr>
<div>
  <a href="index.php"
  class="btn btn-default">Cancel</a>
</div>

</form>


<?php include 'includes/footer.php'; ?>
