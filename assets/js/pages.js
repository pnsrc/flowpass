$(document).on('click', '.card-list__page-link', function(e){
    e.preventDefault();
    
    var page_number = $(this).data('page-number');
    var current_query;
    
    if( $(this).data('query') ) {
        current_query = '?' + $(this).data('query');
    }
    else {
        current_query = '';
    }

    
    $.get('/api/pages' + current_query, {'page-number' : page_number}, function(data){
        $('#all-products').html(data);
    })
})

$(document).on('submit', '#filter-form', function(e){
    e.preventDefault();
    
    var form = $(this);
    
    $.get('/api/pages', $(form).serialize(), function(data){
        $('#all-products').html(data);
    })
})

