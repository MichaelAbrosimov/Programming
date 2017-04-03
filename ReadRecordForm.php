
<html>
<!-- Форма чтения данных -->
    <head>
        <title> Таблица </title>
    </head>

    <body>

        <?php
        $tableName = 'Article';

                $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $readFromDB = $Connect2DB -> prepare ("SELECT * FROM Article");
                $readFromDB -> execute( );
                $Result = $readFromDB -> fetchAll(); ?>


        <!-- Выводим результат SQL запроса в таблицу  -->
        <Table border="1"  >

            <!-- Заголовок таблицы -->
            <caption style=" font-size:xx-large"> <?php  echo $tableName ?></caption>

            <!-- Шапка таблицы --->
            <tr style="font-weight: bold" >
                    <td>Имя</td><td>Описание</td><td>Дата создания</td>

            </tr>
        <!-- Наполнение таблицы данными -->
        <?php
              foreach($Result as $item) { ?>
        <tr>

            <td> <?php echo  $item['name']; ?> </td> <td> <?php echo $item['description']; ?></td><td> <?php echo $item['created_at']; ?> </td>
            </tr>
            <?php } ?>
        </Table>

        <br>

<a href="Index.php"> Меню </a>
    </body>
</html>