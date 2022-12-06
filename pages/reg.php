<!DOCTYPE html>
  <html>
  <head>
    <title>flowpass//</title>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">flowpass//</a>
      </div>
    </nav>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 mb-3">Регистрация</h1>
          <p class="col-lg-10 fs-4">Первая настройка системы, перед началам использования. <b>Запомните</b> Сменить пароль вы не сможете!</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form method="POST" action="/reg" class="p-4 p-md-5 border rounded-3 bg-light">
            <div class="form-floating mb-3">
              <input type="username" name="username" class="form-control" id="floatingInput" placeholder="Password">
              <label for="floatingInput">Ваше имя</label>
            </div>
            <div class="form-floating mb-3">
              <input type="lastname" name="lastname" class="form-control" id="floatingInput" placeholder="Password">
              <label for="floatingInput">Ваша фамилия</label>
            </div>
            <div class="form-floating mb-3">
              <input type="middlename" name="middlename" class="form-control" id="floatingInput" placeholder="Password">
              <label for="floatingInput">Ваше отчество</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Ваша почта</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Пароль</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password_2" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Пароль еще раз</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="key" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Ключ доступа</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name='do_signup' type="submit">Регистрация</button>
            <hr class="my-4">
            <p>Ключ доступа выдается только один на экземпляр</p>
          </form>
        </div>
      </div>
    </div>
  </body>
  <style>
    .navbar>.container,
    .navbar>.container-fluid,
    .navbar>.container-lg,
    .navbar>.container-md,
    .navbar>.container-sm,
    .navbar>.container-xl,
    .navbar>.container-xxl {
      display: flex;
      flex-wrap: inherit;
      align-items: center;
      justify-content: center;
    }
  </style>

  </html>