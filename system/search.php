<?php
include 'init.php';

if(!empty($_POST["search"])){ //Принимаем данные
    $search = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["search"]))));
    // Ищем данные в базе данных и выводим используя библиотеку RedBeanPHP
    $results = R::find('pass', 'fio LIKE ?', ["%$search%"]);
    // Выводим данные в виде списка с помощью цикла Если ничего не найдено выводим сообщение
    foreach($results as $result){
        echo "<li><a href='pass.php?id=".$result->id."'>".$result->fio."</a></li>";
    } if(empty($results)){
        echo "<li>Ничего не найдено</li>";
    }
}
?>