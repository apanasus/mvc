<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>оффера</title>
</head>
<body>
    <h1>оффера</h1>
    <?foreach($offers as $offer):?>
        <li><?=$offer;?></li>
    <?endforeach;?>
</body>
</html>