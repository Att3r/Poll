<?php
require 'config/config.php';
require 'config/common.php';
require 'answers.php';

?>

<div class="columns is-centered">
    <div class="column is-one-fifth mt-2">
        <p class="has-text-centered has-text-success">Vastus lisati edukalt.</p>
        <div class="card has-background-success">
            <div class="card-content">
                <div class="content">

                    <h2>Küsitlus</h2>
                    <p><?php echo escape($result['question']); ?></p>
                    <form>
                        <th>
                        <td><label><?php echo (($result['answer1'])); ?> (<?php echo $answer1[0][0] ?>)</label></td>
                        <p class="title is-5"><?php echo $prog1 ?> %</p>
                        <progress class="progress" value="<?php echo $prog1 ?>" max="100"></progress>

                        <td><label><?php echo (($result['answer2'])); ?> (<?php echo $answer2[0][0] ?>)</label></td>
                        <p class="title is-5"><?php echo $prog2 ?> %</p>
                        <progress class="progress" value="<?php echo $prog2 ?>" max="100"><?php echo $prog2 ?></progress>

                        <td><label><?php echo (($result['answer3'])); ?> (<?php echo $answer3[0][0] ?>)</label></td>
                        <p class="title is-5"><?php echo $prog3 ?> %</p>
                        <progress class="progress" value="<?php echo $prog3 ?>" max="100"><?php echo $prog3 ?></progress>

                        </th>
                    </form>

                </div>
            </div>
        </div>
        <footer class="card-footer has-background-primary ">
            <p class="subtitle is-7">Küsitluses on osalenud <?php echo escape(count($answer)) ?> inimest</p>
        </footer>

    </div>
</div>
<?php require 'templates/footer.php' ?>