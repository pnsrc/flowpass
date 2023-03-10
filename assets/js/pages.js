$('.card-list__page-link').on('click', function (e) {
  e.preventDefault();

  let page_number = $(this).data('page-number');
  // Показ пропусков по клику на число страницы
  $.ajax({
    // Отправка data-атрибута ссылки
    type: "GET",
    contentType: "application/json; charset=utf-8",
    url: '/api/pages?' + page_number,
    data: {'page-number': page_number},
    success: function (data) {
      let html;
      for (let pass in data) {
        html += `<tr>
            <td>${data[pass]['id']}</td>
            <td>${data[pass]['fio']}</td>
            <td>${data[pass]['status'] == 'valid' ? 'Действующий' : 'Просрочен'}</td>
            <td>${data[pass]['date_activation']}</td>
            <td>${data[pass]['date_expiration']}</td>
            <td><a href="/pass/view?id=${data[pass]['id']}" class="card-list__link">Перейти</a></td>
        </tr>`
      }
      $('.card-list__table tbody').html(html);
    }
  });
});

