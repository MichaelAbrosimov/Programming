<?php
// Метод Update

if (isset($_GET['id']))
    // если вызов из другой формы методом GET
    {
        //  принимаем id - предопределяем метод Update
        //  читаем из базы и наполняем массив для заполнения формы
        $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $readFromDB = $Connect2DB->prepare("SELECT * FROM Article WHERE id=:IDENTITY ");
        $readFromDB->bindParam(":IDENTITY", $_GET['id']);
        $readFromDB->execute();
        $Result = $readFromDB->fetchAll();

        foreach ($Result as $item)
            $title = $item['name'];
    }

if (isset($_POST['id']))
    {
    // если вызов произошел из этой формы по методу Update
    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at'])
        {
        //Проверяем чтобы все значения были заполнены

        //апдейтим
        $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $Update2DB = $Connect2DB ->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
        $Update2DB -> bindParam(':name', $_POST['Name']);
        $Update2DB -> bindParam(':description', $_POST['Description']);
        $Update2DB -> bindParam(':created_at', $_POST['Created_at'] );
        $Update2DB -> bindParam(':id', $_POST['id'] );

        $Result = $Update2DB -> execute( );


        }

        header ( "Location: index.php");

        exit ( );  //Возвращаем в таблицу Index
    }
?>


<html>
<!-- Форма редактирования записи данных  -->
<head>
    <title> <?php  echo $title ?> </title>

</head>

<body>

<form action="Update.php" method="post" name="Update" autocomplete="on"  >
    <h1 style=" font-size: x-large"> Введите данные </h1>

    <p>  <input type="text" name="Name" value="<?php echo ($item['name']) ?>"  / > Имя </p>

    <p>  <input type="text" name="Description" value="<?php echo $item['description']?>"/> Описание </p>

    <p>  <input type="date"  name="Created_at" value="<?php echo $item['created_at'] ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p>
        <input type="submit" value="Сохранить изменения"  >

        <input type="reset" value="Вернуть в исходное состояние" >

        <button name="chancel" formaction="Index.php" > Отменить </button>

        <input type="text" name="id"  value="<?php echo $item['id'] ?>" hidden>

    </p>
</form>
</body>
</html>
