<?php require('./app/add.code.php'); ?>
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
        <form method="POST">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" 
                    id="first-name" 
                    name="first-name" 
                    class="form-control">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" 
                    id="last-name" 
                    name="last-name" 
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" 
                    id="email" 
                    name="email" 
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>