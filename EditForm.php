<?php
// в этой форме реализованы методы Создания, Редактирования и удаления с последующим возвратом в Таблицу ReadRecordForm

$title = 'Article - ';                  // Используется для титула страницы и текста в заголовке
$delButtonsVisib = "hidden";            //Скрывает видимость кнопки удалить для для метода Create

if (!isset($_POST['Name']) && !isset($_POST['Description']) && !isset($_POST['Created_at'] )) {
    //  Если перешли по ссылке из другой формы

    if ($_GET['id']=='null') {
        // передан пустой id - предопределяем метод Create

        // наполняем массив для заполнения формы
        $item = [
                "name" => "",
                "description" => "",
                "created_at" => date('Y-m-d H:i:s', Time()),
                "id"=> null
            ];
        $submitMethod='Create';
        echo $title.'Новая запись';
    }
    else {

        //  принимаем id - предопределяем метод Update
        //  читаем из базы и наполняем массив для заполнения формы
        $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $readFromDB = $Connect2DB->prepare("SELECT * FROM Article WHERE id=:IDENTITY ");
        $readFromDB->bindParam(":IDENTITY", $_GET['id']);
        $readFromDB->execute();
        $Result = $readFromDB->fetchAll();

        foreach ($Result as $item)
            $title .= $item['name'];

        $delButtonsVisib = "visible";
        $submitMethod='Update';
        echo "Редактирование: " . $title;
    }
}

  if (isset($_POST['Create']))  {
    // если вызов произошел из этой формы по методу Create
      if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {
          //Проверяем чтобы все значения были заполнены

          $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

          $Create2DB = $Connect2DB -> prepare ( "INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
          $Create2DB -> bindParam(':name', $_POST['Name']);
          $Create2DB -> bindParam(':description', $_POST['Description']);
          $Create2DB -> bindParam(':created_at', $_POST['Created_at'] );
          $Result = $Create2DB -> execute( );


          echo "<br>Добавлено:  ",$_POST['Name']; //Сообщаем об успехе операции


      }

      require ('ReadRecordForm.php');
      exit ();  //Возвращаем в таблицу ReadRecordForm
  }



  if (isset($_POST['Update']))  {
      // если вызов произошел из этой формы по методу Update
        if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {
            //Проверяем чтобы все значения были заполнены

            //апдейтим
            $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $Update2DB = $Connect2DB ->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
            $Update2DB -> bindParam(':name', $_POST['Name']);
            $Update2DB -> bindParam(':description', $_POST['Description']);
            $Update2DB -> bindParam(':created_at', $_POST['Created_at'] );
            $Update2DB -> bindParam(':id', $_POST['id'] );

            $Result = $Update2DB -> execute( );

            if ($Result) echo "Данные по ". $_POST['Name']. " - изменены";
        }

      require ('ReadRecordForm.php');
      exit ();  //Возвращаем в таблицу ReadRecordForm
  }



  if (isset($_POST['Delete'])) {
      // если вызов произошел из этой формы по методу Delete
      $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
      $DeleteFromDB = $Connect2DB -> prepare("DELETE FROM Article WHERE id=:id;");
      $DeleteFromDB -> bindParam(':id', $_POST['id'] );
      $Result =$DeleteFromDB ->execute();

      if ($Result) echo "Данные по ". $_POST['Name']. " - удалены";
      require ('ReadRecordForm.php');
      exit ();  //Возвращаем в таблицу ReadRecordForm
  }

?>



<html>
<!-- Форма редактирования записи данных  -->
<head>
    <title> <?php  echo $title ?> </title>


</head>

<body>

<form action="EditForm.php" method="post" name="Update" autocomplete="on"  >

    <p>  <input type="text" name="Name" value="<?php echo ($item['name']) ?>"  / > Имя </p>

    <p>  <input type="text" name="Description" value="<?php echo $item['description']?>"/> Описание </p>

    <p>  <input type="date"  name="Created_at" value="<?php echo $item['created_at'] ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p> <input type="submit" value="Сохранить изменения" name="<?php echo $submitMethod ?>"  >
        <input type="reset" value="Очистить" >
        <input type="submit" value="Удалить запись" name="Delete" <?php echo $delButtonsVisib ?>  >
        <button name="chancel" formaction="ReadRecordForm.php" > Отменить </button>


        <input type="text" name="id"  value="<?php echo $item['id'] ?>" hidden   >

    </p>



</form>

<a href="Index.php" font="17px"> Меню </a>
</body>
