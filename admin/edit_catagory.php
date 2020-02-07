<?php include 'includes/header.php'; ?>
<?php

$db = new Database();

$id = $_GET['id'];
$query = "SELECT * FROM catagories WHERE id=".$id;


$catagory= $db->select($query);
$catagory = $catagory->fetch_assoc();

 ?>
 <?php
 if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($db->link,
   $_POST['name']);

   if($name == ""){
     $error = "Please fill out all require fields";
   }else{
     $sql = "UPDATE  catagories SET name='$name'
       WHERE id = '$id'";

     $update_row = $db->update($sql);


   }

 }
 ?>
 <?php
if(isset($_POST['delete'])){
  $sql = "DELETE FROM catagories WHERE id=".$id;
  $delete_row = $db->delete($sql);
}


  ?>
<form method="post" action="edit_catagory.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label >Catagory Name</label>
    <input type="text" class="form-control"
    name="name"  value="<?php echo $catagory['name'] ?>"
    placeholder="Enter catagory">
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
