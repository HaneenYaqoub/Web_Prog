<?php
function f()
{
    session_start();
    if(isset($_POST['btn']))
    if(isset($_POST['txtUserName'])&& isset($_POST['txtPassword']))
    {
        $uname=$_POST['txtUserName'];
        $upass=$_POST['txtPassword'];

        try{
            $db=new mysqli('localhost','root','','myRest');
            $qryStr="select * from users";
            $res=$db->query($qryStr);
            for($i=0;$i<$res->num_rows;$i++)
            {
                $row=$res->fetch_object();
                if($row->Username == $uname && sha1($upass) == $row->Password && $row->type == '1' )
                {
                    $_SESSION['uname']=$uname;
                    header('location:admin.php');
                }
                else if($row->Username == $uname && sha1($upass) == $row->Password && $row->type == '2' )
                {
                    $_SESSION['uname']=$uname;
                    header('location:user.php');
                }
                else{

                    echo "<h3 style='color: red'>Username and/or Password are not correct !</h3>";

                }
            }
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
    <title>Login</title>
    <link rel="stylesheet" href="homestyle.css">
</head>
<body>
<section>

    <div class="content">

        <div class="formLogin">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="inputF">
                    <span>Username</span>
                    <input type="text" name="txtUserName">
                </div>
                <div class="inputF">
                    <span>Password</span>
                    <input type="password" name="txtPassword">
                </div>

                <div class="inputF">
                    <button class="btn" ><a href="user.php">sign in </a></button>
                </div>
                <div class="inputF">
                    <p>Don't have an account?<a href="signup.php">Sign up</a></p>
                </div>
            </form>
            <?php
            f();
            ?>

        </div>
    </div>
</section>
</body>
</html>
