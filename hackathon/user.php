<?php


function f()
{
    session_start();
    if(isset($_POST['txtUserName'])&& isset($_POST['choose']) && isset($_POST['choose1']))
    {
        $uname=$_POST['txtUserName'];
        $time=($_POST['choose']);
        $date=$_POST['choose1'];


        try{
            $db=new mysqli('localhost','root','','myrest');
            $qryStr="insert into reservedtime  values ('$uname','$date','$time')";
            if(mysqli_query($db,$qryStr))
            {
                echo "inserted";
            }
//            header('location:login.php');
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
    <title>Title</title>
    <link href="homestyle.css" rel="stylesheet">
</head>
<body>
<div class="content">
<form class="formLogin" method="post">
    <div class="inputF">
        <span>Username</span>
        <input type="text" name="txtUserName">
    </div>
    <div>
        <span>choose Date:</span>
    <select name="choose">
        <option value="date1"> -- select --</option>
        <?php
          $db = mysqli_connect("localhost", "root","","myrest");
          if(!$db)
        {
            echo("Connection failed");
        }
          $record = mysqli_query($db,"select date from admin");
          while($data = mysqli_fetch_array($record))
        {
            echo"<option value='",$data['date'],"'>",$data['date'],"</option>";
        }
        ?>
    </select>
    </div>
    <span>choose time:</span>
    <select name="choose1">
        <option value="time1"> -- select --</option>
        <?php
        $db = mysqli_connect("localhost", "root","","myrest");
        if(!$db)
        {
            echo("Connection failed");
        }
        $record = mysqli_query($db,"select time from admin");
        while($data = mysqli_fetch_array($record))
        {
            echo"<option value='",$data['time'],"'>",$data['time'],"</option>";
        }
        ?>
    </select>


    <div class="inputF">
        <button >choose time </button>
    </div>
</div>
    <?php f();?>
</form>

</body>
</html>
