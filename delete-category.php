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
// here we do not need the menu or the footer we only dealing with data processing that is delete category
//get the id of the category to be delete
 $id = $_GET['id'];
 $image_name = $_GET['image_name'];
 //Remove physical image from the category folder
            if($image_name!="")
                {
                    // Image available. remove it
                    $path = "../images/category/".$image_name;
                    //remove the image
                    $remove= unlink($remove_path);
                    // if failed remove error message and stops the process
                    if($remove==false)
                    {
                        //failed to remove the image
                        //stops the process
                        // create session variable to display message
                        $_SESSION['remove'] = "<div class='error'>Failed to Remove Category image. Try Again</div>";
                         // redirecting our page
                        header("localhost:".SITEURL.'admin/manage-category.php');
                        die();
                    }
                }
                // create the SQL to Delete category
                 $sql = "DELETE FROM tbl_category WHERE  id=$id";
                //Lets execute the query
                $res = mysqli_query($conn, $sql);
                //checking wether the query executed deleted from database successfully
                if($res==TRUE)
                        {
                                //Query Executed successfully and category Deleted
                                //echo "category Deleted Succesfully!!";
                                // create session variable to display message
                                $_SESSION['delete'] = "<div class='error'>Category Deleted Successfully.</div>";
                                // redirecting our page
                                header("location:".SITEURL.'admin/manage-category.php');
                        }
                            else
                                    {
                                        //echo "Failed to Delete category";
                                        // create session variable to display message
                                        $_SESSION['delete'] = "<div class='error'>Failed To Delete Category!!!!.</div>";
                                        // redirecting our page
                                        header("location:".SITEURL.'admin/manage-category.php');
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