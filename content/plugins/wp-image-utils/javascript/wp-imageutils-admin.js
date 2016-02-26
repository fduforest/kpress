/**
 * Wrapper function to safely use $
 */
function wpiuAdminWrapper($) {
    var wpiuAdmin = {

        /**
         * Main entry point
         */
        init: function () {
            $('#bulk-feature').click(function() {
                var category = $('#selected-category').val();
                var tag = $('#selected-tag').val();
                var author = $('#selected-author').val();
                var type = $('#selected-type').val();

                if (category == null) category = [];
                if (tag == null) tag = [];
                if (author == null) author = [];
                if (type == null) type = [];

                var data = {
                    'action': 'bulk_feature',
                    'categories': category,
                    'tags': tag,
                    'types': type,
                    'authors': author
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                $.post(ajaxurl, data, function(response) {
                    $('#updated').text(response);
                    $('#updated').show();
                });
                return false;
            });
        }
    }; // end wpiuAdmin

    $(document).ready(wpiuAdmin.init);

} // end wpiuAdminWrapper()

wpiuAdminWrapper(jQuery);
