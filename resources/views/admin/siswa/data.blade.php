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
        <form action="{{ route('admin.tambah-siswa') }}" method="post">      
          @csrf
          <div class="form-group">
            <label for="">NIS</label>
            <input type="text" name="nis">
          </div>

          <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="nama">
          </div>

          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jk" id="">
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat"></textarea>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password">
          </div>

          <div class="form-group">
            <label for="">Kelas</label>
            <select name="id_kelas" id="">
              @foreach($data_kelas as $key => $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->id }} - {{ $kelas->nama }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit">Tambah</button>
        </form>
      </div>
      </div>
      <div class="right">
        <h2>Data siswa</h2>
        <table>
          <tr>
            <th>No</th>
            <th>Nama siswa</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <td>Kelas</td>
            <td>Jurusan</td>
            <th>Opsi</th>
          </tr>
          @foreach($data_siswa as $key => $siswa)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $siswa->nama_siswa }}</td>
              <td>{{ $siswa->alamat }}</td>
              <td>@if($siswa->jk === "L") Laki Laki @else Perempuan @endif </td>
              <td>{{ $siswa->kelas }}</td>
              <td>{{ $siswa->jurusan }}</td>
              <td>
                <a href="{{ route('view.admin.edit-siswa', ['nis' => $siswa->nis]) }}">Edit</a>
                <a href="{{ route('admin.hapus-siswa', ['nis' => $siswa->nis]) }}">Hapus</a>
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