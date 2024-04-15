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
</style>
<?php include('../config/constants.php') ?>
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
        <h1>Add Food</h1>
        <br><br>
        <?php
        if(isset($_SESSION['upload-image']))
            {
                echo $_SESSION['upload-image'];
                // lets remove the message
                unset($_SESSION['upload-image']);
            }
            ?>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
        <!-------------lets create form to be filled to add admin to database-------->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title"placeholder="Enter food title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="20" rows="5" placeholder="Describe the food"></textarea>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price"placeholder="Enter Price"></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
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
                                          $id=$row['id'];
                                          $title=$row['title'];
                                          ?>
                                          <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" >Yes
                        <input type="radio" name="active" value="No" >No
                    </td>
                </tr>
                <tr>
                     <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                     </td>
                 </tr>
                 
            </table>
        </form>

        <?php 
//process the values from the and save it to database
// check whether the button is clicked or not
if(isset($_POST['submit']))
{
    //button clicked
    //echo "button clicked";
    //1. we need to get the data from the form
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  //For the radio input we need to check if clicked or not FEATURED
  if(isset($_POST['featured']))
  {
    // get the value
    $featured = $_POST['featured'];
  }
  else
  {
    //SET the value froM default
    $featured = "No";
  }
  //For the radio input we need to check if clicked or not ACTIVE
  if(isset($_POST['active']))
  {
    // get the value
    $active = $_POST['active'];
  }
  else
  {
    //SET the value froM default
    $active = "No";
  }
  //2. get image if selected

  // 3. upload image
  //check whether the image is selected or not and set the value image name
  //print_r($_FILES['image']);
  //die(); //break the code here
  if(isset($_FILES['image']['name']))
  {
    //upload the image
    // to upload the image we need image name and source // destination
    $image_name=$_FILES['image']['name'];
    //upload image only if image selected
    if($image_name!="")
    {
        //Auto renaming the image
            //Get the image extention
            $ext=end(explode('.', $image_name));
            // Renaming the image
           $image_name = "Food-Name-".rand(000,999).'.'.$ext;   //renaming the image to Food_category_111 aoutomatic
          $source_path=$_FILES['image']['tmp_name'];

          $destination_path="../images/foods/".$image_name;
   
          //finally upload the image
           $upload=move_uploaded_file($source_path,$destination_path);
          // Check whether image uploaded or not
          //and if not uploaded then stop the process and redirect with error message
        if($upload==false)
            {
                //set message
                 $_SESSION['add-food'] = "<div class='error'>Failed to Upload Image</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/Add-food.php');
                //stop the process
                die();
            }
    }
  }
  else
  {
     //Don't Upload the image and set the image name value as blank
     $image_name = "";
  }
  // 4. save to databse
  //create sql query to add to database
  $sql2 ="INSERT INTO tbl_food SET 
          title='$title',
          description='$description',
          price=$price,
          image_name='$image_name',
          category_id=$category,
          featured='$featured',
          active='$active' 
        ";

    //4. Executing querry and save data to database
  $res2 = mysqli_query($conn, $sql2);
  if($res2==TRUE)
   {
            //data inserted
           // echo "Category Added Successfully!!";
           // create session variable to display message
        $_SESSION['add-food'] = "<div class='success'>Food Added Successfully.</div>";
           // redirecting our page
        header("location:".SITEURL.'admin/manage-food.php');  
   }
    else
        {
                 // create session variable to display message
         $_SESSION['add-food'] = "<div class='error'>Failed to Add Food. Try Again Later!!</div>";
           // redirecting our page
         header("location:".SITEURL.'admin/Add-food.php');
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
<?php include('partials/footer.php') ?>