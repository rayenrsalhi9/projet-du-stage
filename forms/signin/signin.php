<?php
  require_once "../../includes/config_session.inc.php";
  require_once "../../includes/login_mvc/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign_in</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- navbar style -->
    <link rel="stylesheet" href="../../navbar.css">
    <!-- signin style -->
    <link rel="stylesheet" href="../forms.css">
    <!-- main style -->
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    <!-- start of navbar section -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.html">remind<b class="logo">ME</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="../../index.html">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../../about/about.html">About us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="signin.php" aria-current="page">Sign in</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    More links
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">My portfolio</a></li>
                    <li><a class="dropdown-item" href="#">About application developer</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Contact application developer</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">by Salhi Rayen</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control" list="navigationList" placeholder="Type to search...">
                <datalist id="navigationList">
                <option value="Home page">
                <option value="About this application">
                <option value="Sign in">
                <option value="Create an account">
                <option value="About the developer">
                </datalist>
                <button class="btn btn-outline-warning ms-2" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
        
    <!-- end of navbar section -->

    <!-- start of signin -->
    <div class="container">
        <form class="form-html" action="../../includes/signinhandler.inc.php" method="POST">
          <div class="mb-3">
            <h1>Sign in</h1>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="email">
            <div id="emailHelp" class="form-text">Your email will <b>never</b> be shared with anyone</div>
          </div>
          <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd">
          </div>
          <p class="form-text">First time here?<a href="../signup/signup.php"> Create an account</a></p>
          <button type="submit" class="btn btn-dark submit-button">Sign in</button>
          <div class="mb-3 alert-msgs">
            <?php
              check_login_errors();
            ?>
          </div>
        </form>
      </div>
      
    <!-- end of signin -->
</body>
</html>