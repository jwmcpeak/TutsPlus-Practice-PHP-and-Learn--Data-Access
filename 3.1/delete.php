<?php require('./app/delete.code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Person</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php if ($model == null) : ?>
        Not found
    <?php else : $model = encode($model) ?>
        <form method="POST">
            <input type="hidden" name="person-id" value="<?= $model['id'] ?>" />
            
            Are you sure you want to delete: <?= $model['last_name'] ?>, <?= $model['first_name'] ?>?

            
            <button type="submit" name="delete" value="delete" class="btn btn-danger">Delete</button>
            <button type="submit" name="cancel" value="cancel" class="btn btn-default">Cancel</button>

        </form>
    <?php endif; ?>
    </div>
</body>
</html>