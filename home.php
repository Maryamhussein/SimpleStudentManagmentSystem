<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Managment System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">
    <?php

    $conn= mysqli_connect('localhost','root','','studen');
    $res=mysqli_query($conn,'select * from studentinfo');
    if(!$conn){
        die("error");
    }
    // Check connection

   /*Variables*/
   $id='';
   $name='';
   $nationality='';

   if(isset($_POST['id'])){
       $id=$_POST['id'];
       echo $id;
   }
   if(isset($_POST['name'])){
    $name=$_POST['name'];
    echo $name;
}
if(isset($_POST['nationality'])){
    $nationality=$_POST['nationality'];
    echo $nationality;
}
$sqls='';
if(isset($_POST['add'])){
    $sqls="INSERT INTO studentinfo 
    VALUES($id,'$name','$nationality')"; 
    mysqli_query($conn,$sqls);
    header('location: home.php');
}

if(isset($_POST['del'])){
$sqls="delete from studentinfo where name='$name'";
mysqli_query($conn,$sqls);
    header('location: home.php');
}

    ?>

    <div class="container">
        <form method="POST">
            <aside>
                <img src="logo.jpg" alt="">
                <h3>لوحة التحكم</h3>
                <label>رقم الطالب:</label><br>
                <input type="text" name="id"><br>
                <label >اسم الطالب :</label><br>
                <input type="text" name="name" ><br>
                <label >الجنسية:</label><br>
                <input type="text" name="nationality" ><br>
                <button name="add">اضافة طالب</button>
                <button name="del">حذف طالب</button>

            </aside>
            <main>
                <table id="tb">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th>الجنسية</th>
                    </tr>
                    <?php
                    while ($row =mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['nationality']."</td>";
                        echo "<tr>";

                    }
                    ?>
                    
                </table> 
            </main>
        
        </form>
    </div>
    <div class="clear"></div>
</body>
</html>