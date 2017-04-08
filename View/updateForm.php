<?php ?>

<html>
<!-- Форма редактирования записи данных  -->
<head>
    <title> <?php  echo $title ?> </title>

</head>

<body>

<form action="updateCtrl.php" method="post" name="Update" autocomplete="on"  >
    <h1 style=" font-size: x-large"> Введите данные </h1>

    <p>  <input type="text" name="Name" value="<?php echo ($item['name']) ?>"  / > Имя </p>

    <p>  <input type="text" name="Description" value="<?php echo $item['description']?>"/> Описание </p>

    <p>  <input type="date"  name="Created_at" value="<?php echo $item['created_at'] ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p>
        <input type="submit" value="Сохранить изменения"  name="update" >

        <input type="reset" value="Вернуть в исходное состояние" >

        <input type="submit" value="Отменить" name="chancel" >

        <input type="text" name="id"  value="<?php echo $item['id'] ?>" hidden>

    </p>
</form>
</body>
</html>


