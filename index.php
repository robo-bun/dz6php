// 1. Создайте файл example.txt и запишите в него текст "Hello, world!" с помощью функции fwrite(). Затем откройте этот файл и выведите его содержимое на экран с помощью функции fgets()


$fo = fopen('example.txt', 'r+') or die('Не удалось открыть файл');

$fw = fwrite($fo, 'Hello, world!');

rewind($fo);

echo fgets($fo);

fclose($fo);




// 2. Напишите скрипт PHP, который будет открывать файл data.txt в режиме записи и записывать в него данные, которые были введены пользователем в форму на веб-странице. Данные должны быть разделены запятыми. Форма должна содержать поля "Имя", "Фамилия" и "Email". После записи данных в файл, выведите сообщение об успешной записи данных.


<form action="" method="POST">
    <input type="text" id="firstname" name="firstname">
    <input type="text" id="lastname" name="lastname">
    <input type="text" id="email" name="email">
    <input type="submit" value="Отправить">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'data.txt';
    $userInformation = $_POST['firstname'] . ',' . $_POST['lastname'] . ',' . $_POST['email'];
    file_put_contents($filename, $userInformation);
    echo 'Данные успешно записаны в файл';
}




// 3. Напишите скрипт PHP, который будет открывать файл example.txt в режиме записи и записывать в него случайные числа от 1 до 1000, разделенные пробелами. Запишите в файл 10 случайных чисел. После записи чисел закройте файл. Затем откройте этот файл снова в режиме чтения и выведите на экран сумму всех чисел, которые были записаны в файл.


function generateRandomNum($min, $max) {
    return rand($min, $max);
}

$filename = 'example.txt';
$fo = fopen($filename, 'w+');

$random1 = generateRandomNum(10, 100);
$random2 = generateRandomNum(10, 100);

fwrite($fo, $random1 . PHP_EOL . $random2 . PHP_EOL);
rewind($fo);

$sum = 0;

while(($buffer = fgets($fo, 4096)) !== false) {
    $sum += (int) $buffer;
}

echo $sum;

fclose($fo);
