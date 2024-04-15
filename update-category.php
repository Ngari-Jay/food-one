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
    padding: 3%;
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
    <title>Update - Category Page | Jaysoft E-Food Ordering System</title>
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
        <h1>Update Category</h1>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
            <?php
            if(isset($_GET['id']))
            {
                //Get id and other details
                $id =$_GET['id'];
                //creating sql to get the data
               $sql = "SELECT * FROM tbl_category WHERE id=$id";
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
                $current_image =$row['image_name'];
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
        <td>Current Image:</td>
        <td>
                <?php 
                     // we need to display the image if available
                     if($current_image!="")
                     {
                        //Display the Image
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="80px" height="80px">
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
        <td colspan="2">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name= "submit" value="Update Category" class="btn-secondary">
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
     $current_image =$_POST['current_image'];
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
           $image_name = "Food_category_".rand(000,999).'.'.$ext;   //renaming the image to Food_category_111 aoutomatic
          $source_path=$_FILES['image']['tmp_name'];

          $destination_path="../images/category/".$image_name;
   
          //finally upload the image
           $upload=move_uploaded_file($source_path,$destination_path);
          // Check whether image uploaded or not
          //and if not uploaded then stop the process and redirect with error message
        if($upload==false)
            {
                //set message
                 $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
                //B. remove current image if available
                if($current_image!="")
                {
                    $remove_path = "../images/category/".$current_image;
                    $remove= unlink($remove_path);
                        // if failed remove error message and stops the process
                        if($remove==false)
                        {
                            //failed to remove the image
                            //stops the process
                            // create session variable to display message
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current image. Try Again</div>";
                             // redirecting our page
                            header("localhost:".SITEURL.'admin/manage-category.php');
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
     $sql2 = "UPDATE tbl_category SET 
          title = '$title',
          image_name ='$image_name',
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
                $_SESSION['update-cat'] = "<div class='success'>Category Details Updated Successfully.</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-category.php');
            }
            else
            {
                //Failed to update Category Details
                // create session variable to display message
                $_SESSION['update-cat'] = "<div class='error'>Failed To Update Category Details!!.</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/manage-category.php');
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