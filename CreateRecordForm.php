
<html>
<!-- Форма добавления данных -->
    <head>
        <title> Create </title>
    </head>

    <body>

        <?php

        echo ('Заполните данные.');

        if (isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['Created_at'])) {
            if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {
                //yes
                $curentDate = date('Y-m-d H:i:s', time());
                $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

                $Create2DB = $Connect2DB -> prepare ( "INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
                $Create2DB -> bindParam(':name', $_POST['Name']);
                $Create2DB -> bindParam(':description', $_POST['Description']);
                $Create2DB -> bindParam(':created_at', $curentDate );
                $Result = $Create2DB -> execute( );

               // var_dump($Result);

                echo(" Добавлено:  ");
                echo($_POST["Name"]);

            }
        }

        ?>

            <form action="CreateRecordForm.php" method="post" name="Create">

                <p>  <input type="text" name="Name" /> Имя </p>

                <p>  <input type="text" name="Description" /> Описание </p>

                <p>  <input type="date" name="Created_at" /> Дата создания</p>

                <p> <input type="submit" /><input type="reset" /></p>

            </form>

            <a href="Index.php" font="17px"> Меню </a>
    </body>
</html>