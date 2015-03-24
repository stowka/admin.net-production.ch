$(document).ready(function() {
    $('.upload-button').each(function() {
        $(this).click({id : $(this).val()}, uploadPicture)
    });
});


var uploadPicture = function(event) {
    var selector = "#file-select-en-" + event.data.id;
    var fileSelect = $(selector);
    var uploadButton = $('#upload-button-en');

    var file = fileSelect[0].files;

    if(file['length'] === 1) {

        var formData = new FormData();
        formData.append('picture', file[0], event.data.id);

        $.ajax({
            type        : "POST",
            url         : "ajax/upload-picture-project.php",
            data        : formData,
            processData : false,
            contentType : false,
            success     : function(answer) {
                alert(answer);
            }
        });

        return false; 

    } else {
        alert("Sélectionnez un fichier");
    }
};
