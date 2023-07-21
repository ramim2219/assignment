<?php 
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['name'])){
        header('Location: login.php');
    }
    else if($_SESSION['role']=="Buyer")
    {
        header('Location: customer_info.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php';?>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <h2>Register Here</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Accessories Type</label>
                <select name="type" id="" class="form-control">
                    <option value="">Select Type</option>
                    <option value="1">Shoes</option>
                    <option value="2">Clothes</option>
                    <option value="3">Gadget</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="">images</label>
                <input type="file" name="f1" class="form-control" id="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submitBtn']))
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $file = $_FILES['f1'];
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];
        if($fileerror == 0)
        {
            $destfile = 'upload/'.$filename;
            move_uploaded_file($filepath,$destfile);
            $insertquery="INSERT INTO companies(name,company_id, price,image) VALUES ('$name','$type','$price','$destfile')";
            $query = mysqli_query($conn,$insertquery);
            if($query)
            {
                ?>
                <script>
                    alert("successfull");
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert("unsuccessfull");
                </script>
                <?php
            }
        }
    }
?>