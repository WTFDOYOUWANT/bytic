<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodePen - HTML5 Contact Form</title>
    <link rel="stylesheet" href="./style.css">
    <style type="text/css">
    a.button10 {
        display: inline-block;
        width: 100%;
        color: black;
        font-size: 125%;
        font-weight: 700;
        text-decoration: none;
        text-align: center;
        user-select: none;
        padding: .25em .5em;
        outline: none;
        border: 1px solid rgb(250, 172, 17);
        border-radius: 7px;
        background: rgb(255, 212, 3) linear-gradient(rgb(255, 212, 3), rgb(248, 157, 23));
        box-shadow: inset 0 -2px 1px rgba(0, 0, 0, 0), inset 0 1px 2px rgba(0, 0, 0, 0), inset 0 0 0 60px rgba(255, 255, 0, 0);
        transition: box-shadow .2s, border-color .2s;
    }

    a.button10:hover {
        box-shadow: inset 0 -1px 1px rgba(0, 0, 0, 0), inset 0 1px 2px rgba(0, 0, 0, 0), inset 0 0 0 60px rgba(255, 255, 0, .5);
    }

    a.button10:active {
        padding: calc(.25em + 1px) .5em calc(.25em - 1px);
        border-color: rgba(177, 159, 0, 1);
        box-shadow: inset 0 -1px 1px rgba(0, 0, 0, .1), inset 0 1px 2px rgba(0, 0, 0, .3), inset 0 0 0 60px rgba(255, 255, 0, .45);
    }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <form id="contact" action="send_new_group.php" method="post">
            <h3>Добавить Курс</h3>
            <!-- <fieldset>
          <input placeholder="Текст вопроса" type="text" tabindex="1" name="first" id="quest" required autofocus>
        </fieldset> -->
            <h4>Введите текст вопроса</h4>
            <!-- <fieldset>
                <select class="select" id="group-select" name="group">
                    <?php while($object = mysqli_fetch_object($result_groups)):?>
                    <option value="<?php echo $object->id; ?>"><?php echo $object->name; ?></option>
                    <?php endwhile;?>
                </select>
            </fieldset> -->
            <fieldset>
                <input placeholder="Название группы" type="text" tabindex="2" name="group_name_input" id="answ" required>
            </fieldset>
            <input type="submit">
            <a href="course_menu.html" class="button" name="button" type="button">back</a>
        </form>
    </div>
</body>

</html>