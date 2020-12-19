<?php
include "inc/header.php";
include "database.php";
include "config.php";
?>

<?php

// $db = new Database();
// $query = "SELECT * FROM user_data";

// $read = $db->select($query)
?>

<?php

$db = new Database();
$query = "SELECT * FROM user_data";
$read = $db->select($query);

?>
<?php

if (isset($_GET['message'])) {
    echo "<span style='color:red'>" . $_GET['message'] . "</span>";
}

?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0" style="margin-top: 5%;">

  <div class="container">

   <div class="row">
       <div class="col-md-12">
       <a class="btn btn-primary" href="create.php" style="margin-bottom:2%">Create</a>
       <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Skill</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;?>
      <?php if ($read) {?>
        <?php while ($row = $read->fetch_assoc()) {?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['skill']; ?></td>
      <td>
        <a href ="update.php?id=<?php echo urlencode($row['id']); ?>"type="button" class="btn btn-success">EDIT</a>
       
        <a href ="update.php?id=<?php echo urlencode($row['id']); ?>"type="button" class="btn btn-danger">DELETE</a>
      </td>
     
    </tr>
      <?php }?>
      <?php } else {?>
        <h2>No Data Found </h2>
      <?php }?>
  </tbody>
</table>
       </div>
   </div>
  </div>
</main>

<?php

include "inc/footer.php";
?>
