<?php include "includes/header.php"; ?>
<?php
$db = new Database();

$sql = "SELECT posts.*, catagories.name FROM posts
        INNER JOIN catagories ON
        posts.catagory=catagories.id
        ORDER BY posts.id DESC";

$posts = $db->select($sql);


$query = "SELECT * FROM catagories ORDER BY id DESC";


$catagories = $db->select($query);

 ?>

<table class="table table-striped">
  <tr>
    <th>Post ID</th>
    <th>Post title</th>
    <th>catagory</th>
    <th>author</th>
    <th>date</th>
  </tr>

    <?php while ($row = $posts->fetch_assoc()) : ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="edit_post.php?id=<?php echo $row['id'] ?>"
      ><?php echo $row['title']; ?></a></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo format_date($row['date']); ?></td>
  </tr>
  <?php endwhile; ?>
</table>


<table class="table table-striped">
  <tr>
    <th>catagory ID</th>
    <th>Catagory Name</th>
  </tr>
  <?php while ($row = $catagories->fetch_assoc()) : ?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><a href="edit_catagory.php?id=<?php echo $row['id'] ?>"
    ><?php echo $row['name']; ?></a></td>
</tr>
<?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>
