@extends('layout')
@section('content')
<h1>
  Data Report
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Reporter</th>
      <th scope="col">Resep</th>
      <th scope="col">Report</th>
    </tr>
  </thead>
  <tbody>
    @isset($reports)
      @foreach ($reports as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->user->email }}</td>
        <td>{{ $item->recipe->name }}</td>
        <td>{{ $item->report }}</td>
      </tr>
      @endforeach
    @endisset
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {{ $steps->links('pagination::bootstrap-4') }}
</div>
@endsection
