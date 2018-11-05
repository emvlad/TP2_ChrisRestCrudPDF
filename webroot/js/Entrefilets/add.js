$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#genre-id').on('change', function () {
        var genreId = $(this).val();
        if (genreId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'genre_id=' + genreId,
                success: function (genres) {
                    $select = $('#theme-id');
                    $select.find('option').remove();
                    $.each(genres, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' 
                                    + childValue.sujet + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#themes-id').html('<option value="">Select User first</option>');
        }
    });
});


