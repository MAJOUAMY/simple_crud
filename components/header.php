<?php
session_start();
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RandPost</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

          <a class="nav-link active" aria-current="page" href="checksigned.php">create</a>


        </li>


        <li class="nav-item">
          <?php if (isset($_SESSION["user_id"])) : ?>
            <a class="nav-link" href="logout.php">logout</a>
          <?php else : ?>
            <a class="nav-link" href="signup.php">sign up</a>
        </li>
        <li>
          <a class="nav-link" href="login.php">Login</a>
        </li>

      <?php endif; ?>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="show.php?v=1">top</a></li>
          <li><a class="dropdown-item" href="show.php?v=2">new</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="show.php?v=3">random</a></li>
        </ul>
      </li>

      </ul>
      <form class="d-flex" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search_prompt" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>