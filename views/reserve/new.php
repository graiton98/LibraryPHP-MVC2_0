<?php if(isset($_GET)): ?>
    <?php if(isset($_SESSION['error_date_reserve'])):?>
        <h1><?=$_SESSION['error_date_reserve']?></h1>
        <?php Utils::deleteSession('error_date_reserve'); ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>reserve/checkDates" method="POST">
        <div class="label-input">
            <label for="id">Id</label>
            <input type="text" name="id" value="<?=$_GET['id']?>" />
            <label for="takenDate">Taken Date</label>
            <input type="text" id="datepicker" name="takenDate" required="" />
        </div>
        <input type="submit" value="submit" name="Reserve" />
    </form>
<?php else: ?>
    <?php header('Location:'.BASE_URL);?>
<?php endif;



