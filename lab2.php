
















<?php require "db.php";?>










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
                    
                    

                   

                    <li class="nav-item>">

                        <a href="logout.php" class="nav-link" name = "logout">Выйти</a>
                        
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!--Конец навбара-->
    






































































<?php
require_once 'logic.php';

if (!isset($_SESSION['logged_user']) )    // просто чтобы нельзя было написать ссылку и перейти без регистрации
{
    header('Location: lab1.php');
}


?>



<!doctype html>
<html lang="en">
  <body>
    <div class="container d-flex flex-wrap">
          <div class="container text-center">
        <form action="lab2.php" method="get">
            <h2>Фильтрация результата поиска</h2>
            <div class="mb-3">
                <label>Вид питомца:</label>
                <select name="name" class="form-control">
                    <option value="">Выберите вид питомца</option>
        
                                        <option value="1"<?php if($vname == '1'): ?> selected="selected"<?php endif; ?>>Кот</option>
                                        <option value="2"<?php if($vname == '2'): ?> selected="selected"<?php endif; ?>>Собака</option>
                                        <option value="3"<?php if($vname == '3'): ?> selected="selected"<?php endif; ?>>Кролик</option>
                                        <option value="4"<?php if($vname == '4'): ?> selected="selected"<?php endif; ?>>Черепаха</option>
                                        <option value="5"<?php if($vname == '5'): ?> selected="selected"<?php endif; ?>>Хомяк</option>
                                        <option value="6"<?php if($vname == '6'): ?> selected="selected"<?php endif; ?>>Морская свинка</option>
                                        <option value="7"<?php if($vname == '7'): ?> selected="selected"<?php endif; ?>>Попугай</option>
                                        <option value="8"<?php if($vname == '8'): ?> selected="selected"<?php endif; ?>>Шиншила</option>
                                    </select>
            </div>
            <div class="mb-3">
                <label>Полное имя питомца:</label>
                <input type="text" name="full_name" placeholder="Введите имя питомца" value="<?php if ($vfull_name!="0") echo $vfull_name ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Полное имя владельца:</label>
                <input type="text" name="owner_name" placeholder="Введите имя владельца" value="<?php if ($vowner_name!="0") echo $vowner_name ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Год рождения Питомца:</label>
                <input type="text" name="birth_date" placeholder="Введите год рождения питомца" value="<?php if ($vbirth_date!="0") echo $vbirth_date ?>" class="form-control">
            </div>
            <input type="submit" value="Применить фильтр" class="b1 btn-success">
            <input type="submit" name="clearFilter" value="Очистить фильтр" class="b1">
        </form>
    </div>
<!-- -->
<div class="container text-center mt-3">
  <?php if(count($result) > 0):?>
                    <table class="table">
                <thead>
                <tr>
                    <th scope="col">Фотография</th>
                    <th scope="col">Имя питомца</th>
                    <th scope="col">Вид питомца</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Год рождения питомца</th>
                    <th scope="col">Описание</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $item):?>
                                    <tr>
                        <th scope="row"><img src="inc/<?=$item['photo']?>" style="max-width: 150px;"></th>
                        
                        <td><?=$item['full_name']?></td>
                        <td><?=$item['name']?></td>
                        <td><?=$item['owner_name']?></td>
                        <td><?=$item['birth_date']?></td>
                        <td><?=$item['about']?></td>
                        <td><a href="update.php?id=<?=$item['id_photographers']?>">Изменить</a></td>
                        <td><a style = "color : red" href="vender/delete.php?id=<?=$item['id_photographers']?>">Удалить</a></td>

                    </tr>

                    
                    <?php endforeach;

                    ?>

                </tbody>
            </table>
            <?php endif;?>
</div>

<a href="#" >Добавить</a>

<form action="vender/create.php" method="post" enctype="multipart/form-data">
    <br>
    <br>
    <br>
    <hr>
    <h3>Добавление записей</h3>
    <label>Заполните все поля</label>

    <p><label>Имя питомца</label>
    <input type="text" name="full_name">


    <p>Вид питомца

    
    
    <select name="id_types" class="form-control">
        <option value="">Выберите вид питомца</option>
        <option value="1"<?php if($vname == '1'): ?> selected="selected"<?php endif; ?>>Кот</option>
        <option value="2"<?php if($vname == '2'): ?> selected="selected"<?php endif; ?>>Собака</option>
        <option value="3"<?php if($vname == '3'): ?> selected="selected"<?php endif; ?>>Кролик</option>
        <option value="4"<?php if($vname == '4'): ?> selected="selected"<?php endif; ?>>Черепаха</option>
        <option value="5"<?php if($vname == '5'): ?> selected="selected"<?php endif; ?>>Хомяк</option>
        <option value="6"<?php if($vname == '6'): ?> selected="selected"<?php endif; ?>>Морская свинка</option>
        <option value="7"<?php if($vname == '7'): ?> selected="selected"<?php endif; ?>>Попугай</option>
        <option value="8"<?php if($vname == '8'): ?> selected="selected"<?php endif; ?>>Шиншила</option>
    </select>
    
    
    
    
    
    
    
    
    
    
    
    
    <br>
    Имя владельца
    <input type="text" name="owner_name" >
    <p>Год рождения питомца
    <input type="number" name="birth_date">
    <p>Описание
    <input type="text" name="about"><br><br>
    

    <p>Изображение</p>
    <input type="file" name="photo"><br><br>


    <button type="submit">Добавить</button>
    <hr>

</form>






















</html>



<?php
require_once 'footer.php';
?>
