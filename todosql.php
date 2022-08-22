<?php
require 'dbh.inc.php';
 if (isset($_POST['button'])) {



$date = $_POST['date'];
$work = $_POST['work'];
$datetodo = $_POST['datetodo'];



if (empty($date) || empty($work) || empty($datetodo)) {
  header("Location: ./index.php?error=emptyfields");
  exit();
} else {

  $sql = "INSERT INTO todo (date, work, datedo) VALUES (?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
 header("Location: ../index.php?error=sqlerror");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "sss", $date, $work, $datetodo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ./index.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
 }
