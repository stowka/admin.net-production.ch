$(document).ready(function() {
    $('button.delete').click(deletePartner);
});

var deletePartner = function() {
    if(confirm("Voulez-vous réellement supprimer le partenaire " + this.value + " ?")) {
        $.ajax({
            type : "POST",
            url  : "ajax/delete-partner.ajax.php",
            data : "id=" + this.value,
            success : function(id) {
                $('tr#'+id).remove();
            }
        });
    }
    return false;
};


