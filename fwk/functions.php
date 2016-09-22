<?php

	//-----------------------------------------------------------------------------------------------------------------------------------------------
	
	
	//jQuery UI
	function add_jquery_ui() {
		wp_enqueue_script( 'jquery-ui-core' );
		//wp_enqueue_script( 'jquery-ui-widget' );
//		wp_enqueue_script( 'jquery-ui-mouse' );
//		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
//		wp_enqueue_script( 'jquery-ui-slider' );
//		wp_enqueue_script( 'jquery-ui-tabs' );
//		wp_enqueue_script( 'jquery-ui-sortable' );
//		wp_enqueue_script( 'jquery-ui-draggable' );
//		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
//		wp_enqueue_script( 'jquery-ui-resize' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		//wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
	}
	add_action( 'wp_enqueue_scripts', 'add_jquery_ui' );
	
	//dodanie plików stylu jQueryUI z serwerów Google
	wp_enqueue_style(	'plugin_name-admin-ui-css',
						'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css',
						false,
						PLUGIN_VERSION,
						false);
	 
	function add_my_script() {

		//dołączenie skryptu bootstrap'a
		wp_register_script('bootstrap_js', get_stylesheet_directory_uri().'/js/bootstrap.js', array( 'jquery' ));
		wp_enqueue_script('bootstrap_js');

		// dołączanie mojego podstawowego skryptu dla strony
		wp_register_script('osiolek_cs', get_stylesheet_directory_uri().'/js/osiolek_cs.js', array( 'jquery' ));
		wp_enqueue_script('osiolek_cs');
	}  
	add_action( 'wp_enqueue_scripts', 'add_my_script' );


	// wczytanie standardowych stylów CSS - wczytywanych na początku działania strony
	function centrumSztuki_enqueue_style() {
		wp_enqueue_style( 'reset', get_template_directory_uri().'/style/reset.css' );
		// wp_enqueue_style( 'medium768', get_template_directory_uri().'/style/medium768.css' ); 
		// wp_enqueue_style( 'desktop', get_template_directory_uri().'/style/desktop.css' ); 

		// styl bootstrap:
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );

		// styl będący moją modyfikacją bootstrap:
		wp_enqueue_style( 'style_cs', get_template_directory_uri().'/css/style_cs.css' );

	}
	add_action( 'wp_enqueue_scripts', 'centrumSztuki_enqueue_style' );
 
	//Ustawienie szerokości treści w motywie
	if( !isset($content_width) )
		$content_width = 500;
		
	//Pozbycie się wpisu o wersji WordPressa <meta name="generator" content="WordPress 4.2.2" />
	remove_action('wp_head', 'wp_generator');
	
	//Konfiguracja motywu
	//add_action('after_setup_theme', 'simpleblog_themesetup');
	
	

	
	// function simpleblog_themesetup()
	// {
	// 	//Automatyczne linki kanałów RSS
	// 	add_theme_support('automatic-feed-links');
		
	// 	//Dodanie funkcji menu nawigacyjnych do zaczepu init
	// 	add_action('init', 'simpleblog_register_menus');
		
	// 	//Dodanie funkcji pasków bocznych do zaczepu widgets_init
	// 	add_action('widgets_init', 'simpleblog_register_sidebars');
		
	// 	//Dodanie do kolejki plików JavaScript w zaczepie wp_enqueue_scripts
	// 	add_action('wp_enqueue_scripts','simpleblog_load_scripts');
		
	// 	//Dodanie własnego rozmiaru obrazków
	// 	add_image_size( 'projekcja-thumb', 0, 150 ); // rozmiar obrazka (miniatury) wyświetlany na liście kino - repertuar
	// 	add_image_size( 'film-zapowiedz', 125, 185, array( 'center', 'top' ) ); //rozmiar okładki filmu do wyświetlania na pasku zapowiedzi
	// 	//add_image_size( 'sidebar-full-width', 250, 0); //rozmiar obrazka wypełniający sidebar na całą szerokość (w szablonie założona 250px)
	// 	//add_image_size( 'glowny-tresc', 1000 ); //Główny rozmiar obrazka w treści (o szerokości 1000px)
		
	// }//simpleblog_themesetup
	
	

	//Rejestracja menu
	
	// Register custom navigation walker - na potrzeby integracji navbar bootstrap'a z wordpressem
    require_once('wp_bootstrap_navwalker.php');

	function simpleblog_register_menus()
	{
		register_nav_menus(
			array(
				'top-navigation' => 'Top navigation',
				// 'top-user-navigation' => 'Top user navigation',
				'bottom-navigation' => 'Bottom navigation',
				// 'category-navigation' => 'Nawigacja zmiany kategorii wydarzeń',
				// 'kursy-category-navigation' => 'Nawigacja zmiany kategorii kursów'
			)
		);
	}//simpleblog_register_menus
	
	//Zarejestrowanie obszarów widżetów
	// function simpleblog_register_sidebars()
	// {
	// 	//Obszar widżetów w prawej kolumnie
		
	// 	register_sidebar(	array(
	// 							'name' => 'Outw',
	// 							'id' => 'outw',
	// 							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	// 							'after_widget' => '</li>',
	// 							'before_title' => '<h3 class="outw-widget-title">',
	// 							'after-title' => '</h3>'
	// 						)
	// 	);
		
	// 	register_sidebar(	array(
	// 							'name' => 'O Centrum',
	// 							'id' => 'o-centrum',
	// 							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	// 							'after_widget' => '</li>',
	// 							'before_title' => '<h3 class="o-centrum-widget-title">',
	// 							'after-title' => '</h3>'
	// 						)
	// 	);
		
	// 	register_sidebar(	array(
	// 							'name' => 'Pasek boczny główny',
	// 							'id' => 'pasek-boczny-glowny',
	// 							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	// 							'after_widget' => '</li>',
	// 							'before_title' => '<h3 class="pasek-boczny-glowny-widget-title">',
	// 							'after-title' => '</h3>'
	// 						)
	// 	);
		
	// 	register_sidebar(	array(
	// 							'name' => 'Kino',
	// 							'id' => 'kino',
	// 							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	// 							'after_widget' => '</li>',
	// 							'before_title' => '<h3 class="kino-widget-title">',
	// 							'after-title' => '</h3>'
	// 						)
	// 	);
		
	// 	register_sidebar(	array(
	// 							'name' => 'Kino zarządzanie',
	// 							'id' => 'kino-zarzadzanie',
	// 							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	// 							'after_widget' => '</li>',
	// 							'before_title' => '<h3 class="pasek-boczny-glowny-widget-title">',
	// 							'after-title' => '</h3>'
	// 						)
	// 	);
	// }//simpleblog_register_sidebars

	
	// Dodatek ułatwiający skalowanie obrazków wklejonych w edytorze (tylko pełny rozmiar obrazków) - modyfikacja własna
	//Jeśli wklejany obrazek ma klasę size-full lub glowny-tresc to funkcja "obcina" mu parametry width i height, żeby się dobrze skalował za pomocą CSS 
	//add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	 
	function remove_width_attribute( $html ) {
		
		if(strpos ( $html , 'size-full') || strpos ( $html , 'glowny-tresc')){
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		}
		return $html;
}
	
	//Kolejkowanie skryptów JavaScript
	function simpleblog_load_scripts()
	{
		//Kolejkowaie JavaScropt dla komentarzy dzielonych na wątki, jeśli funkcja ta zostanie włączona
		if( is_singular() && get_option('thread-comments') && comments_open() )
			wp_enqueue_script('comment-reply');
	}//simpleblog_load_scripts

	

	
	//---------------funkcje testowe - do usunięcia
	

?>