<!DOCTYPE html>
<html>

<head>
  <title>flowpass//</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <main class="main">
      <div class="main__container container">
        <div class="main__row">
          <div class="main__text">
            <h1 class="lh-1 mb-3">Регистрация</h1>
            <p>Первая настройка системы перед началом использования.
              <br>
              <b>Запомните,</b> сменить пароль вы не сможете!
            </p>
          </div>
          <div class="main__form col-md-10 col-lg-5">
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
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>