            // Open promt alert for save usertoken
            function saveToken() {
                var token = prompt("Пожалуйста, введите ваш ключ", "");
                if (token == null) {
                    localStorage.setItem("token", token);
                } else {
                    localStorage.setItem("token", token);
                    console.log('Token was found :' + token);
                    location.reload();
                }
            }

            var usertoken = localStorage.getItem("token");

            if (usertoken == null) {
                alert('token not find');
                saveToken();
                // stop load
            }

            // Проверка на наличие токена пользователя в GET запросе
            if (usertoken) {
                // Передаем токен пользователя в POST запросе
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/api/get.pass', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('token=' + usertoken);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Получаем ответ от сервера в формате JSON
                        var response = JSON.parse(xhr.responseText);
                        // Проверка на наличие ошибки
                        if (response.error) {
                            // Выводим сообщение об ошибке
                            alert(response.error);
                            // Очищаем токен пользователя
                            localStorage.removeItem("token");
                        } else {
                            // Выводим информацию о пропуске на страницу
                            document.getElementById('fio').innerHTML = response.fio;

                            // Меняем значение статуса пропуска если valid пишем "Действителен" если нет "Не действителен"
                            if (response.status == "valid") {
                                document.getElementById('status').innerHTML = 'Статус: Действителен';

                            } else {
                                document.getElementById('status').innerHTML = 'Статус: Не действителен';
                            }
                            // Выводим QR код на страницу
                            new QRCode(document.getElementById("qr"), response.token);
                            // Выводим дату рождения на страницу
                            document.getElementById('bday').innerHTML = 'Дата рождения: ' + response.bday;

                        }
                    }
                }
            }

            // Кешируем страницу в браузере случае отсутствия интернета
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('./sw.js').then(function(registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }).catch(function(err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            }
