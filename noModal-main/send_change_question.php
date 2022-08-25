<?php
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["question_input"];
    $question_id = $_GET["question_id"];
    if($_POST["submit"]){

        $answ_query = mysqli_query($link, "UPDATE questions SET question = '$name' WHERE id = $question_id;");
        print_r($_POST);
        print_r("asdasd");
    }

    if($_POST["delete"]){
        // $answ_query = mysqli_query($link, "DELETE FROM questions WHERE id = $question_id; 
        // DELETE FROM scores WHERE answ_id IN (SELECT id FROM answers WHERE question_id = $question_id); 
        // DELETE FROM answers WHERE question_id = $question_id;"); //
        $answ_query = mysqli_query($link, "DELETE FROM questions WHERE id = $question_id"); 
        $answ_query = mysqli_query($link, "DELETE FROM scores WHERE answ_id IN (SELECT id FROM answers WHERE question_id = $question_id)"); 
        $answ_query = mysqli_query($link, "DELETE FROM answers WHERE question_id = $question_id;"); 
        $questions_last_query = mysqli_query($link, "SELECT COALESCE(MAX(ID), 0) FROM questions;");
        $answer_last_query = mysqli_query($link, "SELECT COALESCE(MAX(ID), 0) FROM answers;");

        $questions_last_id = mysqli_fetch_object($questions_last_query)->id + 1;
        $answer_last_id = mysqli_fetch_object($answer_last_query)->id + 1;

        $alter_query = mysqli_query($link, "ALTER TABLE questions AUTO_INCREMENT = $questions_last_id; ALTER TABLE answers AUTO_INCREMENT = $answer_last_id;");

        //ALTER TABLE questions AUTO_INCREMENT = (SELECT COALESCE(MAX(ID), 0) FROM questions + 1);
        //
        // while($object = mysqli_fetch_object($result_select)):
            
        // endwhile;
        //$answ_query = mysqli_query($link, "DELETE FROM answers WHERE question_id = $question_id;");
        print_r($_POST);
    }
    //header("Location: change_question.php");
   
?>