
<html>
<!-- Форма редактирования записи данных  -->
<head>
    <title> <?php  echo $title ?> </title>

</head>

<body>

<form action="updateCtrl.php" method="post" name="Update" autocomplete="on"  >
    <h1 style=" font-size: x-large"> Введите данные </h1>

    <p>  <input type="text" name="name" value="<?php echo ($item['name']) ?>"  / > Имя </p>

    <p>  <input type="text" name="description" value="<?php echo $item['description']?>"/> Описание </p>

    <p>  <input type="date"  name="created_at" value="<?php echo $item['created_at'] ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p>
        <input type="submit" value="Сохранить изменения"  name="update" >


        <a href="../index.php"><input type="button"  value="Отменить" name="chancel" > </a>

        <input type="text" name="id"  value="<?php echo $item['id'] ?>" hidden>

    </p>
</form>
</body>
</html>


