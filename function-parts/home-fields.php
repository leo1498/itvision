<?php
    


//******************************************* 
// Sekcja 01 - Sekcja główna          
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_00',
   'title'         => esc_html__( 'Sekcja 01 - Sekcja główna', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
   
));

   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_00_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

   $page->add_field(array(
      'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
      'id'         => 'home_00_subtitle',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
      'id'         => 'home_00_subtitle',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'URL do filmiku', 'cmb2' ),
      'id'         => 'home_00_video_url',
      'type'       => 'text',
      'description' => 'Link bez nazwy domeny i bez slashu, np. wp-content/uploads/2020/02/video.mp4',
      'sanitization_cb' => false,
   ));
   
   // planet slider
   $page_group = $page->add_field( array(
      'id'          => 'home_00_planet_group',
      'type'        => 'group',
      'description' => __( 'Planet slider', 'mmd' ),
      'options'     => array(
         'group_title'    => esc_html__( 'Slajd {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj slajd', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń slajd', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'title',
      'type'       => 'text',
      'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
         'id'         => 'subtitle',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'url',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
   
   // partners
   $page_group = $page->add_field( array(
      'id'          => 'home_00_partners_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Partner {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj partnera', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń partnera', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
      'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
      'id'         => 'image',
      'type'       => 'file',
      'sanitization_cb' => false,
      ));
   
   // text for btn groups
   $page->add_field( array(
      'name' => 'Text grup przycisków',
      'type' => 'title',
      'id'   => 'home_00_wiki_title_1'
   ) );

   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł grupy 1', 'cmb2' ),
      'id'         => 'home_00_title_group_1',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł grupy 2', 'cmb2' ),
      'id'         => 'home_00_title_group_2',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

   
//******************************************* 
// Sekcja 02 - Co u nas słychac?      
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_01',
   'title'         => esc_html__( 'Sekcja 02 - Co u nas słychać', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_01_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));


//******************************************* 
// Sekcja 03 - Dla kogo pracujemy?     
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_03',
   'title'         => esc_html__( 'Sekcja 03 - Dla kogo pracujemy?', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_03_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));


//******************************************* 
// Sekcja 04 - Nasze rozwiązania
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_04',
   'title'         => esc_html__( 'Sekcja 04 - Nasze rozwiązania', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_04_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Link', 'cmb2' ),
      'id'         => 'home_04_title_link',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   // partners
   $page_group = $page->add_field( array(
      'id'          => 'home_04_partners_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Partner {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj partnera', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń partnera', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'link',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));


//******************************************* 
// Sekcja 05 - Jak działamy? 
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_05',
   'title'         => esc_html__( 'Sekcja 05 - Jak działamy?', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_05_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));


//******************************************* 
// Sekcja 06 - Opis w cyfrach
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_06',
   'title'         => esc_html__( 'Sekcja 06 - Opis w cyfrach', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'home_06_tile-counter',
      'type'        => 'group',
      'description' => __( 'Slider', 'mmd' ),
      'options'     => array(
         'group_title'    => esc_html__( 'Opis {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj opis', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń opis', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Liczba', 'cmb2' ),
         'id'         => 'count',
         'type'       => 'text_small',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Tytuł', 'cmb2' ),
         'id'         => 'title',
         'type'       => 'text_medium',
         'sanitization_cb' => false,
      ));


//******************************************* 
// Sekcja 07 - Co mówią klienci?
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_07',
   'title'         => esc_html__( 'Sekcja 07 - Co mówią klienci?', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_07_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

//******************************************* 
// Sekcja 08 - Co mówią eksperci?
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'home_08',
   'title'         => esc_html__( 'Sekcja 08 - Co mówią eksperci?', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'home_08_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));


//******************************************* 
// Nasi partnerzy slider
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'our_partners',
   'title'         => esc_html__( 'Nasi partnerzy', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Partnerzy', 'cmb2' ),
      'id'         => 'our_partners_list',
      'type'       => 'file_list',
      'description' => 'Sekcja w stopce na każdej stronie',
      'preview_size' => array(150, 70)
   ));

//******************************************* 
// Sekcja nad footerem
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'footer_tiles',
   'title'         => esc_html__( 'Footer info', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-home.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'footer_tiles_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Blok {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj blok', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń blok', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Obrazek', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'preview_size' => array(70, 70)
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Tytuł', 'cmb2' ),
         'id'         => 'title',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'href',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Telefon', 'cmb2' ),
         'id'         => 'phone',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));