$(document).ready(function() {
    $('button#add-button-fr').click({"language" : "fr_CH"},addProject);
    $('button#add-button-en').click({"language" : "en_UK"},addProject);

});

var addProject = function(event) {

    var suffix = (event.data.language === "fr_CH") ? "fr" : "en";

    var jsonData = {
        title       : $('#title-field-' + suffix).val(),
        description : $('#description-field-' + suffix).val(),
        is_public   : $('#public-checkbox-' + suffix)[0].checked,
        url         : $('#url-field-' + suffix).val(),
        type        : $('#type-select-' + suffix).val(),
        language    : event.data.language
    };
    
    $.ajax({
        type     : "POST",
        url      : "ajax/add-project.ajax.php",
        data     : jsonData,
        success  : onSuccess
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

