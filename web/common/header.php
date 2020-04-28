<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Special+Elite&display=swap" rel="stylesheet">
    <title>My Website</title>
</head>
<body>
    <header role="banner">
    <div id="logoarea">
<img id="logo-main" src="../images/CodeOtterLogo.png" alt="Code Otter Logo">
</div>

<nav id="navbar-primary" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Assignment 1</a></li>
            <li><a href="#">Assignment 2</a></li>
            <li><a href="#">Assignment 3</a></li>
          </ul>
        </li>
        <li><a href="#">Other</a></li>
      </ul>
    </div>
  </div>
</nav>
    <nav>
        
        <?php include 'nav.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'].'nav.php'; ?>
    </nav>
    </header>