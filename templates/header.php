<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title><?php if($_GET['id']) echo $ENTRY['header']; else echo "Фотоальбом"; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">
    
    <link rel="stylesheet" href="bootstrap/css/lightbox.css" type="text/css" media="screen" />

    <!--    Google fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header brand_name">
          <a class="navbar-brand" href="?">Фотоальбом</a>
            <ul class="nav navbar-nav navbar-right">
                <?php if(IS_ADMIN): ?>
                <li><a href="?act=admin"><b>Добавление нового события</b></a></li>
                <li><a href="?act=logout" class="exit_admin">Выйти из Админки</a></li>
                <?php else: ?>
                    <li><a class="authorization" href="?act=login">Авторизироваться</a></li>
                <?php endif; ?>
            </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">