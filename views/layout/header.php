<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feather</title>
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="logo">Feather</div>
            
            <nav>
                <ul>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php if(!isset($_SESSION['userIdentity'])): ?>
                        <li>
                            <a href="<?=BASE_URL?>user/login">Login</a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL?>user/register" >Register</a>
                        </li>
                        
                    <?php else: ?>
                        <li>
                            <a href="<?=BASE_URL?>user/profile">Edit Profile</a>
                        </li>

                        <li>
                            <a href="#">My Reservations</a>
                        </li>
                        <?php if(isset($_SESSION['admin']) || isset($_SESSION['librarian'])):?>
                        
                            <li>
                                <a href="#">Manage Categories</a>
                            </li>
                            <li>
                                <a href="#">Manage Manage Users</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <div id="main-container">

