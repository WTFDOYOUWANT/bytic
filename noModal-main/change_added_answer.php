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
    <title>CodePen - HTML5 Contact Form</title>
    <link rel="stylesheet" href="./style.css">
    <!--link rel="stylesheet" href="./style2.css"-->
    <style type="text/css">
    a.button10 {
        display: inline-block;
        color: black;
        font-size: 125%;
        font-weight: 700;
        text-decoration: none;
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

    }

    td,
    th {
        border: 1px solid rgb(95, 95, 95);
        padding: 5px .5px;

    }

    th {
        background-color: rgb(115, 115, 115);
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
                            <table>
                                <?php 
                                    $answ_id = $_GET["answer_id"];
                                    $score = mysqli_query($link, "SELECT * FROM scores WHERE answ_id = $answ_id");  
                                    $value_to_change = [];
                                    while($iter = mysqli_fetch_object($score)):
                                        $value_to_change[$iter->course_id] = [ "id" => $iter->id, "score" => $iter->score, "answ_id" => $iter->answ_id];
                                    endwhile;
                                ?>
                                <?php while($group = mysqli_fetch_object($result_groups)):?>
                                    <td colspan="2"><?php echo $group->name?></td>
                                    <?php 
                                                $sql_courses = "SELECT * FROM courses WHERE group_id={$group->id}";
                                                $result_courses = mysqli_query($link, $sql_courses);
                                            ?>
                                    <?php while($object = mysqli_fetch_object($result_courses)):?>
                                    
                                    <tr>
                                        <td id="<?php echo $object->id; ?>"><?php echo $object->name; ?></td>
                                        <td><input type="number" name="<?php echo $object->id; ?>" id="<?php echo $object->id; ?>"
                                                max="9999" min="1" step="1" placeholder="баллы" value="<?php if (array_key_exists($object->id, $value_to_change)){echo $value_to_change[$object->id]["score"];}?>"></td>
                                        <?php $arr[$object->id] = $object->name;?>
                                    </tr>
                                    <?php endwhile;?>
                                <?php endwhile;?>
                                <!-- </form> -->
                            </table>
                    </fieldset>
                    <input type="submit">
                </div>
            </fieldset>
            <?php 
                foreach($arr as $key => $value)
                {
                    $result_scores = mysqli_query($link, "SELECT * FROM scores WHERE course_id=$key");
                    $object = mysqli_fetch_object($result_scores);
                    if($object->score != null){
                        echo "<tr>";
                        echo "<td>";
                        echo $value;
                        echo "</td>";
                        echo "<td>";
                        echo $object->score;
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            
            ?>
            </table> -->
            <fieldset style="float: left;">
                <a href="add_question.php" class="button10" id="ok">Ок</a>
                <a href="add_question.php" style="margin-left: 25%; " class="button10" id="back">Назад</a>
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