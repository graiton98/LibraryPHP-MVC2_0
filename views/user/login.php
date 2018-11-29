<h1>LOGIN</h1>
<?php if(isset($_SESSION['error_login'])): ?>
    <h1>LOGIN ERROR</h1>
    <?php Utils::deleteSession('error_login') ?>
<?php endif; ?>
<form class="form-login-register" action="<?=BASE_URL?>user/saveLogin" method="POST">
    <div class="label-input">
        <label for="username">Username</label>
        <input type="text" name="username" required="" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Username'"/>
    </div>
    <div class="label-input">
        <label for="password">Password</label>
        <input type="password" name="password" required="" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'"/>
    </div>
    <div class="cancel-submit">
        <input type="submit" value="Login" onclick="document.getElementById('id01').style.display = 'none'"/>
        <button class="cancelbtn">Cancel</button>
    </div>
</form>

