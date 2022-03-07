<?php
include '../connection.php';
$query_select = "select * from product inner join category on product.category_id=category.category_id";
$result = mysqli_query($conn,$query_select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>
<body>
    <?php
    include 'header.php'
    ?>
   <!-- <div class="col-lg-12">--->
       <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Details</h4>
                <form action="product_details.php" method="post">
                <h2> <input type="search" name="txt_search" class="form-group"/> <input type="submit" name="sub_search" class="btn btn-dark"/> </h2></form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
   
     if(isset($_POST['sub_search']))
                            {
                                $txtsearch = trim($_POST['txt_search']);
                               if($txtsearch>0 || $txtsearch <0)
                               {
                                $query_select = "select * from product inner join category on product.category_id=category.category_id where productname like '$txtsearch%' or category_name like '$txtsearch%' or price like $txtsearch ";
                               }
                            else
                            {
                                $query_select = "select * from product inner join category on product.category_id=category.category_id where productname like '$txtsearch%' or category_name like '$txtsearch%' or price like 0 ";
                            }
                                


                                $result = mysqli_query($conn,$query_select);
                                while($row=mysqli_fetch_array($result))
                                {
                            ?>
                            <tr>
                                <td><?php echo $row['productname'] ?></td>
                                <td><img src="img/<?php echo $row['pro_img'] ?>" width="100" height="100"/>
                                </td>
                                <td><?php echo $row['price'] ?> </td>
                                <td><span ></span>
                                <?php echo $row['category_name'] ?>
                                </td>
                                <td>
                                    <span>
                                        <a href="./editproducts.php" class="mr-4" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted"></i> </a>
                                        <a href="javascript:void()" data-toggle="tooltip"
                                            data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a>
                                    </span>
                                </td>
                            </tr>
                         <?php

                        }
                            }

                    
                        while($row=mysqli_fetch_array($result))
                        {
                            ?>
                            <tr>
                                <td><?php echo $row['productname'] ?></td>
                                <td><img src="img/<?php echo $row['pro_img'] ?>" width="100" height="100"/>
                                </td>
                                <td><?php echo $row['price'] ?> </td>
                                <td><span ></span>
                                <?php echo $row['category_name'] ?>
                                </td>
                                <td>
                                    <span>
                                        <a href="./editproducts.php" class="mr-4" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted"></i> </a>
                                        <a href="javascript:void()" data-toggle="tooltip"
                                            data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a>
                                    </span>
                                </td>
                            </tr>
                         <?php

                        }
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
</body>
</html>