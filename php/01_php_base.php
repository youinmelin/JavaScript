<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num = 123;
        $str = 'PHP';
        $arry = array('P','H','P');
        echo  'type:$str';
        echo '<div> hello'.$num.'</div>';
        echo '<div> hello</div>';
        echo "<div> hello $str </div>";
        print_r ($arry);
        echo '<br>';
        var_dump($arry);
        echo '<br>';
        var_dump($str);
    ?>
</body>
</html>