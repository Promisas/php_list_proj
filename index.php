<?php
  require 'todosql.php';
  require 'dbh.inc.php';
  session_start();
 /*?>
<?php
  $db = mysqli_connect('localhost', 'root', '', 'registration');

  if(isset($_POST['button'])) {
    $task = $_POST['task'];

    mysqli_query($db, "INSERT INTO todo (date, work, datedo) VALUES (?, ?, ?)");
    header('location: index.php');
  }

*/



$tasks = mysqli_query($conn, "SELECT * FROM todo");
if (isset($_GET['del_task'])) {
  $id = $_GET['del_task'];
  mysqli_query($conn, "DELETE FROM todo WHERE id=$id");
  header ('location: index.php');
}
  $error = "You must fill in the task";

    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>To do list</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<div class="heading">
  <h1>To do List</h1>
</div>
    <form action="todosql.php" method="post">
   <?php  if (isset($_GET['error']))  { ?>
        <p><?php echo  $error; ?></p>
      <?php } ?>

      <div class="">
     <label for="">Date</label>
      <input class="task_input" type='date' id='hasta' name="date" value='<?php echo date('Y-m-d');?>'>
      </div>
      <div class="">
       <label for="">Task</label>
        <input class="task_input" type="text" name="work" placeholder="Task To Do">
      </div>
      <div class="">
        <label for="">Until</label>
      <input class="task_input until" type='date' id='hasta' name="datetodo" value='<?php echo date('Y-m-d');?>'>
      </div>
      <button type="submit" name="button" class="add_btn">Add Task</button>
    </form>

<table>
  <thead>
    <tr>
      <th>Nr.</th>
      <th class="date">Date</th>
      <th>Task</th>
      <th class="date">Until</th>
      <th>Done</th>
    </tr>
    <tbody>



      <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
        <tr class="list">
          <td><?php echo $i; ?></td>
          <td ><?php echo $row['date']; ?></td>
          <td class="task"><?php echo $row['work']; ?></td>
          <td><?php echo $row['datedo']; ?></td>
          <td class="delete">
            <a href="index.php?del_task=<?php echo $row['id'];?>">X</a>
          </td>
        </tr>

      <?php $i++; } ?>

    </tbody>
  </thead>
</table>

  </body>
</html>
