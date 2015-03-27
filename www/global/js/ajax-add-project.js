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
        success  : onSuccess /*function(msg) {
            if(msg) {
                $('#addProjectModalFr').modal('hide');
                location.reload(true);
            } else {
                alert("Échec !");
            }
        }*/
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
        success  : onSuccess /*function(msg) {
            if(msg) {
                $('#addProjectModalFr').modal('hide');
                location.reload(true);
            } else {
                alert("Échec !");
            }
        }*/
    });

    return false;
};

var onSuccess = function(res) {
    $('#addProjectModalFr').modal("hide");
    $('#addProjectModalEn').modal("hide");
    
    var data = JSON.parse(res);
    var tableSelector = "#type-" + data.type;

    //Create delete button
    var delete_button = $("<button></button>")
                            .addClass("btn btn-danger delete")
                            .attr("type", "button")
                            .attr("value", data.id)
                            .text("x");

    //Create the public checkbox
    var check_box = $("<input/>")
                        .addClass("update")
                        .attr("type", "checkbox")
                        .attr("value", data.id);

    if(data.public) {
        $(check_box).prop("checked", true);
    } else {
        $(check_box).prop("checked", false);
    }

    //Create the image upload part
    var file_select = $("<input/>")
                            .attr("id", "file-select-" + data.id)
                            .attr("type", "file");
    var upload_button  = $("<button></button>")
                            .addClass("upload_button")
                            .attr("value", data.id)
                            .text("Upload!");

    //Create the whole row
    var tr = $("<tr></tr>")
                .attr("id", data.id)
                .append($("<td></td>").text(data.title))
                .append($("<td></td>").text(data.description))
                .append($("<td></td>").append($(check_box)))
                .append($("<td></td>").append($(file_select))
                                      .append($(upload_button)))
                .append($("<td></td>").append($(delete_button)));

    //Append the row at the end of the table
    $(tableSelector).append($(tr));
}

