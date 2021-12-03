@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            Tambah resep
          </div>
          <form action="{{ route("store.recipe") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group px-3">
              <label for="title">Name</label>
              <input type="text" name="name" id="title" class="form-control"/>
            </div>
            {{-- <div class="form-group px-3">
              <label for="title">Thumbnail</label>
              <div class="custom-file">
                <input type="file" name="thumbnail" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div> --}}
            <div class="form-group px-3">
              <label for="title">Thumbnail</label>
              <input type="text" name="thumbnail" id="title" class="form-control"/>
            </div>
            <div class="form-group px-3">
              <label for="title">Description</label>
              <input type="text" name="description" id="title" class="form-control"/>
            </div>
            <div class="form-group px-3">
              <label for="title">Prepare</label>
              <input type="number" name="prepare" id="title" class="form-control"/>
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
                  <option value="Sulit">Sulit</option>
                </select>
              </div>
            </div>
            <div class="form-group px-3">
              <label for="title">Kategori</label>
              <div class="input-group ">
                <select name="category_id" class="custom-select form-control" id="inputGroupSelect01">
                  <option selected disabled>Choose...</option>
                  @isset($categories)
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                    @endforeach
                  @endisset
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
                    <option value="{{ $item->id }}">{{ $item->email }}</option>
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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @isset($recipes)
      @foreach ($recipes as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td style="width: 200px"><img src="{{ $item->thumbnail }}" class="img-thumbnail" alt="..."></td>
        {{-- <td style="width: 200px"><img src="{{ asset("storage/images/upload/thumbnail/$item->thumbnail") }}" class="img-thumbnail" alt="..."></td> --}}
        {{-- <td style="width: 200px"><img src="{{ asset("upload/thumbnail/$item->thumbnail") }}" class="img-thumbnail" alt="..."></td> --}}
        <td>{{ $item->duration}}</td>
        <td>{{ $item->level}}</td>
        <td>
          <form action="/recipe/{{$item->id}}" method="post" class="d-inline">
            @method('delete') 
            @csrf
              <button class="btn btn-danger btn-sm mr-3" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    @endisset
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {{ $recipes->links('pagination::bootstrap-4') }}
</div>
@endsection
