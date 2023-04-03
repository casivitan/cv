<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');

}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Products Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"
</head>
<body>
<div class="typewriter">
    <h1>Sunt la început, ia-mă ușor....🙂</h1>
</div>
<br>
<br>
<p>

    <a href="create.php" class="btn btn-success">Adauga Produs</a>

</p>

    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cauta un produs" name="search" value="<?php echo $search ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cauta</button>
            </div>
        </div>
    </form>

<button onclick="sortListDir()">Sort</button>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Imagine</th>
        <th scope="col">Titlu</th>
        <th scope="col">Pret</th>
        <th scope="col">Data creeri</th>
        <th scope="col">Modifica</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $i => $product): ?>

        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <img src="<?php echo $product['image'] ?>" class="thumb-image">
            </td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
                <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form style="display: inline-block" method="post" action="delete.php">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>

    <?php  endforeach; ?>
    </tbody>
</table>

</body>
</html>