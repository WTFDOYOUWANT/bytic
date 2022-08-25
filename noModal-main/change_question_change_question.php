<!DOCTYPE html>
<html lang="en">
    <?php
    /*Соединяеся с базой и делаем выборку из таблицы*/
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");

    $question_id = $_GET["question_id"];
    $sql_answers = "SELECT * FROM answers WHERE question_id = $question_id";
    $result_answers = mysqli_query($link, $sql_answers);

    $question_name_query = mysqli_query($link, "SELECT question FROM questions WHERE id = $question_id");
    $name = mysqli_fetch_object($question_name_query)->question;
    print_r($name);
    ?>

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
        <div class="container">
            <form id="contact" action="send_change_question.php?question_id=<?php echo $question_id?>" method="post">
                <h3>Изменить вопрос</h3>
                <h4>Введите текст вопроса</h4>
                <fieldset>
                    <input placeholder="Текст возможного вопроса" type="text" tabindex="2" name="question_input" id="answ" value="<?php echo $name?>">
                </fieldset>
                <fieldset>
                    <a href="add_answer.php" class="button" name="button" type="button">Добавить ответ</a>
                    <!--button name="button" type="button" formaction="add_answer.html" id="question_submit">Добавить ответ</button-->
                </fieldset>
                <fieldset>
                    <div class="choose">
                        <div class="option">

                        </div>
                    </div>
                </fieldset>
                <?php while($answer = mysqli_fetch_object($result_answers)):?>
                    <fieldset style="float:left;vertical-align: bottom;margin:100 auto;">
                        <a href="change_question_change_added_answer.php?answer_id=<?php echo $answer->id?>&answer_text=<?php echo $answer->text?>&question_id=<?php echo $question_id?>";
                            class="button10"><?php echo $answer->text?></a>
                        <!--textarea class="area"style="width: 65%; height:40px; margin:0px 10px -14px 7px;">Пицца</textarea-->
                    </fieldset>
                <?php endwhile;?>
                <input type="submit" name="submit" value="Применить">
                <input type="submit" name="delete" value="удалить вопрос">
                <a href="index.html" class="button" name="button" type="button">back</a>
            </form>
        </div>
    </body>
</html>