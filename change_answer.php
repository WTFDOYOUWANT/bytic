<!DOCTYPE html>
<html lang="en">
<?php
/*Соединяеся с базой и делаем выборку из таблицы*/
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db($link, "byticinfo");
$question_id = $_GET["question_id"];
print_r($question_id);
$sql_answers = "SELECT * FROM answers WHERE question_id = $question_id";
$result_answers = mysqli_query($link, $sql_answers);
?>

<head>
    <meta charset="UTF-8">
    <title>CodePen - HTML5 Contact Form</title>
    <link rel="stylesheet" href="./style.css">
    <style type="text/css">
     input[type=submit] {
           cursor: pointer;
           width: 100%;
           border: none;
           height: 45px;
           background: #99c45a;
           border-radius: 8px;
           font-family: 'Poppins', sans-serif;
           font-weight: lighter;
           color: #FFF;
           font-size: 20px;
           margin-bottom: 10px;
       }

       input[type=submit]:hover {
           background: #536040;
           -webkit-transition: background 0.3s ease-in-out;
           -moz-transition: background 0.3s ease-in-out;
           transition: background-color 0.3s ease-in-out;
       }

       input[type=submit]:active {
           box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
       }

       .modalDialog {
           position: fixed;
           font-family: Arial, Helvetica, sans-serif;
           top: 0;
           right: 0;
           bottom: 0;
           left: 0;
           background: rgba(0, 0, 0, 0.8);
           z-index: 99999;
           -webkit-transition: opacity 400ms ease-in;
           -moz-transition: opacity 400ms ease-in;
           transition: opacity 400ms ease-in;
           display: none;
           pointer-events: none;
       }

       .modalDialog:target {
           display: block;
           pointer-events: auto;
       }

       .modalDialog>div {
           width: 500px;
           height: 400px;
           font-size: 14px;
           position: relative;
           margin: 10% auto;
           padding: 5px 20px 13px 20px;
           border-radius: 10px;
           background: #fff;
           background: -moz-linear-gradient(#fff, #999);
           background: -webkit-linear-gradient(#fff, #999);
           background: -o-linear-gradient(#fff, #999);
       }

       table {
           border-collapse: collapse;
           border: 2px solid rgb(100, 100, 100);
           letter-spacing: 1px;
           font-size: 0.8rem;
           height: 50px;
       }

       td,
       th {
           border: 1px solid rgb(95, 95, 95);
           padding: 5px .5px;

       }

       th {
           background-color: black;
           font-weight: bolder;
       }

       td {
           text-align: center;
       }

       tr:nth-child(even) td {
           background-color: rgb(125, 125, 125);
       }

       tr:nth-child(odd) td {
           background-color: rgb(120, 120, 120);
       }

       caption {
           padding: 10px;
       }

       ::-webkit-input-placeholder {
           text-align: center;
       }

       :-moz-placeholder {
           /* Firefox 18- */
           text-align: center;
       }

       ::-moz-placeholder {
           /* Firefox 19+ */
           text-align: center;
       }

       :-ms-input-placeholder {
           text-align: center;
       }
    </style>
</head>

<body>
    <div class="container">
        <form id="contact" action="send_question.php" method="post">
            <h3>Добавить вопрос</h3>
            <h4>Введите текст вопроса</h4>
            <fieldset>
                <input placeholder="Текст возможного вопроса" type="text" tabindex="2" name="question_input" id="answ"
                    value="Какой иностранный язык вам нравится" required>
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
                <a href="change_added_question.php?answer_id=<?php echo $answer->id?>&answer_text=<?php echo $answer->text?>"
                    class="button10"><?php echo $answer->text?></a>
                <!--textarea class="area"style="width: 65%; height:40px; margin:0px 10px -14px 7px;">Пицца</textarea-->
            </fieldset>
            <?php endwhile;?>
            <input type="submit">
            <a href="index.html" class="button" name="button" type="button">back</a>
        </form>
    </div>
</body>
</html>