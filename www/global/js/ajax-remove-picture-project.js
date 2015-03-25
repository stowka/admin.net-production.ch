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
        success : function(answer) {
            if(answer === "picture deleted") {
                location.reload();
            }
        }
    });
};

