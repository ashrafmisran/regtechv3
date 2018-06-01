<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CGD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shariah
        </a>
        <div class="dropdown-menu">
          <a href="?p=shariah-daily" class="dropdown-item">Daily</a>
          <a href="#" class="dropdown-item">Monthly</a>
          <a href="#" class="dropdown-item">Quarterly</a>
          <a href="#" class="dropdown-item">Annually</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ML/CFT
        </a>
        <div class="dropdown-menu">
          <a href="?p=order-48" class="dropdown-item">Order 48</a>
          <hr>
          <a href="?p=amla-daily" class="dropdown-item">Daily</a>
          <a href="#" class="dropdown-item">Monthly</a>
          <a href="#" class="dropdown-item">Quarterly</a>
          <a href="#" class="dropdown-item">Annually</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Holiday</a>
          <a class="dropdown-item" href="#">Shariah Compliant Securities List</a>
        </div>
      </li>
      <?php if(isset($_SESSION['user'])){ ?>
        <li class="nav-item">
          <a class="nav-link text-danger" href="action-logout.php">Logout</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<hr class="mt-0">