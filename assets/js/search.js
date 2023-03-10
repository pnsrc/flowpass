$(function(){
    
//Живой поиск
$('#search-input').bind("change keyup input click", function() {
    var search = $(this).val();
    if(this.value.length >= 1){
        $.ajax({
            type: 'post',
            url: "/api/search", //Путь к обработчику
            data: {'search': search},
            response: 'text',
            success: function(data){
                // console.log(search)
                $(".search__result").html(data).fadeIn(); //Выводим полученые данные в списке
           }
       })
    } else {
        $('.search__result').html('');
    }
})
    
$(".search__result").hover(function(){
    $(".who").blur(); //Убираем фокус с input
})
    
//При выборе результата поиска, прячем список и заносим выбранный результат в input
$(".search__result").on("click", "a", function(){
    s_user = $(this).text();
    //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
    $(".search__result").fadeOut();
})
})