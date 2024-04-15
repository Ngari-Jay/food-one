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
           <h1>Dashboard</h1><!------for te dashboard title--------->
               <br/>
               <br/>
           <!---------diplays login message on login successfully---->
           <?php
           if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                // lets remove the message
                unset($_SESSION['login']);
            }
            ?>
            <br/>
           <!------lets create four boxes--------->
           <!------box 1--------->
            <div class="col-4 text-center"><!------lets create four boxes--------->
                        <?php
                            $sql = " SELECT * FROM tbl_category";
                            //execute query
                            $res = mysqli_query($conn, $sql);
                            //5. check whether the User exists or not
                            $count = mysqli_num_rows($res);
                            // check if we have categories in the database

                        ?>
            <h1><?php echo $count; ?></h1>
            <br>
            categories
           </div>

           <!------box 2--------->
           <div class="col-4 text-center"><!------lets create four boxes--------->
                    <?php
                            $sql2 = " SELECT * FROM tbl_food";
                            //execute query
                            $res2 = mysqli_query($conn, $sql2);
                            //5. check whether the User exists or not
                            $count2 = mysqli_num_rows($res2);
                            // check if we have categories in the database
                        ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            Foods
           </div>


           <!-------box 3-------->
           <div class="col-4 text-center"><!------lets create four boxes--------->
                    <?php
                            $sql3 = " SELECT * FROM tbl_order";
                            //execute query
                            $res3 = mysqli_query($conn, $sql3);
                            //5. check whether the User exists or not
                            $count3 = mysqli_num_rows($res3);
                        ?>
            <h1><?php echo $count3; ?></h1>
            <br>
            Total Orders
           </div>

           <!-----box 4--------->
           <div class="col-4 text-center"><!------lets create four boxes--------->
           <?php
           $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
           //execute query
           $res4 = mysqli_query($conn,$sql4);

           $row4 = mysqli_fetch_assoc($res4);
           //Lets do sum to get the total amount collected
           $total_Amount = $row4['Total'];
           ?>
            <h2>Kshs. <?php echo $total_Amount; ?></h2>
            <br>
           Amount Collected
           </div>

           <!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->


           <!------lets create CLEARFIX--------->
           <div class="clearfix">

           </div>

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
