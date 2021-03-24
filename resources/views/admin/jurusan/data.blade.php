<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  
<div class="container">
    <header>
    <img src="{{asset('images/header.jpg')}}" alt="">
    </header>
    <nav>
      <div class="left">
        <a href="{{ route('admin.home') }}">Home</a>
        <a href="{{ route('admin.data-jurusan') }}">Data Jurusan</a>
        <a href="{{ route('admin.data-kelas') }}">Data Kelas</a>
        <a href="{{ route('admin.data-guru') }}">Data Guru</a>
        <a href="{{ route('admin.data-mapel') }}">Data Mapel</a>
        <a href="{{ route('admin.data-mengajar') }}">Data Mengajar</a>
        <a href="{{ route('admin.data-siswa') }}">Data Siswa</a>
      </div>

      <div class="right">
        <a href="{{ route('logout') }}">logout</a>
      </div>
    </nav>
    <div class="content">
      <div class="left">
      <h2>Tambah Data</h2>
      <div class="form">
        <form action="{{ route('admin.tambah-jurusan') }}" method="post">      
          @csrf
          <div class="form-group">
            <label for="">Nama Jurusan</label>
            <input type="text" name="nama">
          </div>

          <button type="submit">Tambah</button>
        </form>
      </div>
      </div>
      <div class="right">
        <h2>Data Jurusan</h2>
        <table>
          <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Opsi</th>
          </tr>
          @foreach($data_jurusan as $key => $jurusan)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $jurusan->nama }}</td>
              <td>
                <a href="{{ route('view.admin.edit-jurusan', ['id' => $jurusan->id]) }}">Edit</a>
                <a href="{{ route('admin.hapus-jurusan', ['id' => $jurusan->id]) }}">Hapus</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>

    <footer>
      Copyright &copy; 2020
    </footer>
  </div>
</body>
</html>