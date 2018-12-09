<div class="content">
    <?php if(isset($book) && is_object($book)):?>
        <h1>Edit Book</h1>
        <?php $url_action = BASE_URL.'book/register&id='.$book->getId(); ?>
   <?php else: ?>
        <h1>New Book</h1>
        <?php $url_action = BASE_URL.'book/register' ?>
   <?php endif; ?>
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <div class="label-input">
            <label for="isbn">Isbn</label>
            <input type="number" name="isbn" minlength="13" maxlength="13" required="" value="<?= isset($book) && is_object($book) ? $book->getIsbn() : ''?>"/>
        </div>
        <div class="label-input">
            <label for="name">Name</label>
            <input type="text" name="name" required="" value="<?= isset($book) && is_object($book) ? $book->getName_book() : ''?>"/>
        </div>
        <div class="label-input">
            <label for="category">Category</label>
            <select name="category">
            <?php 
                $categories = Utils::showCategories();
                while ($cat = $categories->fetch_object()): ?>
                <?php if(isset($book) && is_object($book) && $cat->id == $book->getCategory_id()): ?>
                <option value="<?=$cat->id?>" selected="">
                <?php else: ?>
                <option value="<?=$cat->id?>">  
                <?php endif; ?>
                    <?=$cat->name_category?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="label-input">
            <label for="author">Author</label>
            <select name="author">
            <?php 
                $authors = Utils::getAuthors();
                while ($aut = $authors->fetch_object()): ?>
                <?php if(isset($book) && is_object($book) && $cat->id == $book->getAuthor_id()): ?>
                <option value="<?=$aut->id?>" selected="">
                <?php else: ?>
                <option value="<?=$aut->id?>">
                <?php endif; ?>
                    <?=$aut->name_author ." ".$aut->first_surname?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="label-input">
            <label for="description">Description</label>
            <textarea cols="35" rows="12" name="description" id="description" required=""><?= isset($book) && is_object($book) ? $book->getDescription() : ''?></textarea>
        </div>
        <div class="label-input widget">
            <label for="outstanding">Outstanding</label>
            <?php if(isset($book) && is_object($book) && $book->getOutstanding() == 1): ?>
            <input type="checkbox" name="outstanding" checked=""/>
            <?php else: ?>
            <input type="checkbox" name="outstanding"/>
            <?php endif; ?>
        </div>
        <div class="label-input">
            <?php if(isset($book) && is_object($book)): ?>
            <label for="img">Cover Page <?=$book->getIsbn().'.'.$book->getExtImage()?> Selected before Change</label>
            <input type="file" name="img" value="<?='assets/img/'.$book->getIsbn().'.'.$book->getExtImage()?>" accept="image/*"/>
            <?php else: ?>
            <input type="file" name="img" required="" accept="image/*"/>
            <?php endif; ?>
        </div>
        <input type="submit" value="Save" name="add" />
    </form>
</div>

