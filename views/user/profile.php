<div class="content">
    <form action="" method="POST">
        <div class="label-input">
            <label for="username">Username</label>
            <input type="text" name="username" required="" value="<?=$user->getUsername()?>"/>
        </div>
        <div class="label-input">
            <label for="password">Password</label>
            <input type="password" name="password" required="" value="<?=$user->getPassword()?>"/>
        </div>
        <div class="label-input">
            <label for="name_user">Name</label>
            <input type="text" name="name_user" required="" value="<?=$user->getName_user()?>"/>
        </div>
        <div class="label-input">
            <label for="first_surname">First Surname</label>
            <input type="text" name="first_surname" required="" value="<?=$user->getFirst_surname()?>"/>
        </div>
        <div class="label-input">
            <label for="dni">Dni</label>
            <input type="text" name="dni" required="" value="<?=$user->getDni()?>"/>
        </div>
        <div class="label-input">
            <label for="email">Email</label>
            <input type="email" name="email" required="" value="<?=$user->getEmail()?>"/>
        </div>
        <div class="label-input">
            <label for="phone_number">Phone Number</label>
            <input type="number" name="phone_number" required="" value="<?=$user->getPhone_number()?>"/>
        </div>
        <?php if(isset($_SESSION['admin'])):?>
            <div class="label-input">
                <?php $types = Utils::getTypesOfUser($_SESSION['userIdentity']->type_of_user)?>
                <select name="type_of_user">
                    <?php while($type = $types->fetch_object()): ?>
                        <?php if($type->id === $user->getType_of_user()):?>
                            <option value="<?=$type->id?>" selected="selected"><?=$type->name?></option>
                        <?php else: ?>
                            <option value="<?=$type->id?>"><?=$type->name?></option>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </select>
            </div>
        <?php endif; ?>
        
        <input type="submit" name="update" value="Update" />
    </form>
</div>