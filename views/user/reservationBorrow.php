
<h1>Reservations & Borrows</h1>
<table>
    <tr>
        <th>Code</th>
        <th>Book</th>
        <th>Taken Date</th>
        <th>Borrow</th>
    </tr>
    <?php
    $book = new Book();
    $books = $book->getAll();
    ?>
    <?php while($reserve = $reserves->fetch_object()): ?>
    <tr>
        <td><?=$reserve->code?></td>
        <?php while($book = $books->fetch_object()):?>
            <?php if($book->id == $reserve->id_book_fk):?>
        <td><?=$book->name_book?></td>
            <?php endif; ?>
        <?php endwhile;?>
        <td><?=$reserve->takenDate?></td>
        <td><a href="<?=BASE_URL?>borrow/add"><i class="fas fa-plus"></i></a></td>
    </tr>
    <?php endwhile; ?>
</table>


