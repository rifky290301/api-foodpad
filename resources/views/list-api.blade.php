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
        <a href="{{ $baseURL }}/trending" target="_blank">
          {{ $baseURL }}/trending
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>ambil data resep yang sedang trending</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recommendation" target="_blank">
          {{ $baseURL }}/recommendation
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>ambil data resep yang direkomendasikan</td>
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
        <a href="{{ $baseURL }}/recipe/{id}" target="_blank">
          {{ $baseURL }}/recipe/{id}
        </a>
      </td>
      <td>{id resep}</td>
      <td>GET</td>
      <td>lihat detail data resep</td>
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
        <a href="{{ $baseURL }}/user" target="_blank">
          {{ $baseURL }}/user
        </a>
      </td>
      <td></td>
      <td>PUT</td>
      <td>edit data user</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/category" target="_blank">
          {{ $baseURL }}/category
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>liat data kategori</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/category" target="_blank">
          {{ $baseURL }}/category
        </a>
      </td>
      <td></td>
      <td>PUT</td>
      <td>edit data kategori</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/category/{id}" target="_blank">
          {{ $baseURL }}/category/{id}
        </a>
      </td>
      <td>{id kategori}</td>
      <td>DELETE</td>
      <td>delete data kategori</td>
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
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe/thumbnail/{image}" target="_blank">
          {{ $baseURL }}/recipe/thumbnail/{image}
        </a>
      </td>
      <td>{nama gambar}</td>
      <td>GET</td>
      <td>ambil thumbnail resep</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/favorite/{id}" target="_blank">
          {{ $baseURL }}/favorite/{id user}
        </a>
      </td>
      <td>{id user}</td>
      <td>GET</td>
      <td>ambil data resep berdasarkan id user yang mengambil</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/favorite/{id}" target="_blank">
          {{ $baseURL }}/favorite/{id favorite}
        </a>
      </td>
      <td>{id user}</td>
      <td>DELETE</td>
      <td>hapus data favorite berdasarkan id favorite</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/favorite" target="_blank">
          {{ $baseURL }}/favorite
        </a>
      </td>
      <td>[user_id, favorite_id]</td>
      <td>POST</td>
      <td>tambah data favorite</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe/category/{category}" target="_blank">
          {{ $baseURL }}/recipe/category/{category}
        </a>
      </td>
      <td>[id]</td>
      <td>get</td>
      <td>Resep berdasarkan id kategori</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/search/{name}" target="_blank">
          {{ $baseURL }}/search/{name}
        </a>
      </td>
      <td>[nama resep]</td>
      <td>get</td>
      <td>Pencarian resep berdasarkan nama resep</td>
    </tr>
    <hr>
    <tr>
      <td>
        <p>Ini aku sederhanakan biar ga terlalu berat loadingnya</p>
      </td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/recipe2" target="_blank">
          {{ $baseURL }}/recipe2
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>ambil data resep sederhana</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/favorite2/{id}" target="_blank">
          {{ $baseURL }}/favorite2/{id user}
        </a>
      </td>
      <td>{id user}</td>
      <td>GET</td>
      <td>ambil data resep berdasarkan id user yang mengambil</td>
    </tr>
    <tr>
      <td>
        <a href="{{ $baseURL }}/category2" target="_blank">
          {{ $baseURL }}/category2
        </a>
      </td>
      <td></td>
      <td>GET</td>
      <td>liat data kategori</td>
    </tr>
  </tbody>
</table>
@endsection
