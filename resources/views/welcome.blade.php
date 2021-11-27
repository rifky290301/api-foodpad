@extends('layout')
@section('content')
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
@endsection
