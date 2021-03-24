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
      <h2>Edit Data</h2>
      <div class="form">
        <form action="{{ route('admin.edit-kelas') }}" method="post">      
          @csrf
          <input type="hidden" name="id" value="{{ $data_kelas->id }}">
          <div class="form-group">
            <label for="">Nama Kelas</label>
            <input type="text" name="nama" value="{{$data_kelas->nama}}">
          </div>

          <div class="form-group">
            <label for="">Jurusan</label>
            <select name="id_jurusan" id="">
              @foreach($data_jurusan as $key => $jurusan)
              <option value="{{ $jurusan->id }}" @if($data_kelas->id_jurusan === $jurusan->id) selected @endif>{{$jurusan->nama}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit">Edit</button>
        </form>
      </div>
      </div>
      <div class="right">
        <h4>Silahkan Edit Data Seperlunya</h4>
        <a href="{{ route('admin.data-kelas') }}">Kembali</a>
      </div>
    </div>

    <footer>
      Copyright &copy; 2020
    </footer>
  </div>
</body>
</html>