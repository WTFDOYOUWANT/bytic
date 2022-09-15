<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $answ_id = $_GET["answ_id"];
    $answ_name = $_GET["answ_text"];
    $question_id = $_GET["question_id"];
    //$res = mysqli_query($link, "DELETE FROM `answers` WHERE id = $answ_id");
    $res = mysqli_query($link, "DELETE FROM `scores` WHERE answ_id = $answ_id");
    $name = $_POST["name"];
    $answ_query = mysqli_query($link, "UPDATE answers set text = '$name' WHERE id = $answ_id");//INSERT INTO answers (text, question_id) VALUES ('$name', (SELECT COALESCE(MAX(ID), 0) FROM questions) + 1)
    foreach($_POST as $key => $value)
    {
        // echo "$key = $value"
        if($key != "name"){
            $result_insert = mysqli_query($link, "INSERT INTO scores (course_id, score, answ_id) VALUES ($key, $value, $answ_id)"); //ON DUPLICATE KEY UPDATE score=$value, answ_id=1
        }
    }
    header("Location: change_question_change_added_answer.php?answer_id=$answ_id&answer_text=$answ_name&question_id=$question_id");
    print_r($_POST);
?>