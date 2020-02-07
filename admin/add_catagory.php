<?php include 'includes/header.php'; ?>
<?php

$db = new Database();

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  if($name == ""){
    $error = "Please fill out all require fields";
  }else{
    $sql = "INSERT INTO catagories (name) ";
    $sql .= "VALUES ('$name')";

    $insert_row = $db->insert($sql);


  }

}

 ?>

<form method="post" action="add_catagory.php">
  <div class="form-group">
    <label >Catagory Name</label>
    <input type="text" class="form-control"
    name="name"  placeholder="Enter catagory">
  </div>
<div>
  <button type="submit" name ="submit"
  class="btn btn-default">Submit</button>
</div>
<div>
  <a href="index.php"
  class="btn btn-default">Cancel</a>
</div>

</form>

<?php include 'includes/footer.php'; ?>
