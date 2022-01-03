<?php
if(isset($_POST['submit'])) { // Kas on vajutatud submit nuppu name="submit" osa
    require 'config/config.php';
    require 'config/common.php';

    # Vormilt saadud andmeid on vaja alati kontrollida
    # Meie seda hetkel ei tee

    try {
        $connection = new PDO($dsn, USERNAME, PASSWORD, $options);
        $connection->exec("SET NAMES utf8"); // SQL lause, et täpitähed jääks mõistlikuks
        
        $new_poll = array(
            'question' => $_POST['question'],
            'answer1' => $_POST['answer1'],
            'answer2' => $_POST['answer2'],
            'answer3' => $_POST['answer3'],
        );

        //$sql = 'INSERT INTO questions (question, anwser1, anwser2, answer3, status) 
            //VALUES (:question, :answer1, :answer2, :answer3, 'Aktiivne')';
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', 'questions', 
            implode(', ', array_keys($new_poll)), ':'.implode(', :', array_keys($new_poll)));
        //show($sql); # Testiks   
        $statement = $connection->prepare($sql);
        $statement->execute($new_poll);

    } catch (PDOException $error) {
        echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
    }
}
?>
<?php require 'templates/header.php'; ?>
<div class="columns is-centered mt-2">
    <div class="column box is-half m-2">
        <h1 class="title is-1">Lisa küsitlus</h1>

        <?php 
        if(isset($_POST['submit']) && $statement) {
            ?>
            <p class="has-text-centered has-text-success">
                <?php echo escape($_POST['question']); ?> lisati edukalt. 
            </p>
            <?php
        }
        ?>
        
        <form action="" method="post">
            <div class="field">
                <label for="question" class="label">Küsimus</label>
                <input type="text" name="question" id="question" class="input">

                <label for="answer1" class="label">Vastus 1</label>
                <input type="text" name="answer1" id="answer1" class="input">

                <label for="answer2" class="label">Vastus 2</label>
                <input type="text" name="answer2" id="answer2" class="input">

                <label for="answer3" class="label">Vastus 3</label>
                <input type="text" name="answer3" id="answer3" class="input">
                
            </div>
            <input type="submit" name="submit" value="Lisa küsitlus" class="button is-link">
        </form>
        <a href="admin.php">Admin lehele</a>
    </div>
</div>
<?php require 'templates/footer.php'; ?>