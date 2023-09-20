<?php

    include ("..\database\connect.php");
    if(isset($_POST['login']))
    {
            $email= $_POST['email'];
            $password= $_POST['password'];

            $sql = "SELECT * From login_information WHERE email='$email' AND password='$password'";
            $result = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,  MYSQLI_ASSOC);
            $count= mysqli_num_rows($result);
        
        if($count==1){
            //"SELECT login_information.role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password'";

            // $query = "SELECT role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password';";
            // // $row = $query->fetch(PDO::FETCH_OBJ);
            // if($result->fetch('$role')=='0') {
            //     header('Location: admin_test.php');
            // } else {
            header("Location: searchpatient.php");
        }
        else
        {
            echo '<script>
                window.location.href="loginpage.php";
                alert("Login failed. Invalid username or password")
            </script>';
        } 
    }

?>