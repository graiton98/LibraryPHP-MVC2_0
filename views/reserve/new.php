<div class="center">
    <?php if(isset($_GET)): ?>
        <h1>Reservation</h1>
        <?php if(isset($_SESSION['result_reserve'])): ?>
            <?php if(substr($_SESSION['result_reserve'], 0, 1) == 'S'): ?>
                <div class="alert alert-success">
                    <?=$_SESSION['result_reserve']?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <?=$_SESSION['result_reserve']?>
                </div>
            <?php endif; ?>
            <?=Utils::deleteSession('result_reserve')?>
        <?php endif; ?>
        <form action="<?=BASE_URL?>reserve/checkDates" method="POST">
            <div class="form-group">
                <label for="id">Book Id</label>
                <?php
                    $book = Utils::getOneBook($_GET['id']);
                ?>
                <input class="form-control" type="text" name="id" value="<?=$_GET['id']?>" readonly=""/>
            </div>
            <div class="form-group">
                <label for="name">Book Name</label>
                <input class="form-control" type="text" name="name" value="<?=$book->getName_book()?>" readonly=""/>
            </div>
            <div class="form-group">
                <label for="takenDate">Taken Date<span class="text-danger font-weight-bold">*</span></label>
                <input class="form-control" type="text" id="datepicker" name="takenDate" required="" autocomplete="off"  />
            </div>
            <?php if(isset($_SESSION['admin']) || isset($_SESSION['librarian'])): ?>
            <div class="form-group">
                <label for="user">User for</label>
               <select name="user" class="form-control">
                <option disabled selected value=""></option>
                <?php while($user = $users->fetch_object()): ?>
                    <option value="<?=$user->id?>">
                        <?=$user->username?>
                    </option>
                <?php endwhile; ?>
                </select>
            </div>
            <?php endif;?>
            <input class="btn btn-primary mb-2" type="submit" value="submit" name="Reserve" />
        </form>
    <?php else: ?>
        <?php header('Location:'.BASE_URL);?>
    <?php endif; ?>
</div>


