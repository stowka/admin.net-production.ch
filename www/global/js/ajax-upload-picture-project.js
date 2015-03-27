$(document).ready(function() {
    $('.upload-button').each(function() {
        $(this).click({id : $(this).val()}, uploadPicture)
    });
});


var uploadPicture = function(event) {
    var selector = "#file-select-" + event.data.id;
    var fileSelect = $(selector);
    var uploadButton = $('#upload-button');

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
            success     : onSuccessUploadPicture 
        });

        return false; 

    } else {
        alert("Sélectionnez un fichier");
    }
};

var onSuccessUploadPicture = function(res) {
   var data = JSON.parse(res);
   var td_selector = "tr#" + data.id + " td";

   //Empty the td
   $($(td_selector)[3]).empty();

   //Create image
   var img = $("<img/>").attr("width", "50px")
                        .attr("src", "global/img/uploads/projects/" + data.name);

   //Create remove button
   var remove_button = $("<button></button>")
                            .addClass("btn glyphicon glyphicon-remove delete-button")
                            .attr("value", data.id)
                            .click({ "id" : data.id }, deletePicture);

    //Append to the td 
    $($(td_selector)[3]).append($(img))
                        .append($(remove_button));
};
