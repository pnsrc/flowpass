document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form');
  form.addEventListener('submit', formSend);

  async function formSend(e) {
    e.preventDefault();
    let error = formValidate(form);
    let formData = new FormData(form);
    formData.append('image', fileButton.files[0]);

    if (error == 0) {
      if (form.classList.contains('card-new__form')) {
        let response = await fetch('../../system/make.php', {
          method: 'POST',
          body: formData
        });
        if (response.ok) {
          let result = await response.json();
          console.log(result);
          if (result.message !== "Пользователь с таким email уже существует!") {
            alert(result.message);
            chosenImg.setAttribute('src', '../assets/img/no-img_bg-user.svg');
            fileName.textContent = 'Фото не загружено';
            form.reset();
            window.location.href = '/';
          } else {
            alert(result.message);
            const input = document.querySelector('[type=email]');
            input.parentElement.classList.add('_error');
            input.classList.add('_error');
          }
        } else { alert("Ошибка выполнения fetch. Статус: " + response.statusText) }
      }
      if (form.classList.contains('card-red__form')) {
        let response = await fetch('../../system/edit.php', {
          method: 'POST',
          body: formData
        });
        if (response.ok) {
          let result = await response.json();
          if (result.message !== 'Данные не были изменены. Измените какое-либо поле!') {
            alert(result.message);
            chosenImg.setAttribute('src', '../assets/img/no-img_bg-user.svg');
            fileName.textContent = 'Фото не загружено';
            form.reset();
            window.location.href = '/';
          } else {
            alert(result.message);
          }
        } else { alert("Ошибка выполнения fetch. Статус: " + response.statusText) }
      }
    }
  }

  function formValidate(form) {
    let error = 0;
    let formReq = form.querySelectorAll('._required');
    let spanErrors = form.querySelectorAll('.input__error');

    for (let i = 0; i < formReq.length && spanErrors.length; i++) {
      const input = formReq[i];
      const span = spanErrors[i];
      input.parentElement.classList.remove('_error');
      input.classList.remove('_error');

      if (input.getAttribute('name') == 'email' && input.value !== '') {
        if (!emailTest(input)) {
          span.innerHTML = 'Заполните email корректно';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      } else if ((input.getAttribute('name') == 'first_name' ||
        input.getAttribute('name') == 'second_name' ||
        input.getAttribute('name') == 'large_name') && input.value !== '') {
        if (!nameTest(input)) {
          span.innerHTML = 'Заполните поле с большой буквы';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      } else if (input.getAttribute('name') == 'tel' && input.value !== '') {
        if (!telTest(input)) {
          span.innerHTML = 'Заполните номер корректно';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      } else if (input.getAttribute('name') == 'date' && input.value !== '') {
        if (!dateTest(input)) {
          span.innerHTML = 'Выберите дату корректно';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      } else if (input.getAttribute('name') == 'passport' && input.value !== '') {
        if (!passportTest(input)) {
          span.innerHTML = 'Заполните данные корректно';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      } else if (input.getAttribute('type') == 'file' && !input.classList.contains('card-red__form-input') && !input.files[0]) {
        span.innerHTML = 'Выберите файл';
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
        error++;
      } else {
        if (input.getAttribute('type') !== 'file') {
          span.innerHTML = 'Заполните это поле';
          input.parentElement.classList.add('_error');
          input.classList.add('_error');
          error++;
        }
      }
    }
    return error;
  }
  // --------------РЕГУЛЯРКА EMAIL
  function emailTest(input) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
  }
  // --------------РЕГУЛЯРКА НОМЕРА ТЕЛЕФОНА
  function telTest(input) {
    return /(\+7|8)[\s(]*\d{3}[)\s]*\d{3}[\s-]?\d{2}[\s-]?\d{2}/.test(input.value);
  }
  // --------------РЕГУЛЯРКА ФИО
  function nameTest(input) {
    return /^[А-Я][а-я]{1,19}/.test(input.value);
  }
  // --------------РЕГУЛЯРКА ДАТЫ РОЖДЕНИЯ
  function dateTest(input) {
    // ПРИМЕР: 2020-12-20, через тире из-за значения value инпута date
    return /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(input.value);
  }
  // --------------РЕГУЛЯРКА ПАСПОРТА
  function passportTest(input) {
    return /[0-9]{4}[\s][0-9]{6}/.test(input.value);
  }
  // --------------ПРОВЕРКА ФАЙЛА
  function fileTest(img) {
    if (!['image/jpeg', 'image/png'].includes(img.type)) {
      alert('Разрешены только изображения в формате .jpeg, .png, .jpg.');
      fileButton.value = '';
      return;
    }
    if (img.size > 2 * 1024 * 1024) {
      alert('Файл должнен быть менее 2 Мб.');
      return;
    }
    const reader = new FileReader();
    reader.readAsDataURL(img);
    reader.onload = () => chosenImg.setAttribute('src', reader.result);
    reader.onerror = () => alert('Ошибка получения изображения');
    fileName.textContent = fileButton.files[0].name;
  }
  // --------------ПРЕДПРОСМОТР ФОТО
  const fileButton = document.getElementById('form-input_file');
  const chosenImg = document.getElementById('chosen_image');
  const fileName = document.getElementById('file_name');

  fileButton.onchange = () => {
    fileTest(fileButton.files[0]);
  }
});
