<?php



//******************************************* 
// Posts news          
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'posts_00',
   'title'         => esc_html__( 'Filmik aktualności', 'cmb2' ),
   'object_types'  => array( 'post' ),
));
   $page->add_field( array(
      'name' => esc_html__( 'Filmik zamiast obrazka?', 'cmb2' ),
      'id'   => 'posts_00_checkbox',
      'desc' => 'Film należy dodać przez edytor w treści. Nalezy dodać miniaturę',
      'type' => 'checkbox',
   ) );

//******************************************* 
// Gallery images        
//*******************************************
   $page = new_cmb2_box( array(
      'id'            => 'gallery',
      'title'         => esc_html__( 'Galeria', 'cmb2' ),
      'object_types'  => array( 'post', 'clients' ),
   ) );
      $page->add_field( array(
         'name'         => esc_html__( 'Dodaj obrazy', 'cmb2' ),
         'id'           => 'gallery_images',
         'desc'  =>  'Opcjonalnie',
         'type'         => 'file_list',
         'preview_size' => array(100, 100),
      ) );


//******************************************* 
// Solutuins page         
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'solutions_00',
   'title'         => esc_html__( 'Zaufali nam', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-solutions.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'solutions_00_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Klient {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj klienta', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń klienta', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'preview_size' => array(250, 150)
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Tytuł', 'cmb2' ),
         'id'         => 'title',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Krótki opis', 'cmb2' ),
         'id'         => 'text_short',
         'type'       => 'textarea',
         'attributes' => array(
            'rows' => 7, 
         ),
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'text',
         'type'       => 'text_url',
         'attributes'  => array(
            'placeholder' => 'http://',
         ),
         'sanitization_cb' => false,
      ));

$page = new_cmb2_box( array(
   'id'            => 'solutions_02',
   'title'         => esc_html__( 'Ikonka na stronie głównej', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-solutions.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Ikonka', 'cmb2' ),
      'id'         => 'solutions_02_icon',
      'type'       => 'file',
      'preview_size' => array(100, 100)
   ));


//******************************************* 
// Products post types     
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'products_modul',
   'title'         => esc_html__( 'Krótki opis modułu (poziom 2)', 'cmb2' ),
   'object_types'  => array( 'products' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'products_modul_content',
      'type'       => 'wysiwyg',
      'options' => array(
         'textarea_rows' => 20,
      ),
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Zrezygnować z linku', 'cmb2' ),
      'id'         => 'products_modul_checkbox',
      'type'       => 'checkbox',
      'desc'       => 'Usunąć przycisk do podstrony 3 poziomu',
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'products_00',
   'title'         => esc_html__( 'Moduły (poziom 3)', 'cmb2' ), 
   'object_types'  => array( 'products' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'products_00_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Moduł {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj moduł', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń moduł', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
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
         'name'       => esc_html__( 'Opis', 'cmb2' ),
         'id'         => 'text',
         'type'       => 'wysiwyg',
         'options' => array(
            'textarea_rows' => 20,
         ),
         'sanitization_cb' => false,
      ));


//******************************************* 
// About us page     
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'about_00',
   'title'         => esc_html__( 'Poznaj lepiej nasze produkty', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-about.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'about_00_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Produkt {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj produkt', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń produkt', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'preview_size' => array(120, 70)
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'url',
         'type'       => 'text_url',
         'sanitization_cb' => false,
      ));


