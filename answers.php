<?php
# Database ühendus kirjete lugemiseks
try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");
    $sql = 'SELECT * FROM questions ORDER BY id DESC';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    //show($result); // Testiks
} catch (PDOException $error) {
    echo $error->getMessage();
}

require 'templates/header.php';

try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");

    $sql = 'SELECT * FROM answers WHERE question_id = ' . $result['id'];
    //show($sql);
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $answer = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show(($answer)); // Testiks

} catch (PDOException $error) {
    echo $error->getMessage();
}

//Mitu vastas vastus1
try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");

    $sql = 'SELECT COUNT(*) FROM answers WHERE question_id = ' . $result["id"] . ' AND answer = "answer1"';
    //show($sql);
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $answer1 = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show($answer1); // Testiks
    //show($answer1[0][0]); // Testiks
    $prog1 = round((($answer1[0][0] / count($answer)) * 100), 0);
    //show($prog1);


} catch (PDOException $error) {
    echo $error->getMessage();
}
//Mitu vastas vastus2
try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");

    $sql = 'SELECT COUNT(*) FROM answers WHERE question_id = ' . $result["id"] . ' AND answer = "answer2"';
    //show($sql);
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $answer2 = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show($answer2); // Testiks
    //show($answer2[0][0]); // Testiks
    $prog2 = round((($answer2[0][0] / count($answer)) * 100), 0);
    //show($prog2);


} catch (PDOException $error) {
    echo $error->getMessage();
}
//Mitu vastas vastus3
try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");

    $sql = 'SELECT COUNT(*) FROM answers WHERE question_id = ' . $result["id"] . ' AND answer = "answer3"';
    //show($sql);
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $answer3 = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show($answer3); // Testiks
    //show($answer3[0][0]); // Testiks
    $prog3 = round((($answer3[0][0] / count($answer)) * 100), 0);
    //show($prog3);


} catch (PDOException $error) {
    echo $error->getMessage();
}
?>