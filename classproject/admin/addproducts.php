<?php
include '../connection.php';

if(isset($_POST['btn_add']))
{

    $qty = $_POST['qty'];
    $proname = $_POST['proname'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    

    $img = $_FILES['img_file']['name'];
$temp = $_FILES['img_file']['tmp_name'];
move_uploaded_file($temp,'img/'.$img);

$query_insert = "insert into product values(null,'$img','$proname','$price','$qty','$category') ";
$res = mysqli_query($conn, $query_insert);
    if($res)
    {
       header("Location:product_details.php");
    }


}


?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <?php
    include 'header.php';
    ?>
    <div class= "content-body">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Add_Product</h4>
                                    <form action="addproducts.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><strong>Product</strong></label>
                                            <input type="text" name="proname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Price</strong></label>
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Qty</strong></label>
                                            <input type="number" name="qty" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Image</strong></label>
                                            <input type="file" name="img_file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Select Category</strong></label>
                                            <select name="category" class="form-control">
                                            <?php
        
        $query_select= "select * from category";
        $res=mysqli_query($conn,$query_select);
        while($row=mysqli_fetch_array($res)) 
              {
                
                        echo '<option value='.$row['category_id'].'>'.$row['category_name'].'</option>';
                        
                      }
   ?>    </select>
    <br/>
                                        

                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                           
                                            
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" name="btn_add" class="btn btn-primary btn-block" value="Add"/>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>