@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            Tambah data kategori
          </div>
          <form action="{{ route("store.category") }}" method="post" >
            @csrf
            <div class="form-group px-3">
                <label for="title">Kategori</label>
                <input type="text" name="category" id="title" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary m-3">Submit</button>
          </form>
      </div>
  </div>
</div>
<h1>
  Data kategori
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @isset($categories)
      @foreach ($categories as $item)
      <tr>
        <td>{{ $item->category }}</td>
        <td>
          <form action="/category/{{$item->id}}" method="post" class="d-inline">
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
  {{ $categories->links('pagination::bootstrap-4') }}
</div>
@endsection
