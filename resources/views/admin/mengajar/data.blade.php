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
        <form action="{{ route('admin.tambah-mengajar') }}" method="post">      
          @csrf

          <div class="form-group">
            <label for="">Guru</label>
            <select name="nip" id="">
              @foreach($data_guru as $key => $guru)
                <option value="{{ $guru->nip }}">{{ $guru->nip }} - {{ $guru->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Kelas</label>
            <select name="id_kelas" id="">
              @foreach($data_kelas as $key => $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->id }} - {{ $kelas->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Mapel</label>
            <select name="id_mapel" id="">
              @foreach($data_mapel as $key => $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->id }} - {{ $mapel->nama }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit">Tambah</button>
        </form>
      </div>
      </div>
      <div class="right">
        <h2>Data mengajar</h2>
        <table>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Guru</th>
            <th>Mapel</th>
            <td>Kelas</td>
            <th>Opsi</th>
          </tr>
          @foreach($data_mengajar as $key => $mengajar)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $mengajar->nip }}</td>
              <td>{{ $mengajar->guru }}</td>
              <td>{{ $mengajar->mapel }}</td>
              <td>{{ $mengajar->kelas }}</td>
              <td>
                <a href="{{ route('view.admin.edit-mengajar', ['id' => $mengajar->id]) }}">Edit</a>
                <a href="{{ route('admin.hapus-mengajar', ['id' => $mengajar->id]) }}">Hapus</a>
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