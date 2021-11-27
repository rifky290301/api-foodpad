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
                          Tambah resep
                        </div>
                        <form action="{{ route("store.recipe") }}" method="post" >
                          @csrf
                          <div class="form-group px-3">
                              <label for="title">Name</label>
                              <input type="text" name="name" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                              <label for="title">Thumnail</label>
                              <input type="text" name="thumbnail" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                            <label for="title">Bahan</label>
                            <textarea class="form-control" name="ingredients" id="" cols="30" rows="5"></textarea>
                          </div>
                          <div class="form-group px-3">
                            <label for="title">Langkah-langkah</label>
                            <textarea class="form-control" name="step" id="" cols="30" rows="5"></textarea>
                          </div>
                          <div class="form-group px-3">
                              <label for="title">Durasi</label>
                              <input type="number" name="duration" id="title" class="form-control"/>
                          </div>
                          <div class="form-group px-3">
                            <label for="title">level</label>
                            <div class="input-group ">
                              <select name="level" class="custom-select form-control" id="inputGroupSelect01">
                                <option selected disabled>Choose...</option>
                                <option value="Mudah">Mudah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Cukup rumit">Cukup rumit</option>
                                <option value="Rumit">Rumit</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group px-3">
                            <label for="title">kategori</label>
                            <div class="input-group ">
                              <select name="category" class="custom-select form-control" id="inputGroupSelect01">
                                <option selected disabled>Choose...</option>
                                <option value="Main Course">Main Course</option>
                                <option value="Appetizer">Appetizer</option>
                                <option value="Dessert">Dessert</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group px-3">
                            <label for="title">Penulis</label>
                            <div class="input-group ">
                              <select name="user_id" class="custom-select form-control" id="inputGroupSelect01">
                                <option selected disabled>Choose...</option>
                                @isset($users)
                                  @foreach ($users as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                @endisset
                              </select>
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
                <th scope="col">Nama</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Durasi</th>
                <th scope="col">Level</th>
                <th scope="col">Kategori</th>
              </tr>
            </thead>
            <tbody>
              @isset($recipes)
                @foreach ($recipes as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->thumbnail}}</td>
                  <td>{{ $item->duration}}</td>
                  <td>{{ $item->level}}</td>
                  <td>{{ $item->category}}</td>
                </tr>
                @endforeach
              @endisset
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $recipes->links('pagination::bootstrap-4') }}
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>