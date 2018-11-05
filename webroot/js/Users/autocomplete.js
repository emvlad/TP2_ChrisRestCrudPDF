(function ($) {
    // Get the path to action from CakePHP
    var autoCompleteSource = urlToAutocompleteFullName;
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,        
        minLength: 1
    });
})(jQuery);


