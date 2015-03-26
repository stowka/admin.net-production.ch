$(document).ready(function() {
    $('#form-fr_CH button').click({language : "fr_CH"}, updateCommitments);
    $('#form-en_UK button').click({language : "en_UK"}, updateCommitments);

    $('#form-fr_CH button').attr("disabled", true);
    $('#form-en_UK button').attr("disabled", true);

    $('#form-fr_CH textArea').on('change keyup paste', {language : "fr_CH"}, dataChanged);
    $('#form-en_UK textArea').on('change keyup paste', {language : "en_UK"}, dataChanged);
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
        success : onSuccess,
        error   : onError 
    });

    return false;
};

var onSuccess = function(res) {
    var data = JSON.parse(res);
    var selector = "#form-" + data.language + " button";
    var div = $("<div></div>").addClass("alert alert-success alert-dismissable")
                              .text("Data saved !");
    
    var button = $("<button></button>").attr("type", "button")
                                       .addClass("close")
                                       .attr("data-dismiss", "alert")
                                       .attr("aria-hidden", "true")
                                       .text("x");

    $(div).append($(button));
    $("#alert").append($(div));
    $(selector).attr("disabled", true);
    window.setTimeout(function() {
        $(div).alert('close')} , 3000);
};

var onError = function(res) { 
    var div = $("<div></div>").addClass("alert alert-error alert-dismissable")
                              .text("Something went wrong !");
    
    var button = $("<button></button>").attr("type", "button")
                                       .addClass("close")
                                       .attr("data-dismiss", "alert")
                                       .attr("aria-hidden", "true")
                                       .text("x");

    $(div).append($(button));
    $("#alert").append($(div));
    window.setTimeout(function() {
        $(div).alert('close')} , 3000);
};

var dataChanged = function(event) {
    var selector = "#form-" + event.data.language + " button";
    if($(selector).attr("disabled")) {
        $(selector).attr("disabled", false);
    }
}

