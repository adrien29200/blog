<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Blog/public/css/style.css" type="text/css" />
    <script src="https://cdn.tiny.cloud/1/cxhqwfb8olx1tl93j6wib40qlgv4l4e75b7yiwi9ahj70iz3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: ''}); 
    </script>
    <title><?= $title ?></title>
</head>
<body>
    <div id="content">
        <?= $content ?>
    </div>
</body>
</html>