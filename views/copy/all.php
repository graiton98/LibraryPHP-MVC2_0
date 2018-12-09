<div class="content">
    <h1>Copies of <?=$book->getName_book()?></h1>
    <?php 
        if(isset($_SESSION['copy'])){
            echo '<p>'.$_SESSION['copy'].'</p>';
            Utils::deleteSession('copy');
        }
    ?>
    <a href="<?=BASE_URL?>copy/add&bookId=<?=$book->getId()?>">Add Copy</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Status</th>
            <td>Browse</td>
            <td>Delete</td>
        </tr>
        <?php while($copy = $copies->fetch_object()):?>
        <tr>
            <td><?=$copy->id?></td>
            <td><?=$copy->status?></td>
            <td><a href="<?=BASE_URL?>copy/browse&bookId=<?=$book->getId()?>&id=<?=$copy->id?>"><i class="fas fa-pencil-alt"></i></a></td>
            <td><a href="<?=BASE_URL?>copy/delete&bookId=<?=$book->getId()?>&id=<?=$copy->id?>"><i class="fas fa-times"></i></a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

