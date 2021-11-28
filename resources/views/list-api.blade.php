@extends('layout')
@section('content')
<h1>
  List api
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Api endpoint</th>
      <th scope="col">Parameter/Body</th>
      <th scope="col">Method</th>
      <th scope="col">Fungsi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <a href="{{ $baseURL }}/login" target="_blank">
          {{ $baseURL }}/login
        </a>
      </td>
      <td>[email, password]</td>
      <td>POST</td>
      <td>login</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/register" target="_blank">
          {{ $baseURL }}/register
        </a>
      </td>
      <td>[name, email, password]</td>
      <td>POST</td>
      <td>register</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/logout" target="_blank">
          {{ $baseURL }}/logout
        </a>
      </td>
      <td>[token]</td>
      <td>POST</td>
      <td>logout</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe" target="_blank">
          {{ $baseURL }}/recipe
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>ambil data resep</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe" target="_blank">
          {{ $baseURL }}/recipe
        </a>
      </td>
      <td>[name,
        ingredients,
        description,
        prepare,
        duration,
        level]</td>
      <td>POST</td>
      <td>create data resep</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe/{id}" target="_blank">
          {{ $baseURL }}/recipe/{id}
        </a>
      </td>
      <td>{id resep};[name,
        ingredients,
        description,
        prepare,
        duration,
        level]</td>
      <td>PUT</td>
      <td>update data resep</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe/{id}" target="_blank">
          {{ $baseURL }}/recipe/{id}
        </a>
      </td>
      <td>{id resep}</td>
      <td>DELETE</td>
      <td>delete data resep</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/rating" target="_blank">
          {{ $baseURL }}/rating
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>ambil data rating</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/rating" target="_blank">
          {{ $baseURL }}/rating
        </a>
      </td>
      <td>[recipe_id,
        review,
        rating,
        user_id]</td>
      <td>POST</td>
      <td>create data rating</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/user" target="_blank">
          {{ $baseURL }}/user
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>liat user</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/user/photo-profile/{image}" target="_blank">
          {{ $baseURL }}/user/photo-profile/{image}
        </a>
      </td>
      <td>{nama gambar}</td>
      <td>GET</td>
      <td>ambil foto profile</td>
    </tr>
  </tbody>
</table>
@endsection
