@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            Tambah data user
          </div>
          <form action="{{ route("store.user") }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group px-3">
                <label for="title">First name</label>
                <input type="text" name="first_name" id="title" class="form-control"/>
            </div>
            <div class="form-group px-3">
                <label for="title">Last name</label>
                <input type="text" name="last_name" id="title" class="form-control"/>
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
                <label for="title">Photo</label>
                <input type="text" name="photo" id="title" class="form-control"/>
            </div>
            {{-- <div class="form-group px-3">
                <label for="title">Profile</label>
                <div class="custom-file">
                  <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div> --}}
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
      <th scope="col">Id</th>
      <th scope="col">Profile</th>
      <th scope="col">First nama</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @isset($users)
      @foreach ($users as $item)
      <tr>
        {{-- <td style="width: 200px"><img src="{{ asset("upload/profile/$item->photo") }}" class="img-thumbnail" alt="..."></td> --}}
        <td>{{ $item->id }}</td>
        <td style="width: 200px"><img src={{ $item->photo }} class="img-thumbnail" alt="..."></td>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->email}}</td>
        <td>
          <form action="/user/{{$item->id}}" method="post" class="d-inline">
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
  {{ $users->links('pagination::bootstrap-4') }}
</div>
@endsection
