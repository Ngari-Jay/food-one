<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
           <!------these are styles or css for the table tr th and td--------->
           <?php 
include('../config/constants.php')?>
<?php
include('partials/login-check.php') 
?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
    <!-------menu section starts here--------->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - Order Page | Jaysoft E-Food Ordering System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
        <!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
    <!-------menu section starts here--------->
    <div class="menu">
        <div class="wrapper">
       <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-Admin.php">Admin</a></li>
        <li><a href="manage-category">Category</a></li>
        <li><a href="manage-food.php">Food</a></li>
        <li><a href="manage-order.php">Order</a></li>
        <li><a href="logout.php">Logout</a></li>
       </ul>
        </div>
    </div>
    <!-------menu section Ends  here--------->

 <!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
    <!-------menu section starts here--------->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

<!-----------Lets get the current details in the database to update order------->
<?php 
        //1. Get id of selected order
        $id = $_GET['id'];
        //2. Create SQL query to get the details 
        $sql = "SELECT * FROM tbl_order WHERE id= $id";
        //3. Execute the query
        $res = mysqli_query($conn, $sql);
        //4. checking whether the query is executing successfully or not
        if($res==TRUE)
        {
            //5. checking if there is data in the database or not available
            $count = mysqli_num_rows($res);  //function to Get all the admins data from the database
             // 6. check wether we have admins data or not in the database
             if($count==1)
             {
               // 7. Get the details of the order
              // echo "Order Available";
              $row=mysqli_fetch_assoc($res);
            // 8. Lets Get Individual data from the database
              $food= $row['food'];
              $price = $row['price'];
              $qty= $row['qty'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
              $customer_address = $row['customer_address'];
             }
             else
                    {
                //8. Redirecting to manage order page
                header("location:".SITEURL.'admin/manage-order.php');
                     }
        }
        ?>
    <form action=""method="POST">
    <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><b>Kshs.<?php echo $price; ?></b></td>
                </tr>
                <tr>
                    <td>Qty:</td>
                    <td>
                    <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status">
                                    <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                                    <option <?php if($status=="On Delivery"){echo "selected";}?>value="On Delivery">On Delivery</option>
                                    <option <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Delivered</option>
                                    <option <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Cancelled</option>
                                    <option <?php if($status=="Inpreparation"){echo "selected";}?>value="Inpreparation">Inpreparation</option>
                            </select>
                        </td>
                        <tr>
                            <td>Customer Name:</td>
                            <td>
                                <input type="text" name="customer_name"value="<?php echo $customer_name; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Contact:</td>
                            <td>
                                <input type="text"name="customer_contact"value="<?php echo $customer_contact; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Email:</td>
                            <td>
                                <input type="text"name="customer_email"value="<?php echo $customer_email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Address:</td>
                            <td>
                                <textarea name="customer_address" cols="20" rows="5"><?php echo $customer_address; ?></textarea>
                            </td>
                        </tr>
                    </tr>
                    <tr>
                        <input type="hidden"name="id"value="<?php echo $id; ?>">
                        <input type="hidden"name="price"value="<?php echo $price; ?>">
        <td colspan="2">
        <input type="submit" name= "submit" value="Update Order" class="btn-secondary">
        </td>
    </tr>
    </tr>
    </table>
</form>
<?php

// lets process the data to update category
// chech whether the button is clicked or not
if(isset($_POST['submit']))
{
    //button clicked
     //echo "Button Clicked";
     //1. we need to get the data from the form
     $id= $_POST['id'];
     $price=$_POST['price'];
     $qty =$_POST['qty'];
//calculate the total price
     $total =$price * $qty;
     $status=$_POST['status'];
     $customer_name = $_POST['customer_name'];
     $customer_contact=$_POST['customer_contact'];
     $customer_email=$_POST['customer_email'];
     $customer_address=$_POST['customer_address'];
      //3. updating database details
      $sql2 = "UPDATE tbl_order SET 
      qty=$qty,
      total=$total,
      status='$status',
      customer_name= '$customer_name',
      customer_contact= '$customer_contact',
      customer_email= '$customer_email',
      customer_address= '$customer_address' 
      WHERE id = '$id'
      ";
     //Lets execute the query
     $res2 = mysqli_query($conn, $sql2);
     if($res==TRUE)
{
    //query executed and order details updated Successfully
        // create session variable to display message
        $_SESSION['update-order'] = "<div class='success'>Order Details Updated Successfully.</div>";
        // redirecting our page
        header("location:".SITEURL.'admin/manage-order.php');
}
else
{
            // create session variable to display message
            $_SESSION['update-order'] = "<div class='error'>Failed Order Details Not Update.Try Again.</div>";
            // redirecting our page
            header("location:".SITEURL.'admin/manage-order.php');
}
}
?>
</div>
</div>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<?php include('partials/footer.php')?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->