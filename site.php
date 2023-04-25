<!DOCTYPE html>

<html>
<head>
    <title>Gif Search</title>
</head>
<body>
<form action="main.php" method="get">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
</form>
<?php if (!empty($gifs)) : ?>
    <?php foreach ($gifs as $gify) : ?>
        <div>
            <h3><?= $gify->getName() ?></h3>
            <img src="<?= $gify->getUrl() ?>" alt="<?= $gify->getName() ?>">
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>


