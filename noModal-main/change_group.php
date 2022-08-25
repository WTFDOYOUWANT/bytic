<!DOCTYPE html>
<html lang="en">
<?php
  /*Соединяеся с базой и делаем выборку из таблицы*/
  $link = mysqli_connect("localhost", "root", "root");
  mysqli_select_db($link, "byticinfo");
  
  $sql_cgroups = "SELECT * FROM groups";
  $result_groups = mysqli_query($link, $sql_cgroups);
  
  ?>

<head>
    <meta charset="UTF-8">
    <title>Изменить группу</title>
    <link rel="stylesheet" href="./style.css">
    <style type="text/css">
    input[type=submit] {
                 cursor:pointer;
                 width:100%;
                 border:none;
                 height: 45px;
                 background: #99c45a;
                 border-radius: 8px;
                 font-family: 'Poppins', sans-serif;
                 font-weight: lighter;
                 color:#FFF;
                 font-size:20px;
                 margin-bottom: 10px;
             }

             input[type=submit]:hover {
             background: #536040;
                 -webkit-transition:background 0.3s ease-in-out;
                 -moz-transition:background 0.3s ease-in-out;
                 transition:background-color 0.3s ease-in-out;
                 }

             input[type=submit]:active {
             box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5);
             }
             .select {
                             margin-left: 30px;
                         }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <form id="contact" action="send_update_group.php" method="post">
            <h3>Изменить группу</h3>
            <!-- <fieldset>
          <input placeholder="Текст вопроса" type="text" tabindex="1" name="first" id="quest" required autofocus>
        </fieldset> -->
            <h4>Выберите группу</h4>
            <fieldset>
                <select class="select" id="group-select" name="group_select">
                    <?php while($object = mysqli_fetch_object($result_groups)):?>
                        <option value="<?php echo $object->id; ?>"><?php echo $object->name; ?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>
            <fieldset>
                <input placeholder="Название группы" type="text" tabindex="2" name="group_name_input" id="answ"
                    required>
            </fieldset>
            <input type="submit">
            <a href="course_menu.html" class="button" name="button" type="button">Назад</a>
        </form>
    </div>
</body>

</html>