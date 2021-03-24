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
        <a href="{{ route('guru.home') }}">Home</a>
        <a href="{{ route('guru.data-nilai') }}">Data Nilai</a>
      </div>

      <div class="right">
        <a href="{{ route('logout') }}">logout</a>
      </div>
    </nav>
    <div class="content">
      <div class="right" style="width: 100%">
        <h2>Data Kelas Yang diajar</h2>
        <table>
          <tr>
            <th>No</th>
            <th>Kelas</th>
          </tr>
          @foreach($data_mengajar as $key => $mengajar)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $mengajar->kelas }}</td>
              <td>
                <a href="{{ route('view.guru.tambah-nilai', ['id' => $mengajar->id]) }}">Tambah Nilai</a>
              </td>
            </tr>
          @endforeach
        </table>

        <h2 style="margin-top: 1em;">Data Nilai</h2>
        <table>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Kelas</th>
            <th>Mapel</th>
            <th>UH</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>NA</th>
            <th>Opsi</th>
          </tr>
          @foreach($data_nilai as $key => $nilai)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $nilai->nis }}</td>
            <td>{{ $nilai->nama_siswa }}</td>
            <td>{{ $nilai->nip }}</td>
            <td>{{ $nilai->nama_guru }}</td>
            <td>{{ $nilai->nama_kelas }}</td>
            <td>{{ $nilai->nama_jurusan }}</td>
            <td>{{ $nilai->uh }}</td>
            <td>{{ $nilai->uts }}</td>
            <td>{{ $nilai->uas }}</td>
            <td>{{ $nilai->na }}</td>
            <td>
                <a href="{{ route('view.guru.edit-nilai', ['id' => $nilai->id]) }}">Edit</a>
                <a href="{{ route('guru.hapus-nilai', ['id' => $nilai->id]) }}">Hapus</a>
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