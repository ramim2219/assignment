<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'link.php';?>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <h2>Register Here</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="cnf_password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="">Select Role</option>
                    <option value="Seller">Seller</option>
                    <option value="Buyer">Buyer</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cnf_password = $_POST["cnf_password"];
        $role = $_POST["role"];

        if($password == $cnf_password){
            $str = "INSERT INTO users_info(name, email, password, role)
            VALUES 
            ('".$name."', '".$email."', '".md5($password)."', '".$role."')";
            mysqli_query($conn,$str);
        }
        else {
            echo 'Password Mismatch';
        }
    }
?>