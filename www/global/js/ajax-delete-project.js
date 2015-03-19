$(document).ready(function() {
    $('button').click(deleteProject);
});

var deleteProject = function() {
    if(confirm("Voulez-vous réellement supprimer le projet " + this.value + " ?")) {
        $.ajax({
            type : "POST",
            url  : "ajax/delete-project.ajax.php",
            data : "id=" + this.value,
            success : function(id) {
                $('tr#'+id).remove();
            }
        });
    }
    return false;
};


