<?php

include("config.php");

if(isset($_POST['loginButton'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT 'email', 'password', 'role' FROM 'user' LIMIT 1";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) > 0){
        $row = mysqli_fetch_assoc($sql_run);
        $role = $row['role'];

        if($role == 1){
            header("Location: admin.php");
            exit;
}      elseif($role == 2){
            header("Location: student.php");
            exit;

}       else{
            echo "Invalid role";
}
} else{
    echo "User not Found";
}
}
?>
