<h1>REGISTER</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
    <h1>REGISTER ERROR</h1>
    <?php Utils::deleteSession('register') ?>
<?php endif; ?>
<form class="form-login-register" action="<?=BASE_URL?>user/saveRegister" method="POST">             
    <div class="label-input">
        <label for="username">Username</label>
        <input type="text" name="username" required="" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Username'"/>
    </div>
    <div class="label-input">
        <label for="password">Password</label>
        <input type="password" name="password" required="" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Password'"/>
    </div>
    <div class="label-input">
        <label for="name_user">Name</label>
        <input type="text" name="name_user" required="" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your name'"/>
    </div>
    <div class="label-input">
        <label for="first_surname">First Surname</label>
        <input type="text" name="first_surname" required="" placeholder="Enter your first surname" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your first surname'"/>
    </div>
    <div class="label-input">
        <label for="dni">Dni</label>
        <input type="text" name="dni" required="" placeholder="Enter your dni" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your dni'"/>
    </div>
    <div class="label-input">
        <label for="email">Email</label>
        <input type="email" name="email" required="" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your email'"/>
    </div>
    <div class="label-input">
        <label for="phone_number">Phone Number</label>
        <input type="number" name="phone_number" required="" placeholder="Enter your phone number" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your phone number'"/>
    </div>
    <div class="label-input">
        <?php if(isset($_SESSION['admin'])):?>
            <?php $types = Utils::getTypesOfUser($_SESSION['userIdentity']->type_of_user)?>
            <select name="type_of_user">
                <?php while($type = $types->fetch_object()): ?>
                    <option value="<?=$type->id?>"><?=$type->name?></option>
                <?php endwhile; ?>
            </select>
        <?php endif; ?>
    </div>
    <input type="submit" value="Register" name="register" />
 </form>
