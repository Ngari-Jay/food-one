<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<style>
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
        <h1>Add Admin</h1>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
        <!-------------lets create form to be filled to add admin to database-------->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name"placeholder="Enter Your Full Name" required></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username"placeholder="Your username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password"placeholder="Your password" required></td>
                </tr>
                <tr>
                     <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                     </td>
                 </tr>
                 
            </table>
        </form>
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

<?php 
//process the values from the and save it to database
// chech whether the button is clicked or not
if(isset($_POST['submit']))

{
    //button clicked
    //echo "button clicked";
     //1. we need to get the data from the form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // password Encryption using md5 
  
      //2. creating sql querry to save to database
      $sql ="INSERT INTO tbl_admin SET 
      full_name='$full_name',
      username='$username',
      password='$password' 
      ";

    //4. Executing querry and save data to database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    //5. check whether the (query is executed correctly) data inserted or not and display appropriate message
    if($res==TRUE)
    {
            //data inserted
           // echo "Admin Added Successfully!!";
           // create session variable to display message
           $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
           // redirecting our page
           header("location:".SITEURL.'admin/manage-Admin.php');
    }
    else
             {
                 // create session variable to display message
           $_SESSION['add'] = "<div class='error'>Failed to Add Admin. Try Again Later!!</div>";
           // redirecting our page
           header("location:".SITEURL.'admin/manage-Admin.php');
             }
}
?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<?php
include('partials/footer.php') 
?>