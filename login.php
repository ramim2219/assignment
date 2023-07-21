<?php include 'connection.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php';?>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" id="">
            </div>
            <div class="form-group mb-2">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['loginBtn'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $s = "select * from users_info where email='".$email."' 
        and password='".$password."'";
        $q = mysqli_query($conn, $s);
        $r=mysqli_fetch_assoc($q);
        if($r)
        {
            if($r['role']=="Buyer")
            {
                $_SESSION['name'] = $r['name'];
                $_SESSION['role'] = $r['role'];
                header('Location: customer_info.php');
            }
            else if($r['role']=="Seller")
            {
                $_SESSION['name'] = $r['name'];
                $_SESSION['role'] = $r['role'];
                header('Location: seller_dashboard.php');
            }
        }
        else
        {
            header("Location: login.php");
        }
    }
?>