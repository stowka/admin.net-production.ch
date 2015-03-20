$(document).ready(function() {
    $('#form-fr_CH button').click({language : "fr_CH"}, updateCommitments);
    $('#form-en_UK button').click({language : "en_UK"}, updateCommitments);
});

var updateCommitments = function(lang) {


    if(lang.data.language  == "fr_CH") {
        var jsonData = {
            solutions  : $('textarea#Solutions-fr_CH').val(),
            tools      : $('textarea#Outils-fr_CH').val(),
            assistance : $('textarea#Assistance-fr_CH').val(),
            time       : $('textarea#Délais-fr_CH').val(),
            language   : lang.data.language
        };
    } else {
        var jsonData = {
            solutions  : $('textarea#Solutions-en_UK').val(),
            tools      : $('textarea#Tools-en_UK').val(),
            assistance : $('textarea#Assistance-en_UK').val(),
            time       : $('textarea#Time-en_UK').val(),
            language   : lang.data.language
        };
    }

    $.ajax({
        type    : "POST",
        url     : "ajax/update-commitments.ajax.php",
        data    : jsonData,
        success : function(answer) {
            alert("Data saved");
        }
    });

    return false;
};
