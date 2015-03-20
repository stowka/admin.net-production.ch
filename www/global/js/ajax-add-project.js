$(document).ready(function() {
    $('button#add-button-fr').click(addProjectFr);
    $('button#add-button-en').click(addProjectEn);

});

var addProjectFr = function() {

    var jsonData = {
        title       : $('#title-field-fr').val(),
        description : $('#description-field-fr').val(),
        is_public   : $('#public-checkbox-fr')[0].checked,
        url         : $('#url-field-fr').val(),
        type        : $('#type-select-fr').val(),
        language    : $('#language-select-fr').val(),
    }
    
    $.ajax({
        type     : "POST",
        url      : "ajax/add-project.ajax.php",
        data     : jsonData,
        success  : function(msg) {
            if(msg) {
                $('#addProjectModalFr').modal('hide');
                location.reload(true);
            } else {
                alert("Échec !");
            }
        }
    });

    return false;
};

var addProjectEn = function() {

    var jsonData = {
        title       : $('#title-field-en').val(),
        description : $('#description-field-en').val(),
        is_public   : $('#public-checkbox-en')[0].checked,
        url         : $('#url-field-en').val(),
        type        : $('#type-select-en').val(),
        language    : $('#language-select-en').val(),
    }
    
    $.ajax({
        type     : "POST",
        url      : "ajax/add-project.ajax.php",
        data     : jsonData,
        success  : function(msg) {
            if(msg) {
                $('#addProjectModalFr').modal('hide');
                location.reload(true);
            } else {
                alert("Échec !");
            }
        }
    });

    return false;
};

