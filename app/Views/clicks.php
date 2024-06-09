<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>клики</title>
</head>
<body>
    <h1>клики</h1>
    <?foreach($clicks as $click):?>
        <li><?=$click;?></li>
    <?endforeach;?>
</body>
</html>