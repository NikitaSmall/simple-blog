<html>
  <head>
    <title>
      The shop
    </title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">The Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <?php if (isset($_SESSION[BaseController::$userSessionField])) { ?>
            <li>
              <div>
                Hello, <?php echo $_SESSION[BaseController::$userSessionField]->username; ?>
              </div>
            </li>
            <li class="nav-item">
              <form action="/users/logout" method="POST">
                <input type="submit" value="logout" class="btn btn-warning">
              </form>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="/users/register" class="btn btn-primary">Register</a>
            </li>
            <li class="nav-item">
              <a href="/users/login" class="btn btn-info">Login</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <div class="container">
