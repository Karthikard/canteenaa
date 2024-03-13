<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!--font awesome link-->
    <!--cdn-content delivery network-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-border mt-5 ">
        <thead class="bg-info">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total sold</th>
                <th>Status</th>
                <th>Edit </th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php 
                $get_products="Select * from `products`";
                $result=mysqli_query($con,$get_products);
                $number=0;
                while($row=mysqli_fetch_assoc($result))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    $number++;
                    ?>
                    <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
                    <td><?php echo $product_price; ?></td>
                    <td><?php 
                    $get_count="Select * from `orders_pending` where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?></td>
                    <td><?php echo $status; ?></td>
                    <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <!-- <td><a href='' class='text-dark'><i class='fa-solid fa-trash'></i></a></td> -->

                    <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    
                    
                    </tr>
                    <?php

                    
                }
                
            ?>
            

        </tbody>

    </table>
</body>

</html>