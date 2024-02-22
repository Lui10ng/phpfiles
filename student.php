<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database for records with role = 2
$sql = "SELECT user_id, username, firstname, middlename, lastname, role, datecreated, email FROM user WHERE role = 2";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>University Student List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<h1>University Student List - Role 2</h1>

<table>
  <tr>
    <th>User ID</th>
    <th>Username</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Role</th>
    <th>Date Created</th>
    <th>Email</th>
  </tr>

  <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['middlename']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['role']}</td>
                    <td>{$row['datecreated']}</td>
                    <td>{$row['email']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
    }

    $conn->close();
  ?>
</table>

</body>
</html>
