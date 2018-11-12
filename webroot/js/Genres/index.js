function getGenres() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (genres) {
                    var genreTable = $('#genreData');
                    genreTable.empty();
                    var count = 1;
                    $.each(genres.data, function (key, value)
                    

                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editGenre(' + value.id + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? genreAction(\'delete\', ' + value.id + ') : false;"></a>' +
                                '</td></tr>';
                        genreTable.append('<tr><td>' + count + '</td><td>' + value.genre + '</td><td>' + value.classification + editDeleteButtons);
                        count++;
                    });
                  
                }
    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

/*
 $('#genreAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */

function genreAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var genreData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        genreData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        genreData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
      /*  
         headers : {
            'X-CSRF-Token': $('[name="_csrfToken"]').val()
	},
        
        */
        
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(genreData),
        //timeout: 5000,
        success: function (msg) {
            console.log('SUCCESS');
            if (msg) {
                alert('Genre data has been ' + statusArr[type] + ' successfully.');
                getGenres();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        },
        
       /* 
        fail: function(xhr, textStatus, errorThrown){
                        console.log('ERROR');

            alert(console.log(xhr));
            alert(console.log(textStatus));
            alert(console.log(errorThrown));
        }*/
    });
}

/*** à déboguer ... ***/
function editGenre(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#genreEdit').val(data.data.genre);
            $('#classificationEdit').val(data.data.classification);
            $('#editForm').slideDown();
        }
    });
}