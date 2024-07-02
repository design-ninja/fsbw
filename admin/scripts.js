jQuery(document).ready(function ($) {
    $('.color-picker').wpColorPicker();

    $('#fsbw_style').on('change', function() {
        var borderRadiusField = $('#fsbw_border_radius');
        if (this.value == 'rounded') {
            borderRadiusField.show();
        } else {
            borderRadiusField.hide();
        }
    });

    if ($('#fsbw_style').val() == 'rounded') {
        $('#fsbw_border_radius').show();
    } else {
        $('#fsbw_border_radius').hide();
    }

    // Remove button action
    function updateRemoveButtons() {
        $('.remove-button').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.fsbw-container_raised').remove();
        });
    }

    updateRemoveButtons();

    // Add new button action
    $('.add-button').on('click', function (e) {
        e.preventDefault();
        var index = $('.fsbw-container_raised').length;
        var newFieldset = `
        <div class="fsbw-container fsbw-container_raised">
            <div class="fsbw-button-header">
                <h4>Button ${index + 1}</h4>
                <a href="#" class="remove-button button-link-delete">Delete</a>
            </div>
            <div class="form-field">
                <label>Icon</label>
                <input type="text" name="fsbw_settings[fsbw_buttons][${index}][icon]" value="whatsapp" />
            </div>
            <div class="form-field">
                <label>Bg color</label>
                <input type="text" name="fsbw_settings[fsbw_buttons][${index}][bg_color]" value="#000000" class="color-picker" />
            </div>
            <div class="form-field">
                <label>Icon color</label>
                <input type="text" name="fsbw_settings[fsbw_buttons][${index}][icon_color]" value="#ffffff" class="color-picker" />
            </div>
            <div class="form-field">
                <label>Link</label>
                <input type="text" name="fsbw_settings[fsbw_buttons][${index}][link]" value="https://wa.me/<number>" />
            </div>
        </div>`;
        $(this).before(newFieldset);
        updateRemoveButtons();
        $('.color-picker').wpColorPicker();
    });

    // Sortable buttons
    $("#fsbw-buttons-list").sortable({
        handle: ".fsbw-button-header",
        placeholder: "sortable-placeholder",
        update: function (event, ui) {
            // Update the indexes of buttons when they are reordered
            $('.fsbw-container_raised').each(function (index) {
                $(this).find('input, textarea').each(function () {
                    var name = $(this).attr('name');
                    if (name) {
                        var newName = name.replace(/\[fsbw_buttons\]\[\d+\]/, '[fsbw_buttons][' + index + ']');
                        $(this).attr('name', newName);
                    }
                });
            });
        }
    }).disableSelection();
});
