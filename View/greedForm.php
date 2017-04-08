<head>
    <title> Таблица </title>
</head>

<body>

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
                    <a href="/Controller/updateCtrl.php?id=<?php echo $item['id'];?>"> Изменить</a>
                    <a href="/Controller/deleteCtrl.php?id=<?php echo $item['id'];?>"> Удалить</a>
                </td>
            </tr>
        <?php } ?>
    </Table>

    <br>
    <a href="/Controller/createCtrl.php" title="Создать новую запись в таблице Article"><button > Добавить </button></a>
</body>
</html>