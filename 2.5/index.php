<?php require('./app/index.code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div>
    <a href="add.php" class="btn btn-primary">Add Contact</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>Last Name, First Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $item) : ?>
                <tr>
                    <td>
                        <a href="edit.php?id=<?= $item['id'] ?>">
                            <?= $item['last_name'] ?>, <?= $item['first_name'] ?>
                        </a>
                    </td>

                    <td><?= $item['email'] ?></td>
                    <td>
                        <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">
                            Delete
                        </a>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>