<?php
require 'config/config.php';
require 'config/common.php';

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
        $id = $_GET['id']; // URL realt id võtmine
        $sql = 'DELETE FROM questions WHERE id = :id';
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = 'Küsitlus edukalt kustutatud';
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
        $id = $_GET['id']; // URL realt id võtmine
        $sql = 'DELETE FROM answers WHERE question_id = :id';
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = 'Küsitlus edukalt kustutatud';
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

require 'templates/header.php';

try {
 
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8"); // SQL lause, et täpitähed jääks mõistlikuks
    $sql = 'SELECT * FROM questions';

    //show($_POST); // Mis info vvormilt saadakse
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $result = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show($result); // Testime kas on tulemust
} catch (PDOException $error) {
    echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
}
?>
<?php
if ($statement->rowCount() > 0) {
?>
    <div class="columns is-centered mt-2">
        <div class="column box m-2">
            <h1 class="title is-1 has-text-centered">Küsitlused kustutamiseks</h1>

            <?php if (isset($_GET['id']) && $success) : ?>
                <p class="has-text-centered"><?php echo escape($success); ?></p>
            <?php endif; ?>
            <p class="has-text-centered"><a href="index.php">Avalehele</a></p>
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
                    foreach ($result as $row) {
                    ?>
                        <tr>
                            <td><?php echo $nr; ?></td>
                            <td><?php echo escape($row['question']); ?></td>
                            <td><?php echo escape($row['answer1']); ?></td>
                            <td><?php echo escape($row['answer2']); ?></td>
                            <td><?php echo escape($row['answer3']); ?></td>

                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="button is-danger">Kustuta</a></td>
                        </tr>
                    <?php
                        $nr++; // Suurendab nr-i ühe võrra
                    }
                    ?>
                </body>
            </table>
        </div>
    </div>
<?php
} else {
?>
    <p>Kirjeid ei leitud</p>
    <p><a href="index.php">Avalehele</a></p>
<?php
}
?>

<?php require 'templates/footer.php'; ?>