<?php
class Settings
{
	
	function __construct()
	{
	//	$this->delete();

	//	$this->save();		

		// WP 5.4.2. Cохранение опции экрана per_page. Нужно вызывать до события 'admin_menu'
		add_filter( 'set_screen_option_'.'lisense_table_per_page', function( $status, $option, $value ){
			return (int) $value;
		}, 10, 3 );

		// WP < 5.4.2. сохранение опции экрана per_page. Нужно вызывать рано до события 'admin_menu'
		add_filter( 'set-screen-option', function( $status, $option, $value ){
			return ( $option == 'lisense_table_per_page' ) ? (int) $value : $status;
		}, 10, 3 );

		// создаем страницу в меню, куда выводим таблицу
		add_action( 'admin_menu', function(){//page-slug
			$hook = add_menu_page( 'Настройки плагина YMIE', 'Настройки YMIE', 'manage_options', 'youtube-mass-importer-embeder-settings', 
				[&$this, 'wiev'], 'dashicons-video-alt3', 100 );

			/*if(isset($_GET['action'])) {
				if(!$_GET['action']) {*/
					add_action( "load-$hook", [&$this, 'page_load'] );
			/*	}
		    }*/
			
		} );

		add_action('admin_init', [&$this, 'addControls']);
	}

	function page_load(){
	
	/*	require_once TCW_PLUGIN_DIR . 'backend/controllers/TablePrice.php';	
		$GLOBALS['Example_List_Table'] = new TablePrice();*/

		}


	function wiev() {
	/*	if(isset($_GET['action']))
		{
			if($_GET['action'] == 'edit')
			{
				$price = new BaseCustomData('tc_price');
			    $values = $price->get_by(['id' => $_GET['id']]);
				require_once TCW_PLUGIN_DIR . 'backend/templates/_form_price.php';
			}
			elseif ($_GET['action'] == 'create') {
				require_once TCW_PLUGIN_DIR . 'backend/templates/_form_price.php';
			}		
	   } 
	   else {*/
			require_once YMIE_PLUGIN_DIR . 'admin/templates/setpage.php'; 		
		//}
	}	

	public function addControls(){
	register_setting( 'YMIE', 'YMIE', 'sanitize_callback' );


	add_settings_section( 'section_id', 'Основные настройки YMIE', '', 'YMIE' ); 

	add_settings_field('youtube_api', 'Youtube API v3 key', [&$this, 'fill_youtube_api'], 'YMIE', 'section_id' );

	//add_settings_field('email', 'email менеджера', [&$this, 'fill_email'],       'YMIE', 'section_id' );


	//add_settings_field('fromemail', 'email с которого будет отправка менеджеру', [&$this, 'fill_fromemail'],       'YMIE', 'section_id' );
   }

   function fill_youtube_api(){
	$val = get_option('YMIE');
	$val = $val ? $val['youtube_api'] : null;
		?>
		<input type="text" name="YMIE[youtube_api]" value="<?php echo esc_attr( $val ) ?>" />
		<?php
	}

	function fill_email(){
	$val = get_option('YMIE');
	$val = isset($val['email']) ? $val['email'] : null;
		?>
		<input type="text" name="YMIE[email]" value="<?php echo esc_attr( $val ) ?>" />
		<?php
	}
    
    function fill_fromemail(){
	$val = get_option('YMIE');
	$val = isset($val['fromemail']) ? $val['fromemail'] : get_option('admin_email');
		?>
		<input type="text" name="YMIE[fromemail]" value="<?php echo esc_attr( $val ) ?>" />
		<?php
	}
	/*
	function fill_primer_field2(){
		$val = get_option('YMIE');
		$val = $val ? $val['checkbox'] : null;
		?>
		<label><input type="checkbox" name="YMIE[checkbox]" value="1" <?php checked( 1, $val ) ?> /> отметить</label>
		<?php
	}*/

	## Очистка данных
	function sanitize_callback( $options ){ 
		// очищаем
		foreach( $options as $name => & $val ){
			if( $name == 'input' )
				$val = strip_tags( $val );

			if( $name == 'checkbox' )
				$val = intval( $val );
		}

		return $options;
	}
}

$settings = new Settings();