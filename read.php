<?php
try {
    require 'config/config.php';
    require 'config/common.php';

    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8"); // SQL lause, et täpitähed jääks mõistlikuks
    $sql = 'SELECT * FROM questions';

    //show($_POST); // Mis info vvormilt saadakse
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $resultR = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show($resultR); // Testime kas on tulemust
} catch (PDOException $error) {
    echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
}
?>
<?php
require 'templates/header.php';

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
        $id = $_GET['id']; // URL realt id võtmine

        $sql = 'SELECT * FROM answers WHERE question_id = :id AND answer = "answer1"';
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $resultID1 = $statement->fetchAll(); // result sisaldab leitud kirjeid
        //show(count($resultID1)); // Testime kas on tulemust

        $sql = 'SELECT * FROM answers WHERE question_id = :id AND answer = "answer2"';
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $resultID2 = $statement->fetchAll(); // result sisaldab leitud kirjeid
        //show(count($resultID2)); // Testime kas on tulemust

        $sql = 'SELECT * FROM answers WHERE question_id = :id AND answer = "answer3"';
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $resultID3 = $statement->fetchAll(); // result sisaldab leitud kirjeid
        //show(count($resultID3)); // Testime kas on tulemust
?>
        <div class="columns is-centered mt-2">
            <div class="column box is-half m-2">
                <form class="mb-2">
                    <table class="table is-hoverable is-bordered is-fullwidth mb-2">
                        <thead class="has-text-centered">
                            <tr>
                                <th>Vastus1</th>
                                <th>Vastus2</th>
                                <th>Vastus3</th>
                            </tr>
                        </thead>

                        <body>
                            <?php
                            $nr = 1;

                            ?>
                            <tr>
                                <td>Vastus 1 on valitud <?php echo (count($resultID1)); ?> korda </td>
                                <td>Vastus 2 on valitud <?php echo (count($resultID2)); ?> korda </td>
                                <td>Vastus 3 on valitud <?php echo (count($resultID3)); ?> korda </td>
                            </tr>
                            <?php
                            $nr++; // Suurendab nr-i ühe võrra

                            ?>
                        </body>
                    </table>
                </form>
            </div>
        </div>
<?php
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


?>
<div class="columns is-centered mt-2">
    <div class="column box is-half m-2">
        <h1 class="title is-1">Kõik küsitlused</h1>
        <form action="" method="POST" class="mb-2">

            <a href="admin.php">Admin lehele</a>

            <?php

            if ($resultR && $statement->rowCount() > 0) {
            ?>
                <table class="table is-hoverable is-bordered is-fullwidth">
                    <thead class="has-text-centered">
                        <tr>
                            <th>Jrk</th>
                            <th>Küsimus</th>
                            <th>Vastus1</th>
                            <th>Vastus2</th>
                            <th>Vastus3</th>
                            <th>Tegevus</th>
                        </tr>
                    </thead>

                    <body>
                        <?php
                        $nr = 1;
                        foreach ($resultR as $row) {
                        ?>
                            <tr>
                                <td><?php echo $nr; ?></td>
                                <td><?php echo escape($row['question']); ?></td>
                                <td><?php echo escape($row['answer1']); ?></td>
                                <td><?php echo escape($row['answer2']); ?></td>
                                <td><?php echo escape($row['answer3']); ?></td>
                                <td><a href="read.php?id=<?php echo $row['id']; ?>" class="button is-primary">Vaata mitu inimest vastas.</a></td>
                            </tr>
                        <?php
                            $nr++; // Suurendab nr-i ühe võrra
                        }
                        ?>
                    </body>
                </table>
            <?php
            } else {
            ?>
                <p class="has-text-centered">Kirjeid ei leitud.</p>
            <?php
            }
            ?>


    </div>
</div>
<?php require 'templates/footer.php'; ?>