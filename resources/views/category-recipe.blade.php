@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            Tambah data kategori
          </div>
          <form action="{{ route("store.category-recipe") }}" method="post" >
            @csrf
            <div class="form-group px-3">
              <label for="title">Resep</label>
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

            <button type="submit" class="btn btn-primary m-3">Submit</button>
          </form>
      </div>
  </div>
</div>
<h1>
  Data kategori resep
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Resep</th>
      <th scope="col">Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @isset($categoryRecipe)
      @foreach ($categoryRecipe as $item)
      <tr>
        <td>{{ $item->recipe->name }}</td>
        <td>{{ $item->category->category }}</td>
        <td>
          <form action="/category-recipe/{{$item->id}}" method="post" class="d-inline">
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
  {{ $categoryRecipe->links('pagination::bootstrap-4') }}
</div>
@endsection
