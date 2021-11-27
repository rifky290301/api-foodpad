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
            </ul>
          </div>
      </div>
        </nav>
        <div class="container my-5">
          <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          Tambah data user
                        </div>
                        <form action="{{ route("store.user") }}" method="post" enctype="multipart/form-data" >
                          @csrf
                          <div class="form-group px-3">
                              <label for="title">Name</label>
                              <input type="text" name="name" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                              <label for="title">Email</label>
                              <input type="email" name="email" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                              <label for="title">Password</label>
                              <input type="password" name="password" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                              <label for="title">Profile</label>
                              <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary m-3">Submit</button>
                        </form>
                    </div>
                </div>
          </div>
          <h1>
            Data resep
          </h1>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Profile</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @isset($users)
                @foreach ($users as $item)
                <tr>
                  <td style="width: 200px"><img src="{{ asset("upload/profile/$item->photo") }}" class="img-thumbnail" alt="..."></td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email}}</td>
                </tr>
                @endforeach
              @endisset
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>