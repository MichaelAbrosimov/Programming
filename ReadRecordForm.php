<html xmlns="http://www.w3.org/1999/html">
<!-- Форма чтения данных -->
    <head>
        <title> Таблица </title>
    </head>

    <body>


        <?php



            // Формируем запрос к БД и результат передаем в массив
        $tableName = 'Article';

                $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $readFromDB = $Connect2DB -> prepare ("SELECT * FROM Article");
                $readFromDB -> execute( );
                $Result = $readFromDB -> fetchAll(); ?>


        <!-- Выводим результат SQL запроса в таблицу  -->
        <form action="" name="Modif" method="post">

        <Table border="1"  >

            <!-- Заголовок таблицы -->
            <caption style=" font-size:xx-large"> <?php  echo $tableName ?></caption>

            <!-- Шапка таблицы --->
            <tr style="font-weight: bold" >
                <td>Имя</td><td>Описание</td><td>Дата создания</td><td>Отметить</td>

            </tr>
        <!-- Наполнение таблицы данными -->
        <?php
              foreach($Result as $item) { ?>

                  <tr>

                      <td> <a href="EditForm.php?id=<?php echo $item['id'];?>"> <?php echo  $item['name']; ?> </a> </td>
                    <td> <?php echo $item['description']; ?></td>
                    <td> <?php echo $item['created_at']; ?> </td>

                    <td>
                            <input type="checkbox" name="checkbox"  id="<?php echo $item['id']; ?>" >


                    </td>

                </tr>

            <?php } ?>
        </Table>

            <br>
            <a href="Index.php"> Меню</a>
            <button name="create" formaction="EditForm.php?id=null" formmethod="post"> Добавить </button>
            <input type="submit" name="Delete" value="Удалить отмеченные" id="2">
            <input type="reset" value="Снять отметки">
        </form>

    </body>
</html>