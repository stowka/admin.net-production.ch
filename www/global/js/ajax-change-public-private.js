$(document).ready(function() {
    $('input[type="checkbox"]').change(updateProject)
})

var updateProject = function() {
    $.ajax({
        type    : "POST",
        url     : "ajax/change-public-private.ajax.php",
        data    : "id=" + this.value + "&bool=" + this.checked,
        success : function(result) {
            alert(result);
        }
    });
    return false;
}

