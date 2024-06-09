<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Offer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">MVC App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/clicks">Clicks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/offers">Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add_offer">Add Offer</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h1 class="mb-4">Add New Offer</h1>
    <form action="/add_offer" method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="form-group">
            <label for="name">Offer Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url">Offer URL:</label>
            <input type="url" id="url" name="url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Offer Image:</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    
    <h2 class="mb-4">оффера</h2>
    <ul class="list-group">
        <?php foreach ($offers as $offer): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="/uploads/<?php echo $offer['image']; ?>" alt="<?php echo $offer['name']; ?>" class="img-thumbnail mr-3" style="width:100px; height:100px;">
                    <div>
                        <h5 class="mb-1"><?php echo $offer['name']; ?></h5>
                        <a href="<?php echo $offer['url']; ?>" target="_blank"><?php echo $offer['url']; ?></a>
                    </div>
                </div>
                <form action="/add_offer/delete/<?php echo $offer['id']; ?>" method="POST" class="mb-0">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
