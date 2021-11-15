<?php
function f()
{
    session_start();
    if(isset($_POST['btn']))
    {
    if(isset($_POST['txtIntName'])&& isset($_POST['txtIntDate']) && isset($_POST['txtIntTime']) )
    {
        $name=$_POST['txtIntName'];
        $date=$_POST['txtIntDate'];
        $time=$_POST['txtIntTime'];


            try {
                $db = new mysqli('localhost', 'root', '', 'myrest');
                $qryStr = "insert into admin  values ('$name','$date','$time')";
                if (mysqli_query($db, $qryStr)) {
                    echo "inserted";
                }
               // header('location:login.php');
                $db->close();
            } catch (Exception $e) {

            }

    }}


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
    <div class="formLogin">
        <form action="admin.php" method="post">
            <div class="inputF">
                <span>Interviewer Name</span>
                <input type="text" name="txtIntName">
            </div>
            <div class="inputF">
                <span>Interview Time</span>
                <input type="text" name="txtIntDate" placeholder="mm/dd/yyyy">
                <input type="text" name="txtIntTime" placeholder="hh:mm:am/pm">
            </div>
            <div class="inputF">
                <button name="btn">Insert </button>

            </div>

            <div class="inputF">
                <table border="2" align="center">
                    <tr>
                        <td>Name</td>
                        <td>Date</td>
                        <td>Time</td>
                    </tr>
                    <?php
                    $db = mysqli_connect("localhost","root","","myrest");

                    if(!$db)
                    {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $records = mysqli_query($db,"select * from admin");

                    while($data = mysqli_fetch_array($records))
                    {
                    ?>
                        <tr>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['time']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <?php mysqli_close($db); // Close connection ?>

            </div>
        </form>
        <?php
        f();
        ?>

    </div>
</div>

</body>

</html>