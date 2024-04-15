<?php include('partials/menu.php') ?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->



<!------Main content starts here--------->
<div class="main-content">
            <div class="wrapper">
                <!------for te dashboard title--------->
           <h1>Manage Food</h1>
           <br><br>
           <?php
           if(isset($_SESSION['upload-image']))
            {
                echo $_SESSION['upload-image'];
                // lets remove the message
                unset($_SESSION['upload-image']);
            }
            if(isset($_SESSION['add-food']))
             {
                 echo $_SESSION['add-food'];
                 // lets remove the message
                 unset($_SESSION['add-food']);
             }
             if(isset($_SESSION['update-food']))
             {
                 echo $_SESSION['update-food'];
                 // lets remove the message
                 unset($_SESSION['update-food']);
             }
            ?>
          <!------create button to add Food--------->

          <br/>
            <br/>
               <a href="<?php echo SITEURL;?>admin/Add-food.php" class= "btn-primary">Add Food</a>
               <br/>
               <br/>
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
           </style>

 <!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->



           <!------lets create table--------->
                    <table class= "tbl-full">
                        <tr>
                            <!------lets create table headers--------->
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <!------LETS DISPLAY THE LIST OF category FROM DATABASE--------->


                        <?php 
                        // query to Get  all category
                        $sql = "SELECT * FROM tbl_food";
                        //Lets Execute the Query
                        $res = mysqli_query($conn, $sql);
                        //checking whether the query is executing successfully or not
                        if($res==TRUE)
                        {
                                //count rows checking whether we have data in the database or not having
                                $count = mysqli_num_rows($res);  //function to Get all the rows from the database

                                //this is the declared variable for sorting the numbers on id 

                                            $sn=1;

                                // check the number of rows
                                if($count>0)
                                {
                                    //this means we have data in the database
                                    // lets use while loop to get the data from database
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                         // lets use while loop to get the data from database
                                          // while loop will execute only if we have data in the database
                                          // Lets Get Individual data from the database
                                          $id=$rows['id'];
                                          $title=$rows['title'];
                                          $description=$rows['description'];
                                          $image_name=$rows['image_name'];
                                          $price=$rows['price'];
                                          $featured=$rows['featured'];
                                          $active=$rows['active'];
                                          // displaying our data in our table now ( we shall have to break the php loop and use an HTML)
                                          ?>
                                          <tr>
    <!------lets create table data--------->
                            <td><?php echo $sn++ ?></td> <!-----it run successfully but fail to sort the numbers as 1, 2, 3---
                            to solve this lets declare variable before the while loop---->
                            <td><?php echo $title?></td>
                            <td><?php echo $description?></td>

                            <td>
                                                <?php 
                                                //check whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name; ?>" width="80px" height="80px">

                                                <?php 
                                                }
                                                else
                                                {
                                                    //Display the message
                                                    echo "<div class='error'>Image Not Added</div>";
                                                }
                                                ?>
                            </td>
                            <td>Kshs. <?php echo $price?></td>
                            <td><?php echo $featured ?></td>
                            <td><?php echo $active ?></td>
                            <!------After inserting the php code then remove all the remaining tr int table-------->
                            <td>
                                 <!------create two buttons--------->
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id= <?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id= <?php echo $id; ?> "class="btn-delete">Delete Food</a>
                            </td>
                                            </tr>
                                          <?php
                                          
                                    }
                                }
                                else
                                {
                                    // No data in the database
                                }
                        }  
                        ?>
                     </table>
    </div>
</div>
    <!-------Main  content Ends  here--------->
<?php include('partials/footer.php') ?>
<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->