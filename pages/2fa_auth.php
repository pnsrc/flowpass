<!DOCTYPE html>
<html>

<head>
  <title>flowpass//</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <main class="main">
      <div class="main__container container">
          <div class="main__row">
            <div class="main__text">
              <h1 class="lh-1 mb-3 main__title">flowpass//</h1>
              <p>В вашем аккаунте подключена двухэтапная авторизация, пожалуйста, введите пожалуйста.</p>
            </div>
            <div class="main__form col-md-10 col-lg-5">
              <form method="POST" action="/auth/2fa" class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="2fa" class="form-control" id="floatingPassword"
                    placeholder="2fa">
                  <label for="floatingPassword">Код из приложения</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="do_2fa" type="submit">Вход</button>
              </form>
            </div>
          </div>
      </div>
    </main>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
    async></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
</body>

</html>