<?php
	/**
	 * Default head section
	 * @author Antoine De Gieter
	 * @copyright Net Production Köbe & Co
	 */
?>

	<!-- Nav -->
	<span id="home"> </span>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
	 		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	 			<span class="sr-only">Toggle navigation</span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#home">Net-Production</a>
		</div>
		<!-- /.navbar-collapse -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">y
			<ul class="nav navbar-nav">
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=stats">
						Stats
					</a>
				</li>
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=home">
						Home
					</a>
				</li>
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=projects">
						Projects
					</a>
				</li>
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=commitments">
						Commitments
					</a>
				</li>
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=team">
						Team
					</a>
				</li>
				<li class="menu-item">
					<a class="menu menu-icon" href="./?page=contact">
						Contact
					</a>
				</li>
			</ul>
		</div>
	</nav>

<script type="text/javascript">
	$(document).ready(function(){
		var sections = [];
		var id = false;
		var scrolled_id = false;
		var $navbar = $('.navbar-nav');
		$('a.menu-icon', $navbar).each(function(){
			sections.push($($(this).attr('href')));
		});
		$(window).scroll(function(e){
			var scrollTop = $(this).scrollTop() + ($(window).height() / 2);
			for(var i in sections){
				var section = sections[i];
				if(scrollTop > section.offset().top){
					scrolled_id = section.attr('id');
				}
			}
			if(scrolled_id !== id) {
				id = scrolled_id;
				$('a', $navbar).removeClass('active');
				$('a[href="#' + scrolled_id + '"]', $navbar).addClass('active');
			}
		});
	});
</script>

<script type="text/javascript">
	$('.nav a').on('click', function(){
	    $(".navbar-toggle").click(); //bootstrap 3.x by Richard
	});
</script>