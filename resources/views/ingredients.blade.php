@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            Tambah data bahan
          </div>
          <form action="{{ route("store.ingredients") }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group px-3">
                <label for="title">Name</label>
                <input type="text" name="name" id="title" class="form-control"/>
            </div>
            <div class="form-group px-3">
                <label for="title">Value</label>
                <input type="text" name="value" id="title" class="form-control"/>
            </div>
            <div class="form-group px-3">
              <label for="title">Penulis</label>
              <div class="input-group ">
                <select name="recipe_id" class="custom-select form-control" id="inputGroupSelect01">
                  <option selected disabled>Choose...</option>
                  @isset($recipes)
                    @foreach ($recipes as $item)
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
  Data bahan
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Value</th>
      <th scope="col">Resep</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @isset($ingredients)
      @foreach ($ingredients as $item)
      <tr>
        <td>{{ $item->recipe->name }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->value}}</td>
        <td>
          <form action="/ingredients/{{$item->id}}" method="post" class="d-inline">
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
  {{ $ingredients->links('pagination::bootstrap-4') }}
</div>
@endsection
