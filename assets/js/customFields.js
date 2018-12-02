$ = jQuery;

$(document).on('click', '.set_custom_images', function(e) {
    e.preventDefault();
    var button = $(this);
    var formGroup = $(this).parent('.image-form-group');
    var id = button.prev();
    wp.media.editor.send.attachment = function(props, attachment) {
        id.val(attachment.id);
        formGroup.find('.custom_image').attr("src",attachment.url).addClass('pb-10');
        formGroup.find('.remove_custom_images').removeClass('hidden');
    };
    wp.media.editor.open(button);
    id.show();
    return false;
});


$(document).on('click', '.remove_custom_images', function(e) {
    e.preventDefault();
    var formGroup = $(this).parent('.image-form-group');
    var input = formGroup.find('.process_custom_images');
    input.val('');
    formGroup.find('.custom_image').attr('src','').removeClass('pb-10');
    formGroup.find('.remove_custom_images').addClass('hidden');
});
