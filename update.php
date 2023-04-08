



<?php require "db.php";

$product_id = $_GET['id'];
$product = mysqli_query($connect,"SELECT * FROM `zoo` WHERE `id_photographers` = '$product_id'");
$product = mysqli_fetch_assoc($product);
//print_r($product);

?>





<form action="vender/update.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value = "<?= $product['id_photographers'] ?>">

    <p>Имя питомца</p>
    <input type="text" name="full_name" value="<?=$product['full_name'] ?>">


    <p>Вид питомца</p>
    
    


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



    <p>Имя владельца</p>
    <input type="text" name="owner_name" value="<?=$product['owner_name'] ?>">
    <p>Год рождения питомца</p>
    <input type="number" name="birth_date" value="<?=$product['birth_date'] ?>"> 
    <p>Описание</p>
    <input type="text" name="about" value="<?=$product['about'] ?>"> <br><br>
    
    <p>Изображение</p>
    <input type="file" name="photo"><br><br>
    
    <button type="submit">Изменить</button>

</form>

