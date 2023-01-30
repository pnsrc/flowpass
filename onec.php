<?php
include 'system/components/mxl.php';
use Shuchkin\SimpleXLSX;

$xlsx = SimpleXLSX::parse('1.xlsx');

// Выводим первый элемент массива
// Используем цикл для вывода всех элементов массива начиная с 1
foreach ($xlsx->rows() as $key => $value) {
    if ($key > 0) {
        echo 'Фамилия '. $value[0]; // lastname
        echo ' Имя '. $value[1]; // firstname
        echo ' Отчество '.$value[2]; // middlename
        echo ' ФИО '.$value[3]; // fio
        echo ' Номер тел. '. $value[4]; // nomer tel
        echo ' Email '.$value[5]; // email
        echo "</br>";
    }
}

?>