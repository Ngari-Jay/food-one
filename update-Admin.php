
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<?php include('../config/constants.php') ?>

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
    <title>Update - Admin Page | Jaysoft E-Food Ordering System </title>
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
        <h1>Update Admin</h1>
   
        <!-----------Lets get the current details in the database to update------->
        <?php 
        //1. Get id of selected admin
        $id = $_GET['id'];
        //2. Create SQL query to get the details 
        $sql = "SELECT * FROM tbl_admin WHERE id= $id";
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
               // 7. Get the details of the admin
              // echo "Admin Available";
              $row=mysqli_fetch_assoc($res);
            // 8. Lets Get Individual data from the database
              $full_name = $row['full_name'];
              $username = $row['username'];
             }
             else
                    {
                //8. Redirecting to manage admin page
                header("location:".SITEURL.'admin/manage-Admin.php');
                     }
        }
        ?>
        <form action="" method ="POST">

        <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                     <td colspan="2">
                        <!------lets hide the id of the admin if you want to understand well replace the text type in input to text not hiden--->
                     <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                     </td>
                 </tr>
                <tr>
                 
            </table>
        </form>
    </div>
</div>
<?php
// chech whether the button is clicked or not
if(isset($_POST['submit']))
{
    //button clicked
//echo "button clicked";
//1. Lets Get all  values from the form to update
$id =$_POST['id'];
$full_name =$_POST['full_name'];
$username =$_POST['username'];
//2. create SQL query to UPDATE ADMIN
$sql = "UPDATE tbl_admin SET 
full_name = '$full_name',
username = '$username' 
WHERE id = '$id'
";

//Lets execute the query
$res = mysqli_query($conn, $sql);
//checking wether the query executed successfully or not
if($res==TRUE)
{
    //query executed and admin details updated Successfully
        // create session variable to display message
        $_SESSION['update'] = "<div class='success'>Admin Details Updated Successfully.</div>";
        // redirecting our page
        header("location:".SITEURL.'admin/manage-Admin.php');
}
else
{
            // create session variable to display message
            $_SESSION['update'] = "<div class='error'>Failed Admin Details Not Update.Try Again.</div>";
            // redirecting our page
            header("location:".SITEURL.'admin/manage-Admin.php');
}
}
?>
        
        <!-------Footer section starts here--------->
<?php include('partials/footer.php') ?>
    <!-------Footer section Ends  here--------->
    
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
</body>
</html>



