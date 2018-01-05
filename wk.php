<?php
error_reporting(0); 

$firstlast = 0;
$jsonb = file_get_contents('base.json');


do{


$firstlast++;

if($firstlast===1){
echo "Приветствую!Чем могу помочь? \n";
} else {
echo "Могу помочь еще чем то? \n";
}
$line = trim(fgets(STDIN));

$data = json_decode($jsonb,true);
if ($data[$line] != false && !is_null($data)){
//json выборка

echo $data["$line"]."\n";


//end

}
else{
 echo 'Упс..Этого я не знаю, если Вы знаете ответ, напишите его(иначе напишите "нет")';
$ansr = trim(fgets(STDIN));
if($ansr != 'нет' && $line != 'нет'){
//$json_data = array("$line"=>"$ansr");
$data[$line]=$ansr;
file_put_contents('base.json', json_encode($data));
}else{
$line = 'нет';
}
}

} while($line != 'нет');




