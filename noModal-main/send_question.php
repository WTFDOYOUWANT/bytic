<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["question_input"];
    $answ_query = mysqli_query($link, "INSERT INTO questions (question) VALUES ('$name')");
    
    header('Location: index.html');
    print_r($_POST);
?>