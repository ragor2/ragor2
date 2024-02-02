<form method="post">
<input type="text" name="mark" placeholder="марка">
<input type="text" name="model" placeholder="модель">
<select name="year">
    <option>Год</option>
<?php
for($i=1975;$i<2005;$i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<input type="text" name="price" placeholder="стоимость">
<input type="submit" value="сохранить">
</from>
<?php
if(!empty($_POST)){
    $mark=$_POST["mark"];
    $model=$_POST["model"];
    $year=$_POST["year"];
    $price=$_POST["price"];
    file_put_contents("cars.txt", $mark.";".$model.";".$year.";".$price."\n",FILE_APPEND);
}
if(isset($_GET['view'])){
    echo '<table border="1"cellpadding="5">';
    echo '<th>№</th><th>mark</th><th>model</th><th>year</th><th>price</th>';
    $view = explode("\n",file_get_contents("cars.txt"));
    $m = count($view);
    $c = 1;
    foreach($view as $key=>$val){
        if($c<$m){
            echo '<tr><td>'.$c.'</td>';
            $data = explode(";", $val);
            foreach($data as $key=>$val){
                echo '<td>'.$val.'</td>';
            }
            echo '</tr>';
            $c++;
        }
    }

    echo '</table>';
}
?>
<a href="?view">посмотреть данные</a>