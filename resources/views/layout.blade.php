<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/">Resep</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/user">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ingredients">Ingredients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/step">Step</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/rating">Rating</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/category">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/category-recipe">Category Recipe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/report">Report</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/list-api">List api</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <div class="container my-5">
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>