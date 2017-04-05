<?php
// Метод Create

if (isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['Created_at'])) {
    // Условие когда форма вызывает сама себя
    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {
        //Проверям чтобы все значения были заполнены

        $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $Create2DB = $Connect2DB -> prepare ( "INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
        $Create2DB -> bindParam(':name', $_POST['Name']);
        $Create2DB -> bindParam(':description', $_POST['Description']);
        $Create2DB -> bindParam(':created_at', $_POST['Created_at'] );
        $Result = $Create2DB -> execute( );

    }

    header ( "Location: index.php");
    exit ( );  //Возвращаем в таблицу Index
}
?>

<html>
<!-- Форма добавления данных -->
<head>
    <title> Create to Article </title>
</head>

<body>

<form action="Create.php" method="post" name="Create" autocomplete="on" >

    <h1 style=" font-size: x-large"> Введите данные </h1>

    <p>  <input type="text" name="Name"> Имя </p>

    <p>  <input type="text" name="Description"> Описание </p>

    <p>  <input type="date"  name="Created_at" value="<?php echo date('Y-m-d H:i:s', Time());?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p>
        <input type="submit" value="Сохранить" >

        <input type="reset" value="Очистить">

        <button name="chancel" formaction="Index.php" > Отменить </button>
    </p>

</form>
</body>
</html>