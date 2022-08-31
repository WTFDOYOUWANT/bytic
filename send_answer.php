<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    
    // $test = "INSERT INTO scores (`course_id`, `score`) VALUES (2, 100)";

    // $save = mysqli_query($link, $test);

    // $servername = "localhost";
    // $username = "root";
    // $password = "root";
    // $dbname = "byticinfo";
    
    // // Create connection
    // $conn = new mysqli($servername,
    //     $username, $password, $dbname);
    
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: "
    //         . $conn->connect_error);
    // }
    
    // $sqlquery = "INSERT INTO scores (`course_id`, `score`) VALUES (2, 100)"
    
    // if ($conn->query($sql) === TRUE) {
    //     echo "record inserted successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // $res = mysqli_query($link, "DELETE FROM `scores` WHERE answ_id = 1");
    $name = $_POST["name"];
    $answ_query = mysqli_query($link, "INSERT INTO answers (text, question_id) VALUES ('$name', (SELECT COALESCE(MAX(ID), 0) FROM questions) + 1);");// когда answers пустой, то не может записывать INSERT INTO answers (text, question_id) VALUES ('test', COALESCE(SELECT MAX(ID) FROM questions, 0) + 1);
    foreach($_POST as $key => $value)
    {
        // echo "$key = $value"
        if($key != "name"){
            $result_insert = mysqli_query($link, "INSERT INTO scores (course_id, score, answ_id) VALUES ($key, $value, (SELECT COALESCE(MAX(ID), 0) FROM answers))"); //ON DUPLICATE KEY UPDATE score=$value, answ_id=1
        }
    }
    header('Location: add_answer.php');
    print_r($_POST);
    //require_once('add_answer.php');
    //$result_courses = mysqli_query($link, $sql_courses);
?>