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
        <h1>Update Food</h1>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
            <?php
            if(isset($_GET['id']))
            {
                //Get id and other details
                $id =$_GET['id'];
                //creating sql to get the data
               $sql = "SELECT * FROM tbl_food WHERE id=$id";
               //4. Executing querry and get data from database
               $res = mysqli_query($conn, $sql);
               //count rows checking whether id is valid or not
            $count = mysqli_num_rows($res); 
            if($count==1)
            {
                // Get all the data
                $row=mysqli_fetch_assoc($res);
                //1. we need to get the data from the form
                $title =$row['title'];
                $description =$row['description'];
                $current_image =$row['image_name'];
                $price =$row['price'];
                $featured =$row['featured'];
                $active =$row['active'];
            }
            else
            {
                // Redirect to manage category page with session message
                // create session variable to display message
                $_SESSION['no-category-Found'] = "<div class='error'>Category Not Found!!!</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-category.php');
            }
             }
             else
             {
                //redirecting to manage category page
                header("location:".SITEURL.'admin/manage-category.php');
             }
            ?>
            <form action="" method= "POST" enctype ="multipart/form-data">
<table class="tbl-30">
    <tr>
             <td>Title:</td>
             <td>
                <input type="text" name= "title" value="<?php echo $title; ?>">
             </td>
    </tr>
    <tr>
             <td>Description:</td>
             <td>
                <textarea name="description"cols="20" rows="5"><?php echo $description; ?></textarea>
             </td>
    </tr>
    <tr>
             <td>Current Image:</td>
             <td>
                <?php 
                     // we need to display the image if available
                     if($current_image!="")
                     {
                        //Display the Image
                        ?>
                        <img src="<?php echo SITEURL; ?>images/foods/<?php echo $current_image; ?>" width="80px" height="80px">
                        <?php
                     }
                     else
                     {
                        //display massesge
                        echo "<div class='error'>Image Not Added</div>";
                     }
                ?>

        </td>
    </tr>
    <tr>
        <td>New Image:</td>
        <td>
            <input type="file" name= "image" value="">
        </td>
    </tr>
    <tr>
                <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";}?>  type="radio" name="active" value="No">No
                    </td>
                </tr>
    <tr>
                <td>Price:</td>
        <td>
            <input type="number" name= "price" value="<?php echo $price; ?>">
        </td>
    </tr>
    <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php 
                            //php code to display categories from database
                            //1. create sql code to get the data active categories
                            $sql ="SELECT * FROM tbl_category WHERE active ='Yes'";
                            //4. Executing querry and get the data from database
                            $res = mysqli_query($conn, $sql);
                            //count rows to check if we have categories or not
                            $count = mysqli_num_rows($res); 
                            // check the number of rows if is greater than ziro meaning we have categories
                             if($count>0)
                                {
                                    // we have categories
                                    //this means we have data in the database
                                    // lets use while loop to get the data from database
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                         // lets use while loop to get the data from database
                                          // while loop will execute only if we have data in the database
                                          // Lets Get Individual data from the database
                                          $category_id=$row['id'];
                                          $category_title=$row['title'];
                                          ?>
                                          <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                          <?php
                                    }
                                          

                                }
                                else
                                {
                                    //No categories add directing to add categories
                                    ?>
                                    <option value="0">No Food Categories Found</option>
                                    <?php
                                }
                            //2. display on dropdown
                            ?>
                        </select>
                    </td>
                </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name= "submit" value="Update Food" class="btn-secondary">
        </td>
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
     $title=$_POST['title'];
     $description=$_POST['description'];
     $current_image =$_POST['current_image'];
     $price=$_POST['price'];
     $current_category = $_POST['category_id'];
     $featured=$_POST['featured'];
     $active=$_POST['active'];
     // 2. updating new image when selected
     if(isset($_FILES['image']['name']))
         {
             //Getting Image Details
             $image_name=$_FILES['image']['name'];
             // wether image is available or not
             if($image_name!="")
             {
                //image available
                // A. upload the new image

                //Auto renaming the image
            //Get the image extention
            $ext=end(explode('.', $image_name));
            // Renaming the image
           $image_name = "Food-Name_".rand(000,999).'.'.$ext;   //renaming the image to Food_category_111 aoutomatic
          $source_path=$_FILES['image']['tmp_name'];

          $destination_path="../images/foods/".$image_name;
   
          //finally upload the image
           $upload=move_uploaded_file($source_path,$destination_path);
          // Check whether image uploaded or not
          //and if not uploaded then stop the process and redirect with error message
        if($upload==false)
            {
                //set message
                 $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
                //B. remove current image if available
                if($current_image!="")
                {
                    $remove_path = "../images/foods/".$current_image;
                    $remove= unlink($remove_path);
                        // if failed remove error message and stops the process
                        if($remove==false)
                        {
                            //failed to remove the image
                            //stops the process
                            // create session variable to display message
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current image. Try Again</div>";
                             // redirecting our page
                            header("localhost:".SITEURL.'admin/manage-food.php');
                            die();//stops the process
                 }
                }
             else
             {
                $image_name=$current_image;
             }
         }
  else
  {
    $image_name=$current_image;
  }
     //3. updating database details
     $sql2 = "UPDATE tbl_food SET 
          title='$title',
          description='$description',
          price=$price,
          image_name='$image_name',
          featured = '$featured',
          active = '$active' 
          WHERE id = '$id'
          ";
         //Lets execute the query
         $res2 = mysqli_query($conn, $sql2);
     //4. redirect to manage category message
            //checking wether the query executed successfully or not
        if($res2==TRUE)
            {
                //Category updateded Successfully
                // create session variable to display message
                $_SESSION['update-food'] = "<div class='success'>Food Details Updated Successfully.</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-food.php');
            }
            else
            {
                //Failed to update Category Details
                // create session variable to display message
                $_SESSION['update-food'] = "<div class='error'>Failed To Update Food Details!!.</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-food.php');
            }
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