<?php

/**
 Задание №1
 Создать форму, заполнения данными
 */

echo ('Заполните данные.');
?>
<form action="CreateRecordMethod.php" method="post">

    <p> Имя: <input type="text" name="Name" /></p>

    <p> Описание: <input type="text" name="Description" /></p>

    <p> Дата создания: <input type="text" name="Created_at" /></p>

    <p> <input type="submit" /><input type="reset" /></p>

</form>
