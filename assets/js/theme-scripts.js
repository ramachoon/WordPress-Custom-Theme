$ = jQuery;

jQuery(document).ready(function(){

    $('.show-more').click(function(){
        var button = $(this);
        var data = {
            'action': 'loadmore',
            'query': load_more.query,
            'page': load_more.current_page
        };

        $.ajax({
            url: load_more.ajax_url,
            type: 'POST',
            data: data,
            beforeSend: function(xhr){
                button.text('Loading......');
            },
            success:function(data){
                if(data){
                    button.text('Show More');
                    $('.card-columns').append(data);
                    load_more.current_page++;

                    if(load_more.current_page == load_more.max_page){
                        button.remove();
                    }
                } else {
                    button.remove();
                }
            },
            error:function(error){
                console.log(error);
                console.log("something went wrong");
            }
        })

    });

});
