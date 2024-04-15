<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
           <!------these are styles or css for the table tr th and td--------->
<style>

.wrapper{
    /*you can now remove the wrapper by removing the border*/
    /*border: 1px solid red;*/
    padding: 2px;
    width: 80%;
    margin: 0 auto;
}

 .tbl-full {
    width: 100%;
}
table tr th{
    border-bottom: 3px solid blue;
    padding: 1%;
    text-align: left;
}
table tr td{
    padding: 1%;
}
/*------these are styles or css for primary button*/
.btn-primary{
    background-color: blue;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
/*------these are styles or css for primary button hovering effect*/
.btn-primary:hover{
   background-color: #ff4757;
}
/*------these are styles or css for secondary update button*/
.btn-secondary{
    background-color: #7bedaf;
    padding: 1%;
    color: black;
    text-decoration: none;
    font-weight: bold;
}
/*------these are styles or css for secondary update button hovering effect*/
.btn-secondary:hover{
   background-color: blue;
}
/*------these are styles or css for secondary delete admin button*/
.btn-delete{
    background-color: red;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
/*------these are styles or css for primary button hovering effect*/
.btn-delete:hover{
   background-color: blue;
}
.success{
    color: green;
}
.error{
    color: red;
}
/*css for footer notes p tag*/
.text-center{
    text-align: center;
}
           </style>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
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
    <title>Jaysoft E-Food Ordering System | Homepage</title>
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
        <h1>Change Password</h1>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
            <?php
            if(isset($_GET['id']))
            {
                $id =$_GET['id'];
             }
            ?>
           
            <form action="" method= "POST">
<table class="tbl-30">
    <tr>
        <td>Current Password</td>
        <td>
            <input type="password" name= "current_password" value="" placeholder="Enter Your current password">
        </td>
    </tr>
    <tr>
        <td>New Password</td>
        <td>
            <input type="password" name= "new_password" value="" placeholder="Enter Your new password">
        </td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td>
            <input type="password" name= "confirm_password" value="" placeholder="Confirm password">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name= "submit" value="change password" class="btn-secondary">
        </td>
    </tr>

</table>
</form>
</div>
</div>

<?php 
//process the values from the and save it to database
// chech whether the button is clicked or not
if(isset($_POST['submit']))

{
    //button clicked
    //echo "button clicked";
     //1. we need to get the data from the form
          //1. we need to get the data from the form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']); // password Encryption using md5 
    $new_password = md5($_POST['new_password']); // password Encryption using md5 
    $confirm_password = md5($_POST['confirm_password']); // password Encryption using md5 
   //2. creating sql querry to save to database
   $sql ="SELECT * FROM tbl_admin WHERE 
   id=$id AND password='$current_password'";
       //4. Executing querry and save data to database
       $res = mysqli_query($conn, $sql);
       //5. check whether the (query is executed correctly) data inserted or not and display appropriate message
       if($res==TRUE)
       {
            //count rows checking whether we have data in the database or not having
            $count = mysqli_num_rows($res);  //function to Get all the rows from the database
            if($count==1)
            {
             //User Exists And Psswaord can be changed
            //echo "User Exists. Change The Password";
            // check wether the new password and confirm password match or not
            if($new_password==$confirm_password)
            {
                //we will update the password
                //echo "passwords match continue updating";
                //Since we are in the same code block we have to create another sql2 not the sql above
                $sql2 = "UPDATE tbl_admin SET 
                password = '$new_password' 
                WHERE id = '$id'
                ";
                // execute the query
                $res2 = mysqli_query($conn, $sql2);
                 //checking whether the query is executing successfully or not
                 if($res2==TRUE)
                 {
                    //display message 
                  // create session variable to display message
                 $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfuly</div>";
                 // redirecting our page
                 header("location:".SITEURL.'admin/manage-Admin.php');
                 }
                 else
                 {
                    //error message
                     // create session variable to display message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Failed To change Password. Kindly Try again.</div>";
                    // redirecting our page
                    header("location:".SITEURL.'admin/manage-Admin.php');
                 }
            }
            else
            {
                //will redirecting to manage admin with error message 
                 // create session variable to display message
         $_SESSION['pwd-not-match'] = "<div class='error'>Password Mismatch. Kindly Check Your Passwords and Try again.</div>";
         // redirecting our page
        header("location:".SITEURL.'admin/manage-Admin.php');
            }
    }
    else
    {
                 // create session variable to display message
                 $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                 // redirecting our page
                 header("location:".SITEURL.'admin/manage-Admin.php');
    }
    
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