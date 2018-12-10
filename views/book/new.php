<div class="center">
    <?php if(isset($book) && is_object($book)):?>
        <h1>Edit Book</h1>
        <?php $url_action = BASE_URL.'book/register&id='.$book->getId(); ?>
    <?php else: ?>
        <h1>New Book</h1>
        <?php $url_action = BASE_URL.'book/register' ?>
    <?php endif; ?>
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="isbn">Isbn<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="number" name="isbn" minlength="13" maxlength="13" required="" value="<?= isset($book) && is_object($book) ? $book->getIsbn() : ''?>"/>
        </div>
        <div class="form-group">
            <label for="name">Name<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="name" required="" value="<?= isset($book) && is_object($book) ? $book->getName_book() : ''?>"/>
        </div>
        <div class="form-group">
            <label for="category">Category<span class="text-danger font-weight-bold">*</span></label>
            <select name="category" class="form-control">
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
        <div class="form-group">
            <label for="author">Author<span class="text-danger font-weight-bold">*</span></label>
            <select name="author" class="form-control">
            <?php 
                $authors = Utils::getAuthors();
                while ($aut = $authors->fetch_object()): ?>
                <?php if(isset($book) && is_object($book) && $aut->id == $book->getAuthor_id()): ?>
                <option value="<?=$aut->id?>" selected="">
                <?php else: ?>
                <option value="<?=$aut->id?>">
                <?php endif; ?>
                    <?=$aut->name_author ." ".$aut->first_surname?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description<span class="text-danger font-weight-bold">*</span></label>
            <textarea class="form-control" rows="3" name="description" id="description" required=""><?= isset($book) && is_object($book) ? $book->getDescription() : ''?></textarea>
        </div>
        <div class="form-group widget">
            <?php if(isset($book) && is_object($book) && $book->getOutstanding() == 1): ?>
            <input type="checkbox" name="outstanding" checked=""/>
            <?php else: ?>
            <input type="checkbox" name="outstanding"/>
            <?php endif; ?>
            <label class="form-check-label" for="outstanding">Outstanding</label>
            
        </div>
        <div class="form-group">
            <?php if(isset($book) && is_object($book)): ?>
            <label for="img">Cover Page <?=$book->getIsbn().'.'.$book->getExtImage()?> Selected before Change</label>
            <input type="file" name="img" value="<?=$book->getIsbn().'.'.$book->getExtImage()?>" accept="image/*"/>
            <?php else: ?>
            <label for="img">Cover Page <span class="text-danger font-weight-bold">*</span></label>
            <input type="file" name="img" required="" accept="image/*"/>
            <?php endif; ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Save" name="add" />
    </form>
</div>

