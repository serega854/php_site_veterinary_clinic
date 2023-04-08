<?php
require_once 'navbar.php';
?>




<?php
require_once 'logic.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container d-flex flex-wrap">
          <div class="container text-center">
        <form action="zoo.php" method="get">
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
                                    </select>
            </div>
            <div class="mb-3">
                <label>Фильтрация по полному имени питомца:</label>
                <input type="text" name="full_name" placeholder="Введите имя питомца" value="<?php if ($vfull_name!="0") echo $vfull_name ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Фильтрация по полному имени владельца:</label>
                <textarea class="form-control" name="owner_name" placeholder="Введите имя владельца" ><?php if ($vowner_name!="0") echo $vowner_name ?></textarea>
            </div>
            <div class="mb-3">
                <label>По году рождения Питомца:</label>
                <input type="text" name="birth_date" placeholder="Введите год рождения питомца" value="<?php if ($vbirth_date!="0") echo $vbirth_date ?>" class="form-control">
            </div>
            <input type="submit" value="Применить фильтр" class="btn btn-primary">
            <input type="submit" name="clearFilter" value="Очистить фильтр" class="btn btn-danger">
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
                    </tr>
                    <?php endforeach;?>

                                </tbody>
            </table>
            <?php endif;?>
            </div>


</html>



<?php
require_once 'footer.php';
?>