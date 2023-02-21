  // Загрузка файла
  $(document).ready(function() {
    $('#upload').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: '/api/1c/import',
        type: 'POST',
        data: formData,
        success: function(data) {
          alert(data);
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  });