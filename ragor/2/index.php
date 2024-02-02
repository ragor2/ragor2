<form>
<input type="date" name="start">
<input type="date" name="finish">
<input type="submit" value="вывести">
</form>
<?php
$w = ["Fri"=>"пятница","Sat"=>"суббота","Wed"=>"среда","Mon"=>"поднедельник","Thu"=>"четверг","Sun"=>"воскресенье","Tue"=>"вторник"];
$m = ['12'=>'декабрь','01'=>'январь','02'=>'февраль','03'=>'март','04'=>'апрель','05'=>'май','06'=>'июнь','07'=>'июль','08'=>'август','09'=>'сентябрь','10'=>'октябь','11'=>'ноябрь',];
if(isset($_GET['start'])&&isset($_GET['finish'])){
    $isd = explode('-',$_GET['start']);
    $osd = mktime(0,0,0,$isd[1],$isd[2],$isd[0]);
    $ifd = explode('-',$_GET['finish']);
    $ofd = mktime(0,0,0,$ifd[1],$ifd[2],$ifd[0]);
    $i=1;
    echo '<table border="1" cellpadding="5">';
    echo '<th>№</th><th>число</th><th>месяц</th><th>год</th><th>день недели</th>';
    for($osd;$osd<=$ofd;$osd=$osd+(1*3600*24)){
        if($w[date("D",$osd)]=="суббота" || $w[date("D",$osd)]=="воскресенье"){
            echo '<tr bgcolor="gray">';
        }else{
            echo '<tr>';

        }
        echo '<td>'.$i.'</td><td>'.date("d",$osd).'</td><td>'.$m[date("m",$osd)].'</td><td>'.date("Y",$osd).'</td><td>'.$w[date("D",$osd)].'</td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';
}
?>