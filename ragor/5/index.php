<?php
$conn = mysqli_connect("localhost","root","root","stelaj");
?>
<head>
<style>
    .main{
        justify-content:center;
        text-align:center;
        width:100%;
    }
    .container{
        background:rgba(0,0,0,0.4);
        border-radius:30px;
        margin:20px;
        padding:10px;
        display:inline-block;
    }
</style>
</head>
<form method="post">
    <select name="select">
    <?php
        $sql = "SELECT * FROM sklad";
        $result= mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['id']."'>".$row['stelaj']."</option>";
        }
        ?>
    </select>
    <input type="text" name="name">
    <input type="text" maxlength="5"name="price">
    <input type="submit">
</form>
<table border="1">
    <th>Название</th><th>Цена</th><th>Стеллаж</th>
<?php
$sql = "SELECT * FROM zapchasti z JOIN sklad s on z.rack_id=s.id";
$result = mysqli_query($conn,$sql);
while($z = mysqli_fetch_assoc($result)){
    echo '<tr><td>'.$z['name'].'</td><td>'.$z['price'].'</td><td>'.$z['stelaj'].'</td></tr>';
}
?>
</table>
<?php
if(!empty($_POST)){
    $stelaj = $_POST['select'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sql = "INSERT INTO zapchasti(`name`,`rack_id`,`price`) VALUES('$name','$stelaj','$price')";
    $result = mysqli_query($conn,$sql);
}
?>