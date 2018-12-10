<div class="center">
    <h1>Reservations</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Book</th>
                <th scope="col">Taken Date</th>
            </tr>
        </thead>
        <?php
        $book = new Book();
        $books = $book->getAll();
        ?>
        <tbody>
            <?php while($reserve = $reserves->fetch_object()): ?>
            <tr>
                <td scope="row"><?=$reserve->code?></td>
                <?php while($book = $books->fetch_object()):?>
                    <?php if($book->id == $reserve->id_book_fk):?>
                <td scope="row"><?=$book->name_book?></td>
                    <?php endif; ?>
                <?php endwhile;?>
                <td scope="row"><?=$reserve->takenDate?></td>
                <!--<td scope="row"><a href="<?=BASE_URL?>borrow/add"><i class="fas fa-plus"></i></a></td>-->
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

