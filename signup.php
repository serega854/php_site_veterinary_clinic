<?php
require "db.php";

$data = $_POST;
if (isset($data['do_signup']))
{
    $errors = array();
    if(trim($data['login'])=='')
    {
        $errors[] = 'Введите логин!';
    }

    if(trim($data['email'])=='')
    {
        $errors[] = 'Введите email!';
    }

    if(($data['password'])=='')
    {
        $errors[] = 'Введите пароль!';
    }

    if (strtolower($data['password']) == $data['password'])
    {
        $errors[] = 'Пароль должен содержать хотя бы одну заглавную букву';
    }
   
    
    













    
    if(strlen($data['password'])<6)
    {
        $errors[] = 'Пароль должен быть длинее 6 символов';
    }

    if($data['password_2']!=$data['password'])
    {
        $errors[] = 'Повторный пароль введён не верно!';
    }
    



    if(R::count('users',"login = ?", array($data['login'])))
    {
        $errors[] = 'Пользователь с таким логином уже существует';
    }

    if(R::count('users',"email = ?", array($data['email'])))
    {
        $errors[] = 'Пользователь с таким Email уже существует';
    }

    if (empty($errors))
    {
        //если массив ошибок пустой то регестрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        echo '<label>Вы успешно зарегестрировались!</label>'; //сделать чтоб надпись пропадала через какое то время

        //всё логиним пользователя
        $_SESSION['logged_user']=$user;
        

    }
    else
    {
        echo '<label class="warning_reg">'.array_shift($errors).'</label>';
    }

}


?>

<link rel="stylesheet" href="css/join.css">
<body>
<form action="/signup.php" method="POST">

        <label>Логин</label>
        <input type="text" placeholder="Введите логин" name="login" value="<?php echo @$data['login'];?>">



        <label>Email</label>
        <input type="email" placeholder="Введите email" name="email" value="<?php echo @$data['email'];?>">



        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name="password" value="<?php echo @$data['password'];?>">
  


        <label>Пароль повторно</label>
        <input type="password" placeholder="Введите пароль еще раз" name="password_2" value="<?php echo @$data['password_2'];?>">


        <button type="submit" name = "do_signup">Зарегестрироваться</button>



        <label>У вас уже есть аккаунт? - </strong><a class="a" href="login.php">Войдите</label>


</form>
</body>