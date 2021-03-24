<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Document</title>
</head>
<body>
  

  <div class="container">
    <header>
    <img src="{{asset('images/header.jpg')}}" alt="">
    </header>
    <nav>
      <div class="left">
        <a href="/">Home</a>
      </div>
    </nav>
    <div class="content">
      <div class="left">
      <h2>Login Admin</h2>

      <div class="form">
        <form action="/admin/login" method="post">
          @csrf
  
          <div class="form-group">      
            <label for="">Username</label>
            <input type="text" name="username">
          </div>
          <div class="form-group">      
            <label for="">Password</label>
            <input type="password" name="password">
          </div>
  
          <button type="submit">Login</button>
  
          </form>
  
          <div class="links">
            <a href="{{ route('view.admin.login') }}">Admin</a>
            <a href="{{ route('view.guru.login') }}">Guru</a>
            <a href="{{ route('view.siswa.login') }}">Siswa</a>        
          </div>
      </div>
      <div class="gallery">
        Galeri

        <img src="{{asset('images/g2.jpg')}}" alt="">
      </div>
      </div>
      <div class="right">
        <h2>Selamat Datang di Website Penilain SMK 1 Negeri Cibinong</h2>
      </div>
    </div>

    <footer>
      Copyright &copy; 2020
    </footer>
  </div>
  
</body>
</html>