<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Стата по источнику</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">MFO App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/clicks">Стата по источнику</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/offers">Стата по офферу</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add_offer">Список Офферов</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h1>Статистика по источнику</h1>
    <form method="GET" action="/clicks" class="mb-4">
        <div class="form-row">
            <div class="col">
                <label for="start_date">Начало:</label>
                <input type="datetime-local" id="start_date" name="start_date" class="form-control" value="<?php echo $startDate; ?>">
            </div>
            <div class="col">
                <label for="end_date">Конец:</label>
                <input type="datetime-local" id="end_date" name="end_date" class="form-control" value="<?php echo $endDate; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Применить</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Source</th>
                <th>Clicks</th>
                <th>Unique Clicks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clicks as $click): ?>
                <tr>
                    <td><?php echo htmlspecialchars($click['source']); ?></td>
                    <td><?php echo $click['count']; ?></td>
                    <td><?php echo $click['unique_count']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
