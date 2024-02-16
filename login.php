<?php

include("config.php");

if(isset($_POST['loginButton'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT email, password, role FROM user WHERE email = ? AND password = ? LIMIT 1";
    $stmt = mysqli_prepare($connection, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Check if the query was successful
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) == 1){
        // Authentication success, redirect to appropriate page
        $row = mysqli_fetch_assoc($result);
        if ($row['role'] == 1) {
            header("Location: admin.php?email=$email");
            exit();
        } elseif ($row['role'] == 2) {
            header("Location: student.php?email=$email");
            exit();
        }
    } else {
        // Authentication failure
        echo "Login failed";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

?>
