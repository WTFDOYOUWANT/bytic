<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["group_name_input"];
    $group_query = mysqli_query($link, "INSERT INTO groups (`name`) VALUES ('$name')");
    
    header('Location: add_group.php');
    print_r($_POST);
?>