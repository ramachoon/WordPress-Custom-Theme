$ = jQuery;
$(document).ready(function(){
    displayMetaBoxes();

    $("input[name='post_format']").change(function(){
        displayMetaBoxes();
    })

    function displayMetaBoxes(){
        var selectedFormat = $("input[name='post_format']:checked").attr("id");
        console.log(selectedFormat);

        var allFormats = formats.allFormats;
        console.log(allFormats);
        for (var format in allFormats) {
            if(format === selectedFormat){
                $("#"+allFormats[format]).fadeIn();
            } else {
                $("#"+allFormats[format]).find(".customField").val("");
                $("#"+allFormats[format]).hide();
            }
        }

    }


});