$page = new_cmb2_box( array(
   'id'            => 'about_00',
   'title'         => esc_html__( 'Poznaj lepiej nasze produkty', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-about.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'about_00_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Produkt {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj produkt', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń produkt', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
         'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'preview_size' => array(120, 70)
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'url',
         'type'       => 'text_url',
         'sanitization_cb' => false,
      ));

$page = new_cmb2_box( array(
   'id'            => 'about_01',
   'title'         => esc_html__( 'Social media', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-about.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'about_01_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Link {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj link', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń link', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
         'sortable'       => true,
      ),
   ));
   $page->add_group_field( $page_group, array(
      'name'       => esc_html__( 'Link', 'cmb2' ),
      'id'         => 'url',
      'type'       => 'text_url',
      'sanitization_cb' => false,
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Ikona', 'cmb2' ),
         'id'         => 'image',
         'type'       => 'file',
         'preview_size' => array(40, 40)
      ));  

//******************************************* 
// Career page     
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'career_figure',
   'title'         => esc_html__( 'Zdjęcie z opisem', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-career.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
      'id'         => 'career_figure_image',
      'type'       => 'file',
      'preview_size' => array(400, 600)
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
      'id'         => 'career_figure_subtitle',
      'type'       => 'text_medium',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Tytuł', 'cmb2' ),
      'id'         => 'career_figure_title',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'career_00',
   'title'         => esc_html__( 'Rekrutujemy na stanowiska', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-career.php' ),
));
   $page_group = $page->add_field( array(
      'id'          => 'career_00_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Stanowisko {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj stanowisko', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń stanowisko', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
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
         'name'       => esc_html__( 'Opis', 'cmb2' ),
         'id'         => 'text',
         'type'       => 'wysiwyg',
         'options' => array(
            'textarea_rows' => 20,
         ),
         'sanitization_cb' => false,
      ));

$page = new_cmb2_box( array(
   'id'            => 'career_content',
   'title'         => esc_html__( 'Treść pod listą', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-career.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'career_content_text',
      'type'       => 'wysiwyg',
      'options' => array(
         'textarea_rows' => 30,
      ),
      'sanitization_cb' => false,
   ));


//******************************************* 
// Contact page         
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'contact_00',
   'title'         => esc_html__( 'Pozostałe informacje', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on' => array( 'key' => 'page-template', 'value' => 'templates/template-contact.php' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'contact_00__text',
      'type'       => 'wysiwyg',
      'sanitization_cb' => false,
   ));



//******************************************* 
// Clients custom post fields      
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'clients_00',
   'title'         => esc_html__( 'Tagi - Rozwiązania', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Rozwiązania', 'cmb2' ),
      'id'         => 'clients_00_tag_02',
      'type'       => 'textarea',
      'desc'       => 'Wpisz rozwiązania kluczowe przez "," ',
      'attributes' => array(
         'rows' => 3, 
      ),
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'clients_00',
   'title'         => esc_html__( 'Treść', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
      'id'         => 'clients_00_subtitle',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'clients_01',
   'title'         => esc_html__( 'Sekcja 01 - Cytat ze zdjęciem', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Zdjęcie', 'cmb2' ),
      'id'         => 'clients_01_image',
      'type'       => 'file',
      'description' => 'Jeśli chesz tylko sekcję z tekstem pozostaw pole puste. Max szerokość 900px',
      'preview_size' => array(300, 200)
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'clients_01_text',
      'type'       => 'textarea',
      'attributes' => array(
         'rows' => 8, 
      ),
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'clients_02',
   'title'         => esc_html__( 'Sekcja 02 - Wyzwanie', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'clients_02_text',
      'desc'  =>  'Jeśli chesz usunąć sekcję, pozostaw pole puste',
      'type'       => 'wysiwyg',
      'options' => array(
         'textarea_rows' => 20,
      ),
      'sanitization_cb' => false,
   ));

   $page = new_cmb2_box( array(
      'id'            => 'clients_03',
      'title'         => esc_html__( 'Sekcja 03 - Cytat', 'cmb2' ),
      'object_types'  => array( 'clients' ),
   ));
      $page->add_field(array(
         'name'       => esc_html__( 'Treść', 'cmb2' ),
         'id'         => 'clients_03_text',
         'desc'  =>  'Jeśli chesz usunąć sekcję, pozostaw pole puste',
         'type'       => 'textarea',
         'attributes' => array(
            'rows' => 8, 
         ),
         'sanitization_cb' => false,
      ));

$page = new_cmb2_box( array(
   'id'            => 'clients_04',
   'title'         => esc_html__( 'Sekcja 04 - Rozwiązanie', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tekst po lewej', 'cmb2' ),
      'id'         => 'clients_04_group_left',
      'desc'  =>  'Jeśli chesz usunąć jakąś sekcję, pozostaw pole puste',
      'type'       => 'textarea',
      'attributes' => array(
         'rows' => 8, 
      ),
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Tekst po prawej', 'cmb2' ),
      'id'         => 'clients_04_group_right',
      'desc'  =>  'Jeśli chesz usunąć jakąś sekcję, pozostaw pole puste',
      'type'       => 'textarea',
      'attributes' => array(
         'rows' => 8, 
      ),
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Treść', 'cmb2' ),
      'id'         => 'clients_04_text',
      'desc'  =>  'Jeśli chesz usunąć jakąś sekcję, pozostaw pole puste',
      'type'       => 'wysiwyg',
      'options' => array(
         'textarea_rows' => 40,
      ),
      'sanitization_cb' => false,
   ));


$page = new_cmb2_box( array(
   'id'            => 'clients_05',
   'title'         => esc_html__( 'Sekcja 05 - Opinia', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Tekst', 'cmb2' ),
      'id'         => 'clients_05_text',
      'desc'  =>  'Jeśli chesz usunąć sekcję, pozostaw pole puste',
      'type'       => 'textarea',
      'attributes' => array(
         'rows' => 8, 
      ),
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Autor', 'cmb2' ),
      'id'         => 'clients_05_author',
      'type'       => 'text_medium',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Stanowisko', 'cmb2' ),
      'id'         => 'clients_05_position',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));

$page = new_cmb2_box( array(
   'id'            => 'clients_06',
   'title'         => esc_html__( 'Link', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Dowiedz się więcej o systemie', 'cmb2' ),
      'id'         => 'clients_btn_url',
      'type'       => 'text_url',
      'description' => 'Opcjonalnie',
      'sanitization_cb' => false,
   ));


$page = new_cmb2_box( array(
   'id'            => 'clients_result',
   'title'         => esc_html__( 'Sekcja 06 - Wynik', 'cmb2' ),
   'object_types'  => array( 'clients' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Zdjęcie w wyniku', 'cmb2' ),
      'id'         => 'clients_result_image',
      'desc'  =>  'Opcjonalnie',
      'type'       => 'file',
      'preview_size' => array(300, 200)
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Tekst', 'cmb2' ),
      'id'         => 'clients_result_text',
      'desc'  =>  'Opcjonalnie',
      'type'       => 'wysiwyg',
      'options' => array(
         'textarea_rows' => 20,
      ),
      'sanitization_cb' => false,
   ));


//******************************************* 
// Services custom post fields      
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'services_00',
   'title'         => esc_html__( 'Dadatkowa informacja', 'cmb2' ),
   'object_types'  => array( 'services' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Podtytuł', 'cmb2' ),
      'id'         => 'services_00_subtitle',
      'type'       => 'text',
      'description'   => 'Opcjonalnie',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Czy wiesz, że:', 'cmb2' ),
      'id'         => 'services_00_fact',
      'type'       => 'textarea',
      'attributes' => array(
         'rows' => 3, 
      ),
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Plik prezentacji', 'cmb2' ),
      'id'         => 'services_00_download',
      'type'       => 'file',
      'description'   => 'Opcjonalnie',
   ));
   $page_group = $page->add_field( array(
      'id'          => 'services_00_group',
      'type'        => 'group',
      'options'     => array(
      'group_title'    => esc_html__( 'Wypowiedź 0{#}', 'cmb2' ),
      'add_button'     => esc_html__( 'Dodaj wypowiedź', 'cmb2' ),
      'remove_button'  => esc_html__( 'Usuń wypowiedź', 'cmb2' ),
      'closed' => true,
      'sortable'       => true,
      'sortable'       => true,
      ),
   ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Treść', 'cmb2' ),
         'id'         => 'text',
         'type'       => 'textarea',
         'attributes' => array(
            'rows' => 4, 
         ),
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Teskt wypowiedzi', 'cmb2' ),
         'id'         => 'text_result',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Text na przycisku', 'cmb2' ),
         'id'         => 'btn_text',
         'type'       => 'text',
         'sanitization_cb' => false,
      ));
      $page->add_group_field( $page_group, array(
         'name'       => esc_html__( 'Link', 'cmb2' ),
         'id'         => 'url',
         'type'       => 'text_url',
         'sanitization_cb' => false,
      ));



//******************************************* 
// Accordion for policy privacy 
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'accordion_default',
   'title'         => esc_html__( 'Akordeon', 'cmb2' ),
   'object_types'  => array( 'page' ),
   'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-privacy.php'),
));
   $page_group = $page->add_field( array(
      'id'          => 'accordion_default_group',
      'type'        => 'group',
      'options'     => array(
         'group_title'    => esc_html__( 'Lista {#}', 'cmb2' ),
         'add_button'     => esc_html__( 'Dodaj listę', 'cmb2' ),
         'remove_button'  => esc_html__( 'Usuń listę', 'cmb2' ),
         'closed' => true,
         'sortable'       => true,
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
         'name'       => esc_html__( 'Treść', 'cmb2' ),
         'id'         => 'text',
         'type'       => 'wysiwyg',
         'options' => array(
            'textarea_rows' => 40,
         ),
         'sanitization_cb' => false,
      ));


//******************************************* 
// Experts custom post fields      
//*******************************************
$page = new_cmb2_box( array(
   'id'            => 'experts_taxonomy',
   'title'         => esc_html__( 'Opis profilu', 'cmb2' ),
   'object_types'  => array( 'experts' ),
));
   $page->add_field(array(
      'name'       => esc_html__( 'Imię i nazwisko', 'cmb2' ),
      'id'         => 'experts_taxonomy_name',
      'type'       => 'text',
      'sanitization_cb' => false,
   ));
   $page->add_field(array(
      'name'       => esc_html__( 'Stanowisko', 'cmb2' ),
      'id'         => 'experts_taxonomy_position',
      'type'       => 'text',
      'column' => array(
         'position' => 2,
         'name'     => 'Stanowisko',
      ),
      'sanitization_cb' => false,
   ));