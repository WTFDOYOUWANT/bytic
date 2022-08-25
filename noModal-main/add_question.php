<!DOCTYPE html>
<html lang="en" >
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
    </style>
  </head>

  <body>
  <!-- partial:index.partial.html -->
    <div class="container">  
      <form id="contact" action="send_question.php" method="post">
        <h3>Добавить вопрос</h3>
        <!-- <fieldset>
          <input placeholder="Текст вопроса" type="text" tabindex="1" name="first" id="quest" required autofocus>
        </fieldset> -->
        <h4>Введите текст вопроса</h4>
        <fieldset>
          <input placeholder="Текст возможного вопроса" type="text" tabindex="2" name="question_input"  id="answ"  value="Какой иностранный язык вам нравится" required>
        </fieldset> 
        <fieldset>
          <a href="add_answer.php" class="button" name="button" type="button">Добавить ответ</a>
        </fieldset>
        <fieldset>
            <div class="choose">
              <div class="option">
                
              </div>
            </div>
        </fieldset>

        <?php while($answer = mysqli_fetch_object($result_answers)):?>
            <fieldset style="float:left;vertical-align: bottom;margin:100 auto;"> 
                <a href="change_added_answer.php?answer_id=<?php echo $answer->id?>&answer_text=<?php echo $answer->text?>" class="button10"><?php echo $answer->text?></a>
            </fieldset>
        <?php endwhile;?>
        <input type="submit">
        <a href="index.html" class="button" name="button" type="button">Назад</a>
      </form>
    </div>
  </body>
</html>
