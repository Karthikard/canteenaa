<?php
    include('../includes/connect.php');
    include('../function/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    

    <!--font awesome link-->
    <!--cdn-content delivery network-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link-->
    <link rel="stylesheet" href="../style.css">

    <style>
        body
        {
            overflow:hidden;
        }
    </style>
</head>
<!-- <body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin1.jpg" alt="Admin Registration image" class="img-fluid">
            </div>

            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username" 
                                required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" 
                                required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create password" 
                                required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Create password" 
                                required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 " name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body> -->
<body>
<div class="container-fluid m-3">
        <h2 class="text-center mb-5">ADMIN REGISTRATION</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin1.jpg" alt="Admin Registration image" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <!-- user name field -->
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="enter your username" 
                            autocomplete="off" required="required" name="user_username">
                        </div>
                        
                        <div class="form-outline mb-4">
                            <!-- email field -->
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="enter your email" 
                            autocomplete="off" required="required" name="user_email">
                        </div>

                        <div class="form-outline mb-4">
                            <!-- password field -->
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Set Password" 
                            autocomplete="off" required="required" name="user_password">
                        </div>

                        <div class="form-outline mb-4">
                            <!--confirm password field -->
                            <label for="conf_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="conf_user_password" class="form-control" placeholder="Re-Enter Password" 
                            autocomplete="off" required="required" name="conf_user_password">
                        </div>

                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="admin_login.php" class="text-danger"> Login</a></p>
                        </div>

                    </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- php vode -->

<?php 
    if(isset($_POST['user_register']))
    {
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];

        // password hashing technique
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];

        // select query
        $select_query="Select * from `admin_table` where username = '$user_username' or user_email='$user_email'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0)
        {
            echo "<script>alert('User name and email already exist') </script>";
        }
        else if( $user_password != $conf_user_password)
        {
            echo "<script>alert('passwords not matched')</script>";
        }
        else
        {
        // insert query
        $insert_query="insert into `admin_table` (username,user_email,user_password)
            values ('$user_username','$user_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);

        
        }
    
    }


?>