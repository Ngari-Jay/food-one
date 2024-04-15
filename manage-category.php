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
           <h1>Manage Category</h1>
          <!------create button to add category--------->

          <br/>
            <br/>
            <?php
            if(isset($_SESSION['add-cat']))
            {
                echo $_SESSION['add-cat'];
                // lets remove the message
                unset($_SESSION['add-cat']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                // lets remove the message
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                // lets remove the message
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['no-category-Found']))
            {
                echo $_SESSION['no-category-Found'];
                // lets remove the message
                unset($_SESSION['no-category-Found']);
            }
            if(isset($_SESSION['update-cat']))
            {
                echo $_SESSION['update-cat'];
                // lets remove the message
                unset($_SESSION['update-cat']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                // lets remove the message
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                // lets remove the message
                unset($_SESSION['failed-remove']);
            }
            ?>
            <br/></br>
               <a href=" <?php echo SITEURL;?>admin/Add-category.php" class= "btn-primary">Add Category</a>
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
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <!------LETS DISPLAY THE LIST OF category FROM DATABASE--------->


                        <?php 
                        // query to Get  all category
                        $sql = "SELECT * FROM tbl_category";
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
                                          $image_name=$rows['image_name'];
                                          $featured=$rows['featured'];
                                          $active=$rows['active'];
                                          // displaying our data in our table now ( we shall have to break the php loop and use an HTML)

                                          ?>
<tr>
    <!------lets create table data--------->
                            <td><?php echo $sn++ ?></td> <!-----it run successfully but fail to sort the numbers as 1, 2, 3---
                            to solve this lets declare variable before the while loop---->
                            <td><?php echo $title?></td>

                                        <td>
                                                <?php 
                                                //check whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="80px" height="80px">

                                                <?php 
                                                }
                                                else
                                                {
                                                    //Display the message
                                                    echo "<div class='error'>Image Not Added</div>";
                                                }
                                                ?>
                                        </td>
                            <td><?php echo $featured ?></td>
                            <td><?php echo $active ?></td>
                            <!------After inserting the php code then remove all the remaining tr int table-------->
                            <td>
                                 <!------create two buttons--------->
                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id= <?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id= <?php echo $id; ?> "class="btn-delete">Delete Category</a>
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