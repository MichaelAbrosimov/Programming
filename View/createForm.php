
<html>
<!-- Форма добавления данных -->
<head>
    <title> Create to Article </title>
</head>

<body>

<form action="createCtrl.php" method="post" name="create" autocomplete="on" >

    <h1 style=" font-size: x-large"> Введите данные </h1>

    <p>  <input type="text" name="name"> Имя </p>

    <p>  <input type="text" name="description"> Описание </p>

    <p>  <input type="date"  name="created_at" value="<?php echo date('Y-m-d H:i:s', time());?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания</p>

    <p>
        <input type="submit" value="Сохранить" name="create" >

        <input type="reset" value="Очистить" name="reset">

        <a href="../index.php"><input type="button"  value="Отменить" name="chancel" > </a>
    </p>

</form>
</body>
</html>