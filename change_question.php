<!DOCTYPE html>
<?php
 
 
/*Соединяеся с базой и делаем выборку из таблицы*/
 
$link = mysqli_connect("localhost", "root", "root");
 
mysqli_select_db($link, "byticinfo");
 
$sql = "SELECT * FROM questions";
 
$result_select = mysqli_query($link, $sql);
 
?>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <title>CodePen - HTML5 Contact Form</title>
      <link rel="stylesheet" href="./style.css">

  </head>
  <body>
      <!-- partial:index.partial.html -->
      <div class="container">
          <form id="contact" action="" method="post">
              <h3>Админ. панель</h3>
              <h4>Что вы хотите сделать?</h4>
              <fieldset>
                  <select class="select" id="question-select">
                      <?php while($object = mysqli_fetch_object($result_select)):?>
                        <option value="<?php echo $object->id; ?>"><?php echo $object->question; ?></option>
                      <?php endwhile;?>
                  </select>
              </fieldset>
              <fieldset>
                  <a href="change_question.php" class="nav" id="ok">Ок</a>
                  <a href="change_question.php" class="nav" id="back">Назад</a>
              </fieldset>
          </form>
      </div>
      <script>
        var ok_button = document.getElementById("ok");
        var select = document.getElementById("question-select");
        select.addEventListener('change', (event) => {ok_button.href = "change_question_change_question.php?question_id=" + select.value;});
        ok_button.href = "change_question_change_question.php?question_id=" + select.value;
      </script>
  </body>
</html>