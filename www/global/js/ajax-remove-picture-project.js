$(document).ready(function() {
    $('.delete-button').each(function() {
        $(this).click({id : $(this).val()}, deletePicture)
    });
});

var deletePicture = function(event) {
    
    $.ajax({
        type : "POST",
        url : "ajax/remove-picture-project.php",
        data : "id="+event.data.id,
        success : function(res) {
            //Create the image upload part
            var data = JSON.parse(res);
            var file_select = $("<input/>")
                            .attr("id", "file-select-" + data.id)
                            .attr("type", "file");
            var upload_button  = $("<button></button>")
                            .addClass("upload_button")
                            .attr("value", data.id)
                            .text("Upload!")
                            .click({"id" : data.id}, uploadPicture);
            $($("tr#" + data.id + " td")[3]).empty()
                                                .append($(file_select))
                                                .append($(upload_button));
        }
    });
};

