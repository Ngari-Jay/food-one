<?php include('partials/menu.php') ?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
            <!------create message box to display  admin added successfully---------> 
            <br/><br/>
            <!------create message box to display  admin added successfully---------> 
    	    <?php
            if(isset($_SESSION['add-cat']))
            {
              echo $_SESSION['add-cat'];
        //    lets remove the message
               unset($_SESSION['add-cat']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                // lets remove the message
                unset($_SESSION['upload']);
            }
            ?>

            <br/><br/>
        <!-------------lets create form to be filled to add admin to database-------->
        <form action="" method="POST" enctype ="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title"placeholder="Category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
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


<?php include('partials/footer.php')?>

<?php 
//process the values from the and save it to database
// check whether the button is clicked or not
if(isset($_POST['submit']))

{
    //button clicked
    //echo "button clicked";
     //1. we need to get the data from the form
  $title = $_POST['title'];
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
                 $_SESSION['add-cat'] = "<div class='error'>Failed to Upload Image</div>";
                // redirecting our page
                header("location:".SITEURL.'admin/Add-category.php');
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

//2. creating sql querry to save to database
          $sql ="INSERT INTO tbl_category SET 
          title='$title',
          image_name='$image_name',
          featured='$featured',
          active='$active' 
        ";

    //4. Executing querry and save data to database
  $res = mysqli_query($conn, $sql);
    //5. check whether the (query is executed correctly) data inserted or not and display appropriate message
if($res==TRUE)
   {
            //data inserted
           // echo "Category Added Successfully!!";
           // create session variable to display message
        $_SESSION['add-cat'] = "<div class='success'>Category Added Successfully.</div>";
           // redirecting our page
        header("location:".SITEURL.'admin/manage-category.php');
           
   }
    else
        {
                 // create session variable to display message
         $_SESSION['add'] = "<div class='error'>Failed to Add Category. Try Again Later!!</div>";
           // redirecting our page
         header("location:".SITEURL.'admin/Add-category.php');
        }
}
?>


