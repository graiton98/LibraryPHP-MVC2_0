<?php if(isset($_GET)): ?>
    <?php if(isset($_SESSION['result_reserve'])):?>
        <h1><?=$_SESSION['result_reserve']?></h1>
        <?php Utils::deleteSession('result_reserve'); ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>reserve/checkDates" method="POST">
        <div class="label-input">
            <label for="id">Id</label>
            <?php
                $book = Utils::getOneBook($_GET['id']);
            ?>
            <input type="text" name="id" value="<?=$_GET['id']?>" readonly=""/>
        </div>
        <div class="label-input">
            <label for="name">Book Name</label>
            <input type="text" name="name" value="<?=$book->getName_book()?>" readonly=""/>
        </div>
        <div class="label-input">
            <label for="takenDate">Taken Date</label>
            <input type="text" id="datepicker" name="takenDate" required="" autocomplete="off"  />
        </div>
        
        <input type="submit" value="submit" name="Reserve" />
    </form>
<?php else: ?>
    <?php header('Location:'.BASE_URL);?>
<?php endif;



