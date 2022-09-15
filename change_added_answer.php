<!DOCTYPE html>
<?php
/*Соединяеся с базой и делаем выборку из таблицы*/
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db($link, "byticinfo");
 
$sql_groups = "SELECT * FROM groups";
$result_groups = mysqli_query($link, $sql_groups);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Изменить ответ</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./styleCourses.css">
    <!--link rel="stylesheet" href="./style2.css"-->
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
              background: #88c05b;
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
              background: #88c05b;
          }

          table {
              border-collapse: collapse;
              letter-spacing: 1px;
              font-size: 0.8rem;
              height: 50px;
          }

          td,
          th {
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
              background-color: #beea9b;
          }

          tr:nth-child(odd) td {
              background-color: #beea9b;
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
    <!-- partial:index.partial.html -->
    <div class="container">
        <form id="contact" action='send_cnanged_scores.php?answ_id=<?php echo $_GET["answer_id"];?>&answ_text=<?php echo $_GET["answer_text"];?>' method="post">
            <h3>Добавить ответ</h3>
            <h4>Текст ответа</h4>
            <fieldset>
                <input placeholder="Текст ответа" type="text" tabindex="1" name="name" id="quest" value='<?php echo $_GET["answer_text"]?>'>
            </fieldset>
            <h4 style="color:black;">Список курсов и их баллы</h4>
            <fieldset>
                <ul class="list5a">
                    <!--https://atuin.ru/blog/oformlenie-spiskov-ul-li-dlya-tekstov/-->
            </fieldset>
            <fieldset>
                <div>
                    <h4></h4>
                    <fieldset>
                        <div class="container">
                            <?php 
                                $answ_id = $_GET["answer_id"];
                                $score = mysqli_query($link, "SELECT * FROM scores WHERE answ_id = $answ_id");  
                                $value_to_change = [];
                                while($iter = mysqli_fetch_object($score)):
                                    $value_to_change[$iter->course_id] = [ "id" => $iter->id, "score" => $iter->score, "answ_id" => $iter->answ_id];
                                endwhile;
                            ?>
                            <?php while($group = mysqli_fetch_object($result_groups)):?>
                                <input type="checkbox" id="button<?php echo $group->id?>" name="raz">
                                <?php 
                                    $sql_courses = "SELECT * FROM courses WHERE group_id={$group->id}";
                                    $result_courses = mysqli_query($link, $sql_courses);
                                ?>
                                <div class="xpandable-block<?php echo $group->id?>">
                                    <div class="tab">
                                        <table class="table_blur">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" style="background: #88c05b; border-radius: 5px; height:10px;" ><label class="labeltable" for="button<?php echo $group->id?>"  style="color:#fff"><?php echo $group->name?></label></th>
                                                </tr>
                                                <?php while($object = mysqli_fetch_object($result_courses)):?>
                                                    
                                                    <tr>
                                                        <td id="<?php echo $object->id; ?>"><?php echo $object->name; ?></td>
                                                        <td><input type="number" name="<?php echo $object->id; ?>" id="<?php echo $object->id; ?>"max="9999" min="1" step="1" placeholder="баллы" value="<?php if (array_key_exists($object->id, $value_to_change)){echo $value_to_change[$object->id]["score"];}?>"></td>
                                                        <?php $arr[$object->id] = $object->name;?>
                                                    </tr>
                                                <?php endwhile;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endwhile;?>
                        </div>
                    </fieldset>
                    <input type="submit">
                </div>
            </fieldset>

            </table> -->
            <fieldset style="float: left;">
            <a href="add_question.php" style="width: 20%; float: left; margin-top: 40%;" class="button10" id="ok">Ок</a>
            <a href="add_question.php" style="width: 20%; float:right; margin-top: 40%;" class="button10" id="back">Назад</a>
                       </fieldset>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="script1.js"></script>
    <!-- partial -->
    <script type="text/javascript">
    $(".button10").on("click", function() { //$ это JQeury
        const yra = document.getElementById("quest1").value; //вместо  const может быть var,let
        if ($("#quest1").val() != "") {
            console.log(yra);
        } else {
            console.log('1234');
        }
    });
    </script>

</body>

</html>