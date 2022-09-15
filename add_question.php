<!DOCTYPE html>
<html lang="en">
<?php
/*Соединяеся с базой и делаем выборку из таблицы*/
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db($link, "byticinfo");

$sql_answers = "SELECT * FROM answers WHERE question_id = (SELECT COALESCE(MAX(ID), 0) FROM questions) + 1";
$result_answers = mysqli_query($link, $sql_answers);
?>
<head>
    <meta charset="UTF-8">
    <title>Добавить вопрос</title>
    <link type="text/css" rel="stylesheet" href="courses_questions_style.css" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="home">
    <form id="contact" action="send_question.php" method="post">

      <div class="header">
        <h1>Текст вопроса</h1>
          <input placeholder="Текст возможного вопроса" type="text" tabindex="2" name="question_input"  id="answ" required>
          <button id='delete' type="button" name="button">Удалить вопрос</button>
      </div>

      <div class="answer">
        <img src="assets/answers.png" style="margin-top: 3%;" alt="">

        <nav>
            <?php while($answer = mysqli_fetch_object($result_answers)):?>
                   <li>
                    <a href="change_added_answer.php?answer_id=<?php echo $answer->id?>&answer_text=<?php echo $answer->text?>" class="passive"><?php echo $answer->text?></a>
                    </li>
            <?php endwhile;?>
            <li>
                <a href="add_answer.php" name="button" type="button">Добавить ответ</a>
            </li>
        </nav>

      </div>
      <div style='bottom: 5%; position: absolute;' class="ok_no">

          <input style="float: left;" id="ok" name="submit" type="submit" value="Применить">
                  <a href="menu.html"><button style="float: right;" id="back" formnovalidate>Назад</button></a>

      </div>
      </form>

    </div>
</body>
</html>
