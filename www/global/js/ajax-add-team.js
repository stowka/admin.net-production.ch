$(document).ready(function() {
    $('button#add-button-fr').click(addTeamFr);
    $('button#add-button-en').click(addTeamEn);

});

var addTeamFr = function() {

	var jsonData = {
		name		: $('#name-field-fr').val(),
		biography	: $('#biography-field-fr').val(),
		position	: $('#position-field-fr').val(),
		language	: $('#language-select-fr').val()
	};

	$.ajax({
		type		: "POST",
		url 		: "ajax/add-team.ajax.php",
		data 		: jsonData,
		success 	: function(msg) {
			if(msg) {
				$('#addTeamModal-fr_CH').modal('hide');
				location.reload(true);
			}
			else {
				alert("Echec !");
			}
		}
	});
	
	return false;
};

var addTeamEn = function() {

	var jsonData = {
		name		: $('#name-field-en').val(),
		biography	: $('#biography-field-en').val(),
		position	: $('#position-field-en').val(),
		language	: $('#language-select-en').val()
	};

	$.ajax({
		type		: "POST",
		url 		: "ajax/add-team.ajax.php",
		data 		: jsonData,
		success 	: function(msg) {
			if(msg) {
				$('#addTeamModal-en_UK').modal('hide');
				location.reload(true);
			}
			else {
				alert("Echec !");
			}
		}
	});
	
	return false;
};