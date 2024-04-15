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
            <div class="wrapper1">
                <!------for te dashboard title--------->
           <h1>Manage Order</h1>
          <br><br>

          <?php
                  if(isset($_SESSION['update-order']))
                        {
                            echo $_SESSION['update-order'];
                            // lets remove the message
                            unset($_SESSION['update-order']);
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


           <!------these are styles or css for the table tr th and td--------->
<style>
    .wrapper1{
    /*you can now remove the wrapper by removing the border*/
    /*border: 1px solid red;*/
    padding: 1% ;
    width: 100%;
    margin: 0 auto;
}
.tbl-full{
    width: 100%;
    padding: 0 12px;
}
table tr th{
    border-bottom: 3px solid blue;
    padding: 1%;
    text-align: left;
    
}
table tr td{
    padding: 1%;
    font-size: 12px;
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
/*------these are styles or css for secondary delete Order button*/
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
/* styles for the message*/
.success{
    color: green;
    padding: 2%;
}
.error{
    color: red;
    padding: 2%;
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
                            <th>Food</th>
                            <th>Price</th>
                            <th>Qty.</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Customer Name</th>
                            <th>Contant</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                        // query to Get  all the orders
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // Display the latest order
                        //Lets Execute the Query
                        $res = mysqli_query($conn, $sql);
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
                                      $food=$rows['food'];
                                      $price = $rows['price'];
                                      $qty=$rows['qty'];
                                      $total = $rows['total'];
                                      $order_date =$rows['order_date'];
                                      $status=$rows['status'];
                                      $customer_name=$rows['customer_name']; 
                                      $customer_contact=$rows['customer_contact'];
                                      $customer_email=$rows['customer_email'];
                                      $customer_address=$rows['customer_address']; 
                                      // displaying our data in our table now ( we shall have to break the php loop and use an HTML)
                                      ?>
                    <tr>
                        <!------lets create table data--------->
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $food ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $qty ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $order_date ?></td>

                        <!-----------lets create different colors for the different status---->
                        <td> 
                            <?php 
                            // for ordered
                            if($status=="Ordered")
                            {
                                echo "<label style='color:black;'>$status</label>";
                            }
                            // for On Delivery
                            elseif($status=="On Delivery")
                            {
                                echo "<label style='color:orange;'>$status</label>";
                            }
                            // for Delivered
                            elseif($status=="Delivered")
                            {
                                echo "<label style='color:green;'>$status</label>";
                            }
                            // for Cancelled
                            elseif($status=="Cancelled")
                            {
                                echo "<label style='color:red;'>$status</label>";
                            }
                            // for Inpreparation
                            elseif($status=="Inpreparation")
                            {
                                echo "<label style='color:pink;'>$status</label>";
                            }

                            ?>
                        </td>
                        <td><?php echo $customer_name ?></td>
                        <td><?php echo $customer_contact ?></td>
                        <td><?php echo $customer_email ?></td>
                        <td><?php echo $customer_address ?></td>
                        <td>
                             <!------create two buttons--------->
                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id= <?php echo $id; ?>" class="btn-secondary">Update Order</a>
                        </td>
                    </tr>
                    <?php
                                   }
                                }
                                else
                                {
                                    // order is not Available
                                    echo "<tr> <td colspan = '12' class= 'error'>Order Not Available</td></tr>";
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