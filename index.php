<?php
require 'config/config.php';
require 'config/common.php';

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
//IP aadress 
$ip_add = $_SERVER['REMOTE_ADDR'];
//echo "The user's IP address is - " . $ip_add;
if (isset($_POST['answer'])) {
    header("Location: second.php");

if (isset($_POST['submit'] )) {
    try {
        $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
        $connection->exec("SET NAMES utf8");
        $new_poll = array(
            'ip' => $ip_add,
            'question_id' => $result['id'],
            'answer' => $_POST['answer']
        );
        //show($new_poll);
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            'answers',
            implode(', ', array_keys($new_poll)),
            ':' . implode(', :', array_keys($new_poll))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_poll);

        
        

        //show($sql); // Testiks
    } catch (PDOException $error) {
        echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
    }
} 
} 

try {
    $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
    $connection->exec("SET NAMES utf8");

    $sql = 'SELECT * FROM answers WHERE question_id = '.$result['id'];
    //show($sql);
    $statement = $connection->prepare($sql); // Valmista SQL ette
    $statement->execute();
    $answer = $statement->fetchAll(); // result sisaldab leitud kirjeid
    //show(count($answer)); // Testiks

} catch(PDOException $error) {
    echo $error->getMessage();
}

?>



<?php require 'templates/header.php' ?>
<div class="columns is-centered">
    <div class="column is-one-fifth mt-2">
        <div class="card">
            <div class="card-content has-background-success">
                <div class="content">
                    <h2>Küsitlus</h2>
                    <p><?php echo escape($result['question']); ?></p>

                    
                    <form action="" method="post">
                        <th>
                        <td><input type="radio" id="1" name="answer" value="answer1"></td>
                        <td><label for="1"><?php echo escape($result['answer1']); ?></label><br></td>
                        <td><input type="radio" id="2" name="answer" value="answer2"></td>
                        <td><label for="2"><?php echo escape($result['answer2']); ?></label><br></td>
                        <td><input type="radio" id="3" name="answer" value="answer3"></td>
                        <td><label for="3"><?php echo escape($result['answer3']); ?></label><br></td>
                        <input type="hidden" name="submit" />
                        <td><input type="submit" value="Sisesta vastus" class="button is-warning mt-1"></td>
                        </th>
                    </form>

                </div>
            </div>
            <footer class="card-footer has-background-primary ">
                <p class="subtitle is-7">Küsitluses on osalenud <?php echo escape(count($answer)) ?> inimest</p>
            </footer>
        </div>
        <a href="admin.php">Admin - Kodutöö testimiseks</a>

    </div>
</div>

<?php require 'templates/footer.php' ?>