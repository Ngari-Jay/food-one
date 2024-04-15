<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->

<?php 
// include constants.php here for database connection
include('../config/constants.php');
// here we do not need the menu or the footer we only dealing with data processing that is delete admin
//get the id of the admin to be delete
 $id = $_GET['id'];
// create the SQL to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE  id=$id";
//Lets execute the query
$res = mysqli_query($conn, $sql);
//checking wether the query executed successfully
if($res==TRUE)
{
    //Query Executed successfully and Admin Deleted
    //echo "Admin Deleted Succesfully!!";
    // create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully.</div>";
    // redirecting our page
    header("location:".SITEURL.'admin/manage-Admin.php');
}
else
{
   // Failed to Delete Admin
   // echo "Failed To Delete Admin!!";
     // create session variable to display message
     $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again</div>";
     // redirecting our page
     header("localhost:".SITEURL.'admin/manage-Admin.php');
}
// get message that admin is deleted successfully

//*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
//Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
//alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
//which is a Technology Company owned by HIm*/
//* Rich him through Email: jacksonngari93@gmail.com
//Company Email: jaysoftsystems93@gmail.com
//Secondary Email: systemsjaysoft@gmail.com
//Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*