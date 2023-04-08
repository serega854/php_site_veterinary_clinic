<?php
require "db.php";

$data = $_POST;
$count = 0;

if(isset($data['do_login']))
{
    $user = R::findOne('users','login = ?',array($data['login']));

    if ($user)
    {
        if(password_verify($data['password'],$user->password))
        {
            //всё хорошо логиним пользоватя
            
            $_SESSION['logged_user']=$user;
            echo '<div style="color : green;">Вы авторизованны!<br/>
            </div><hr>';
            header('Location: lab1.php');

        }
        else
        {
            $errors[] = "Неверно введён пароль"; 
        }


        

    }
    else
    {
        $errors[] = "Пользователь с таким логином не найден";
    }


    $count = 0;
    if (!empty($errors))
    {
        echo '<label class="r">'.array_shift($errors).'</label>';


    }
    
    
}



?>










<link rel="stylesheet" href="css/join.css">

<body>
<form action="/login.php" method="POST">
    

    <label>Логин</label>
    <input type="text" placeholder="Введите логин" name="login" value="<?php echo @$data['login'];?>">



    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль" name="password" value="<?php echo @$data['password'];?>">



    <button type="submit" name = "do_login">Войти</button>



    <label>У вас нет аккаунта? - <a class="a" href="signup.php">Зарегестрируйтесь</a></label>



</form>
</body>
