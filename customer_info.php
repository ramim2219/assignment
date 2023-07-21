<?php 
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['name']))
    {
        header('Location: login.php');
    }
    else if($_SESSION['role']=="Seller")
    {
        header('Location: seller_dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php';?>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container mb-3">
        <form class="d-flex w-50 gap-2" action="" method="post">
            <h1>Filter</h1>
            <input type="number" name="min" class="form-control" id="" placeholder="min">
            <h1><b>-</b></h1>
            <input type="number" name="max" class="form-control" id="" placeholder="max">
            <button type="submit" name="filter_btn" class="btn btn-primary">OK</button>
        </form>
    </div>
    <div class="row">
    <?php
        if(isset($_POST['search_btn']))
        {
            $search_key=$_POST['name'];
            /* $selectquery = "SELECT * FROM upload_image Where name LIKE '%$search_key%'"; */
            $selectquery = "SELECT * FROM companies Where name LIKE '%$search_key%'";
        }
        else if(isset($_POST['filter_btn']))
        {
            $max = $_POST['max'];
            $min = $_POST['min'];
            /* $selectquery = "SELECT * FROM upload_image WHERE price BETWEEN '$min' AND '$max'"; */
            $selectquery = "SELECT * FROM companies WHERE price BETWEEN '$min' AND '$max'";
        }
        /* else $selectquery = "SELECT * FROM upload_image"; */
        else $selectquery = "SELECT * FROM companies";
        $query = mysqli_query($conn,$selectquery);
        while($res = mysqli_fetch_array($query))
        {
            ?>
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $res['image'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $res['name'];?></h5>
                        <p><b class="card-text">Price : $<?php echo $res['price'];?></b></p>
                        <a href="#" class="btn btn-primary">Buy now</a>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    </div>
</body>
</html>