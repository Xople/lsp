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
        <h2>Edit Nilai</h2>
        <div class="form">
          <form action="{{ route('guru.edit-nilai') }}" method="post">
          @csrf
        
          <input type="hidden" name="id" value="{{ $data_nilai->id }}">
          <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" value="{{ $data_nilai->nis }} - {{ $data_nilai->nama_siswa }}" readonly>
          </div>
          <div class="form-group">
            <label for="">Nilai UH</label>
            <input type="number" name="uh" id="" value="{{ $data_nilai->uh }}">
          </div>
          <div class="form-group">
            <label for="">Nilai UTS</label>
            <input type="number" name="uts" id="" value="{{ $data_nilai->uts }}">
          </div>
          <div class="form-group">
            <label for="">Nilai UAS</label>
            <input type="number" name="uas" id="" value="{{ $data_nilai->uas }}">
          </div>

          <button type="submit">Edit</button>
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