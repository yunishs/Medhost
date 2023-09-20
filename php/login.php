<?php
    include ("..\database\connect.php");
    $role='';
    // $_SESSION["username"]=$_SESSION["password"]=$_SESSION["role"]=$role;
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
            // header("Location: searchpatient.php");
            if(!isset($_SESSION["username"] )) { //check if there is session of the user 
                //fetch role
                //timeout after 12hrs 12*60*60
                        // if(time()-$_SESSION["login_timestamp"]>43200)
                        // {
                        //     session_unset();
                        //     session_destroy();
                            
                        // }
                // else
                // {

                //     echo "<script>alert('Welcome ".$_SESSION["username"]."')</script>";
                //     if($_SESSION["role"]==0){
                //         header('Location:dashboard.php');
                //     }
                //     elseif($_SESSION["role"]==1){
                //         header("Location:searchpatient.php");
                //     }
                //     elseif($_SESSION["role"]==2){
                //         header("Location:individual_doc_view.php");
                //     }
                //     elseif($_SESSION["role"]==3){
                //         header("Location:pat_registration.php");
                //     }
                
                // }
            // }    
            // else{// check username and pass correct
					$email=$row['email'];
					$password=$row['password'];
                    $role=$row['role'];
                    $_SESSION["username"]=$email;
                    $_SESSION["password"]=$password;
                    $_SESSION["login_timestamp"]=time();
                    $_SESSION["role"]=$role;
                    echo "<script>alert('Welcome ".$_SESSION["username"],$_SESSION["password"],$_SESSION["login_timestamp"]
                        ,$_SESSION["role"]."')</script>";

                    echo "<script>alert('Welcome ".$_SESSION["username"]."')</script>";
                    if($_SESSION["role"]==0){
                        header("Location:dashboard.php");
                    }
                    elseif($_SESSION["role"]==1){
                        header("Location:searchpatient.php");
                    }
                    elseif($_SESSION["role"]==2){
                        header("Location:individual_doc_view.php");
                    }
                    elseif($_SESSION["role"]==3){
                        header("Location:pat_registration.php");
                    }
                
            }
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