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
        <h2>Tambah Nilai</h2>
        <div class="form">
          <form action="{{ route('guru.tambah-nilai') }}" method="post">
          @csrf
        
          <div class="form-group">
            <label for="">Nama Siswa</label>
            <select name="nis" id="">
              @foreach($data_siswa as $key => $siswa)
                <option value="{{ $siswa->nis }}">{{ $siswa->nis }} - {{ $siswa->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Mapel</label>
            <select name="id_mengajar" id="">
              @foreach($data_mengajar as $key => $mengajar)
                <option value="{{ $mengajar->id }}">{{ $mengajar->mapel }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Nilai UH</label>
            <input type="number" name="uh" id="">
          </div>
          <div class="form-group">
            <label for="">Nilai UTS</label>
            <input type="number" name="uts" id="">
          </div>
          <div class="form-group">
            <label for="">Nilai UAS</label>
            <input type="number" name="uas" id="">
          </div>

          <button type="submit">Tambah</button>
          <a href="{{ route('guru.data-nilai') }}">Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <footer>
      Copyright &copy; 2020
    </footer>
  </div>
</body>
</html>