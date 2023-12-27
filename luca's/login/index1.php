<?php

// regulate input with an allow list to prevent SQL injection
$allowed = array("0", "1");
if (isset($_GET['completed']) && in_array($_GET['completed'], $allowed)) {
  $completed = $_GET['completed'];
}

// 1. Create a database connection
$db = mysqli_connect("localhost", "LUKE 609", "123", "login", 3306);

// Test if connection succeeded (recommended)
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$sql = "SELECT * FROM tbl_member";
if (isset($completed)) {
  $sql .= "WHERE completed = {$completed} ";
}
$sql .= "ORDER BY id";
$result = mysqli_query($db, $sql);

// Test if query succeeded (recommended)
if (!$result) {
  exit("Database query failed.");
}

// 3. Use returned data (if any)

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Task List</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <nav>
    <a href="new.php">+ New Task</a>
  </nav>

  <section>

    <h1>Task List</h1>


<table>
  <tr>
    <th>ID</th>
    <th>username</th>
    <th>First_name</th>
    <th>Last_name</th>
    <th>mobile_number</th>
    <th>address</th>
    <th>city</th>
    <th>Email</th>
    <th>password</th>
    <th>created_at</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php while ($task = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $task['id']; ?></td>
      <td><?php echo $task['username']; ?></td>
      <td><?php echo $task['First_name']; ?></td>
      <td><?php echo $task['Last_name']; ?></td>
      <td><?php echo $task['mobile_number']; ?></td>
      <td><?php echo $task['address']; ?></td>
      <td><?php echo $task['city']; ?></td>
      <td><?php echo $task['Email']; ?></td>
      <td><?php echo $task['password']; ?></td>
      <td><?php echo $task['created_at']; ?></td>
      <td><a href="show.php?id=<?php echo $task['id']; ?>">View</a></td>
      <td><a href="edit.php?id=<?php echo $task['id']; ?>">Edit</a></td>
    </tr>
  <?php } ?>
</table>


  </section>

</body>

</html>

<?php
// 4. Release returned data
mysqli_free_result($result);

// 5. Close database connection
mysqli_close($db);
?>