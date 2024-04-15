<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Login | Jaysoft E-Food Ordering System</title>
        <!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->
<style>
    .login{
    width: 20%;
    border: 3px solid chocolate; 
    margin: 10% auto;
    padding: 2%;
    background-image:url('../images/JAYSOFT C LOGO.PNG');
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    
}
.login h1{
text-align: center;
}
.login p{
text-align: center;
color: purple;
font-weight:bold;
}
/*------these are styles or css for primary button*/
.btn-primary{
    background-color: blue;
    padding: 3%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
/*------these are styles or css for primary button hovering effect*/
.btn-primary:hover{
   background-color: #ff4757;
}
.text-center{
    text-align:center;
}
.success{
    color: green;
}
.error{
    color: red;
}
</style>
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <!-----------display login messege--------->
            <?php 
            if(isset($_SESSION['login']))
            {
             echo $_SESSION['login'];
            // lets remove the message
            unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
             echo $_SESSION['no-login-message'];
            // lets remove the message
            unset($_SESSION['no-login-message']);
            }
            ?>
                        <br/><br/>
            <!---------create form for login--------->
            <form action=""method="POST" class="text-center">

                    <b>Username:</b><br>
                    <input type="text"name="username"  placeholder = "Enter Username" required> <br/><br/>
                    <b>Password:</b><br>
                    <input type="password"name="password" placeholder = "Enter password"required><br/><br/>

                   <input type="submit" name="submit" value="Login" class="btn-primary">
                   
            </form>
            <marquee behavior="" direction="left"><p>Designed By: <a href="www.jaysoftsystems.com">Jaysoft Systems | +254702134979</a></p></marquee>
        </div>
    </body>
</html>

<!-----------/*Welcome to JAYSOFT ONLINE FOOD ORDERING SYSTEM
Designed by JACKSON NGARI YAA an ICT Expert From Malindi 
alSO dOUBLED to be ManAGING Director Of Jaysoft Systems
which is a Technology Company owned by HIm*/
/* Rich him through Email: jacksonngari93@gmail.com
Company Email: jaysoftsystems93@gmail.com
Secondary Email: systemsjaysoft@gmail.com
Call or Whatsapp: +254702134979 AVAILABLE AT ALL TIMES*/----->

<?php 
//process the values from the and save it to database
// chech whether the button is clicked or not
if(isset($_POST['submit']))

{
    //button clicked
    //echo "button clicked";
    //lets get the data from the login form
   $username = $_POST['username'];
   $password = md5($_POST['password']); // password Encryption using md5
   //create sql querry to check whether user exists or not
   $sql ="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";
    //4. Executing querry
    $res = mysqli_query($conn, $sql);
    //5. check whether the User exists or not
    $count = mysqli_num_rows($res);
    // check if username or password exists in the database
    if($count==1)
    {
    // Account Available. Login Successfully.
   // create session variable to display message
    $_SESSION['login'] = "<div class='success'>Account Available. Login Successfully.</div>";

    //here we need to make AUTHORIZATION ACCESS CONTROL TOOL
    $_SESSION['user'] = $username; // is to check whether the user is logged in or not and logout will unset it
    // redirecting our page
    header("location:".SITEURL.'admin/');
    }
    else
    {
     //Account  not Available. Kindly Register Account!!!
    // create session variable to display message
    $_SESSION['login'] = "<div class='error'>Failed Login. Username Or Password Mismatch!!</div>";
    // redirecting our page
    header("location:".SITEURL.'admin/login.php');
    }
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