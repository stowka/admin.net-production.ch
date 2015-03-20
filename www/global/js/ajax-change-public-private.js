$(document).ready(function() {
    $('input.update[type="checkbox"]').change(updateProject)
})

var updateProject = function() {
    $.ajax({
        type    : "POST",
        url     : "ajax/change-public-private.ajax.php",
        data    : "id=" + this.value + "&bool=" + this.checked,
        success : function(result) {
        }
    });
    return false;
}

