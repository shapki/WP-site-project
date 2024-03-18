jQuery(document).ready(function($){

    $('#back_to_top_on').change(function() {
        if (this.checked) {
            $('#back_to_top_color').parents('tr').show();
            $('#back_to_top_position').parents('tr').show();
            $('#back_to_top_side').parents('tr').show();
            $('#back_to_top_bottom').parents('tr').show();
            $('#back_to_top_svg').parents('tr').show();
            $('#back_to_top_mobile').parents('tr').show();
        } else {
            $('#back_to_top_color').parents('tr').hide();
            $('#back_to_top_position').parents('tr').hide();
            $('#back_to_top_side').parents('tr').hide();
            $('#back_to_top_bottom').parents('tr').hide();
            $('#back_to_top_svg').parents('tr').hide();
            $('#back_to_top_mobile').parents('tr').hide();
        }
    });

    $('.color-picker').wpColorPicker();

    $('.wp-color-picker').wpColorPicker(
        'option',
        'change',
        function(event, ui) {
            var color = ui.color.toString();
            $('.svglabel path').css('fill', color);
        }
    );

});