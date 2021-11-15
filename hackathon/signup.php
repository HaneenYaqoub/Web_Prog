<?php
function f()
{
    session_start();
    if(isset($_POST['btn']))
    if(isset($_POST['txtUserName'])&& isset($_POST['txtPassword']) && isset($_POST['txtAddress']) && isset($_POST['txtPhonenumber']))
    {
        $uname=$_POST['txtUserName'];
        $upass=sha1($_POST['txtPassword']);
        $uadd=$_POST['txtAddress'];
        $uphone=$_POST['txtPhonenumber'];


        try{
            $db=new mysqli('localhost','root','','myrest');
            $qryStr="insert into users (Username,Password,Address,Phonenumber,Type) values ('$uname','$upass','$uadd','$uphone','2')";
            if(mysqli_query($db,$qryStr))
            {
                echo "inserted";
            }
            header('location:login.php');
            $db->close();
        }catch(Exception $e){

        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>interview</title>
    <link rel="stylesheet" href="homestyle.css">

</head>
<body>
<div class="imgForm">
</div>
<div class="content">
    <div class="formLogin">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <div class="inputF">
                <span>Username</span>
                <input type="text" name="txtUserName">
            </div>
            <div class="inputF">
                <span>Password</span>
                <input type="password" name="txtPassword">
            </div>
            <div class="inputF">
                <span>Address</span>
                <input type="text" name="txtAddress">
            </div>
            <div class="inputF">
                <span>Phonenumber</span>
                <input type="text" name="txtPhonenumber">
            </div>

            <div class="inputF">
                <button name="btn"><a href="login.php" >Sign up </a></button>
            </div>
            <?php
            f();
            ?>
        </form>

    </div>
</div>
</section>

</body>
</html>