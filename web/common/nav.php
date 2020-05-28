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
        <li><a href="../views/home.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="assignments.php">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../views/assignment.php">Assignment Links</a></li>
            <li><a href="../views/team1.php">Week 3 Team Activity</a></li>
            <li><a href="../views/shop.php">Week 3 Assignment</a></li>
            <li><a href="../views/gift.php">Week 4 Assignment</a></li>
          </ul>
        </li>
        <li><a href="../views/otters.php">Otters</a></li>
        <?php if(isset($_SESSION['loggedin'])){ ?>
          <li><a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a></li>
          <?php } else { ?>
          <li><a href='../accounts/index.php?action=login' title='Click to register or login'>My Account</a> </li>
          <?php }?>
        <li><a href="../views/otters.php">Otters</a></li>
      </ul>
    </div>
  </div>
</nav>