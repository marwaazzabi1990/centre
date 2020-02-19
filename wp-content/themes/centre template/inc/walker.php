<?php

/*Collection of walker classes*/

/* wp_nav_menu()

<div class="menu-container" >
	<ul>//start_lvl
		<li><a><span>start_el()</a>description</span></li> //end_el()
		<li><a>link</a></li>
		<li><a>link</a></li>
	</ul>//end_lvl()

</div>

*/
/*	class Wallker_Nav_Primary extends Wallker_Nav_Menu
{
	function Start_lvl( &$output,$depth){//ul

		$indent= str_repeat("/t", $depth);
		$submenu = ($depth>0) " sub-menu" : "";
		$output .="\n$indent <ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	function Start_el(){//li a span
		
	}
/*	function end_el(){// closing li
		
	}
	function end_lvl(){//closing ul
		
	}*/
//}
?>

