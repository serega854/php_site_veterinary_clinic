
<?php
require "db.php";
?>




<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contnent="ie=edge">
    <title>Аверия</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="css/main.css">


    <script type="text/javascript" src="jquery-1.3.2-vsdoc2.js"></script>
    <script type="text/javascript" src="js.js"></script>

</head>
<body>

 


    <!-- Навбар -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        
        <div class="container-fluid">
     
       
        
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="lab1.php" class="navbar-brad"><img src="img/111.png"></a>

            <a href="#">
                <button class="test btn btn-success" type="button">
                    Записаться
                </button>
            </a>

            

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item>">
                        <a href="#" class="nav-link">О нас</a>
                    </li>
                    <li class="nav-item>">
                        <a href="#" class="nav-link">Услуги</a>
                    </li>
                    <li class="nav-item>">
                        <a href="#" class="nav-link">Еще</a>
                    </li>
                    <li class="nav-item>">
                        <a href="#" class="nav-link">Отзывы</a>
                    </li>
                    <li class="nav-item>">
                        <a href="#" class="nav-link">Аверия Маркет</a>
                    </li>
                    

                    



                    <?php // как узнать авторизаван ли пользователь
                        if (isset($_SESSION['logged_user']) ):
                        ?>
                            <li class="nav-item>">
                                <a href="lab2.php" class="nav-link btn-outline-light">Личный кабинет<br>Пользователь: <?php echo $_SESSION['logged_user']->login; ?></a>
                            </li>

                            <li class="nav-item>">
                                <a href="/logout.php" class="nav-link">>Выйти</a>
                            </li>

                        <?php else: ?>

                        <br>
                        <li class="nav-item>">
                            <a href="/login.php" class="nav-link">>Авторизоваться</a><br>
                        </li>
                        <li class="nav-item>">    
                            <a href="signup.php" class="nav-link">>Регистрация</a>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>
    <!--Конец навбара-->
    


<?php require 'content1.php'; ?>

<?php require 'footer.php'; ?>