<html>
<head>
<meta http-equiv="Content-type"
content="text/html; charset=utf-8">

<title>● : 4-1 日付を扱う2</title>

</head>
<body>

<?php

//今日の日付を取得

$y = date("Y");//Yは西暦年(４ケタ)

$m = date("m");//mは月数字(01～12)

$next_m = $m +1;

if($next_m > 12){

     $next_m = 1;
     
     $next_y = $y +1;
     
   }else{
     
     $next_y =$y;
     
          }

//今月最初の曜日を取得

$firstday_w = date("w",mktime(0,0,0,$m+1,1,$y));//wは曜日数字0(日曜)～6(土曜)

//今月最後の日の取得(次の０日)

$lastday = date("d",mktime(0,0,0,$m+2,0,$y));

//今月最後の日の曜日を取得

$lastday_w = date("w",mktime(0,0,0,$m+1,$lastday,$y));

//年月を出力；

 echo "<b>".$y."年".$m."月</b><br>";

//曜日を出力

 echo "<table border = \"1\">\n";

 echo "<tr>\n";

 echo "<td><font color='red'>日</font></td>\n";

 echo "<td>月</td>\n";

 echo "<td>火</td>\n";

 echo "<td>水</td>\n";

 echo "<td>木</td>\n";

 echo "<td>金</td>\n";

 echo "<td><font color='blue'>土</font></td>\n";

 echo "</tr>\n";

 //日付を出力

for($d = 1; $d <= $lastday;$d++){
  $w = date("w",mktime(0,0,0,$m+1,$d,$y));
    if ($w == 0 || $d == 1){ 
                          // ||はA式かB式がtrueのときtrue
       echo "<tr>";
         //最初の日が日曜以外の場合、曜日まで空白セルで埋める
          if($firstday_w != 0 && $d == 1){      
                          // !=はAとBが等しくないときtrue
                          // &&はA式もB式もtrueのときtrue
              for($i = $firstday_w;$i > 0;$i--){
                 echo "<td nowrap>&nbsp;</td>\n";
            }
        }
    }
  switch( $w ){
     case 0: //日曜日の文字色
         echo  "<td><font color='red'>$d</font></td>\n";
         break;
     case 6: //土曜日の文字色
         echo  "<td><font color='blue'>$d</font></td>\n";
         break;
     default: //月～金曜日の文字色
         echo  "<td><font color='black'>$d</font></td>\n";
     }

   }


//最終日が土曜以外の場合、その曜日まで空白セルで埋める
  if($lastday_w != 6){
     for($i = 6;$i > $lastday_w;$i--){
         echo "<td nowrap>&nbsp; </td>\n";
         
    }
 }


echo "</tr>\n";

echo "</table>\n";

?>

<a href="calendar1.php">前の月</a><br>

</body>

</html>
