<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asad </title>
    <link href="css/style.css" rel="stylesheet">
   
</head>

<body dir='rtl'>
    
    <?php 
    
   

$host = 'localhost';
$user = 'root';
$pass= '';
$db = 'stutent';
$conn = mysqli_connect($host,$user,$pass,$db);
$sqla = "select * from stutent.student";
$res = mysqli_query($conn,$sqla);
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$id = '';
$name ='';
$address ='';


if(isset($_POST['id']))
{
    $id = $_POST['id'];
}
if(isset($_POST['name']))
{
    $name = $_POST['name'];
}
if(isset($_POST['address']))
{
    $address = $_POST['address'];
}



$sql ='';
if (isset($_POST['btn']))
{
    $sql = "insert into student value ('$id','$name','$address')";
    mysqli_query($conn,$sql);
    

}

if (isset($_POST['del-btn']))
{
    $sql = `delete from  stutent where name ='$name'`;
    mysqli_query($conn,$sql);
    header("location: home.php");

}


    
    ?>
    <div id="mother">
        <form action="POST">
            <aside>
                <div id="div">

                    <img src="img/student.jpg" alt="company logo">
                    <h3>لوحه المدير</h3>
                    <label>رقم الطالب :</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label>اسم الطالب :</label><br>
                    <input type="text" name="name" id="id"><br>
                    <label>عنوان الطالب :</label><br>
                    <input type="text" name="address" id="address"><br><br>
                    <button name="btn"> اضافه طالب</button>
                    <button name="del-btn">حذف الطالب</button>


                </div>
            </aside>

            <main>

            <table id="tbl">
            <tr>
            <th>الرقم التسلسلي</th>
            <th>اسم الطالب</th>
            <th>عنوان الطالب</th>
            </tr>
            <?php 
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
else 
{
            while($row = mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
            }
        }
?>
            </table>


            </main>
        </form>

    </div>
</body>

</html>