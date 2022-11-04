<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">
        <title>flowpass</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/all_pass.css">

    </head>
    <body>
<nav>
        <div class="first_podium center">
            <p style="color: white;font-size: 122%;" class="text-center logo"><a href="/" style="color: white;text-decoration: none;">flowpass//</a></p>
        </div>
        <div class="second_podium">
                <div class="links">
                    <a class="nav-a active" href="/make">Создать пропуск</a>
                    <a class="nav-a" href="/notifications">Уведомления</a>
                    <a class="nav-a" href="/settings">Настройки</a>
                    <a class="nav-a" href="/portal/bye">Выход</a>
                </div>
        </div>

    </nav>
        <h1 style="    margin-left: 4%;
        font-family: 'Helvetica Neue', sans-serif;
">
            <b>Создать пропуск</b>
        </h1>
        <div style="padding: 2%;     align-items: flex-start;
        " class="container">
            <!--Inputs-->
        <form action="/make" enctype="multipart/form-data" method="post">
        <div class="inputs">
                <div class="input">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" placeholder="Имя">
                </div>
                <div class="input">
                    <label for="surname">Фамилия</label>
                    <input type="text" name="surname" id="surname" placeholder="Фамилия">
                </div>
                <div class="input">
                    <label for="patronymic">Отчество</label>
                    <input type="text" name="patronymic" id="patronymic" placeholder="Отчество">
                </div>
                <div class="input">
                    <label for="date">Дата рождения</label>
                    <input type="date" name="bday" id="bday" placeholder="Дата">
                </div>
                <div class="input">
                    <label for="number">Номер телефона</label>
                    <input type="text" name="number" id="number" placeholder="Номер телефона">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input">
                    <label for="address">Серия и номер паспорта</label>
                    <input type="text" name="passport" id="address" placeholder="Серия и номер паспорта">
                </div>
                <div class="input">
                    <label for="photo">Фото для пропуска можно добавить в режиме редактирования пропуска</label>
                </div>
                <button class="btn" type="submit" name='add_user'>Создать пропуск</button>

        </div>
        </form>
    </body>
    <style>
input {
    background-color: #f2f2f2;
    border: none;
    padding: 3%;
    border-bottom: 2px solid crimson;
}
.input {
    padding: 2%;
}
.btn {
    background-color: crimson;
    color: white;
    border: none;
    padding: 2%;
    border-radius: 5px;
    font-size: 100%;
    font-family: 'Helvetica Neue', sans-serif;
    cursor: pointer;
    transition: 0.3s;
}
input:focus {
    outline: none;
}
.btn:hover {
    background-color: #f2f2f2;
    color: crimson;
    border: 2px solid crimson;
}
    </style>

</html>