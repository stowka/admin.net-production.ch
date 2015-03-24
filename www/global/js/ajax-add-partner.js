$(document).ready(function() {
    $('button#add-button').click(addPartner);
});

var addPartner = function() {

	var jsonData = {
		name		: $('#name-field').val(),
		url			: $('#url-field').val()
	};

	$.ajax({
		type		: "POST",
		url 		: "ajax/add-partner.ajax.php",
		data 		: jsonData,
		success 	: function(msg) {
			if(msg) {
				$('#addPartnerModal').modal('hide');
				location.reload(true);
			}
			else {
				alert("Echec !");
			}
		}
	});
	
	return false;
};