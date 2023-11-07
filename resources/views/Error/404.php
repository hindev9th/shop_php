<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link rel="stylesheet" href="resources/css/pages/page-misc.css">
    <?php require 'resources/views/layouts/style.php'?>
</head>
<body>

<!-- Error -->
<div class="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Page Not Found :(</h2>
        <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
        <a href="/" class="btn btn-primary">Back to home</a>
        <div class="mt-3">
            <img
                src="resources/images/illustrations/page-misc-error-light.png"
                alt="page-misc-error-light"
                width="500"
                class="img-fluid"
                data-app-dark-img="illustrations/page-misc-error-dark.png"
                data-app-light-img="illustrations/page-misc-error-light.png"
            />
        </div>
    </div>
</div>
<!-- /Error -->
    <?php require 'resources/views/layouts/script.php'?>
</body>
</html>