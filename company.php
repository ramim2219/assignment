<?php
    include 'connection.php';
    $s = "SELECT c.name as company_name,a.name as company_type from companies as c inner join accesories_type as a on a.id = c.company_id;";
    $query = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php';?>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <th>Company name</th>
                <th>Category</th>
            </thead>
            <tbody>
                <?php
                    while($r=mysqli_fetch_array($query))
                    {
                        ?>
                            <tr>
                                <td><?php echo $r['company_name']?></td>
                                <td><?php echo $r['company_type']?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>