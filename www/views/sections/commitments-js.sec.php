<script type="text/javascript" charset="utf-8" async defer>
	
	$("#form-fr_CH").show();
    $("#form-en_UK").hide();

	$("#link-en_UK").click(function(){
    	$("#form-fr_CH").hide();
    	$("#form-en_UK").show();

    	$("#link-en_UK").addClass('active');
    	$("#link-fr_CH").removeClass('active');
	});

	$("#link-fr_CH").click(function(){
    	$("#form-en_UK").hide();
    	$("#form-fr_CH").show();

    	$("#link-en_UK").removeClass('active');
    	$("#link-fr_CH").addClass('active');
	});
</script>