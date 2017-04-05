<?php
// Метод Read
// Формируем запрос к БД и результат передаем в массив

$Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$readFromDB = $Connect2DB -> prepare ("SELECT * FROM Article");
$readFromDB -> execute( );
$Result = $readFromDB -> fetchAll();
?>

<!-- Форма отображения данных ввиде грида -->
<head>
    <title> Таблица </title>
</head>

<body>




<form action="" name="Modif" method="post">

    <Table border="1"  >

        <!-- Заголовок таблицы -->
        <caption style=" font-size:xx-large"> Article </caption>

        <!-- Шапка таблицы --->
        <tr style="font-weight: bold" >
            <td>Имя</td><td>Описание</td><td>Дата создания</td> <td></td>

        </tr>
        <!-- Наполнение таблицы данными -->
        <?php
        foreach($Result as $item) { ?>

            <tr>

                <td> <?php echo  $item['name']; ?>  </td>
                <td> <?php echo $item['description']; ?></td>
                <td> <?php echo $item['created_at']; ?> </td>

                <td>
                    <a href="Update.php?id=<?php echo $item['id'];?>"> Изменить</a>
                    <a href="Delete.php?id=<?php echo $item['id'];?>"> Удалить</a>

                </td>

            </tr>

        <?php } ?>
    </Table>

    <br>

    <button name="create" formaction="Create.php" formmethod="post"> Добавить </button>

</form>

</body>
</html>
