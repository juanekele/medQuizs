<?php

/*Modificar el estilo del bloque aggregator*/
function medQuizs_aggregator_block_item($item, $feed = 0) {

  $fecha_autor = $item["item"]->author;
  $split=explode("|", $fecha_autor);

  $fecha = $split[0];
  $autor = $split[1];

  $titleIni=$item["item"]->title;
  $splitTitle=explode("-", $titleIni);
  $title=$splitTitle[1];

  $output = '';

  // Display the external link to the item.
  $output .='<span class="icon"></span>';
  $output .='<div>';
  $output .='<a href="'.check_url($item["item"]->link).'" target="_blank">';
  $output .='<span class="titulo">'.substr(check_plain($title),0,75).' [...]</span>';
  $output .='</a>';
  $output .='<p>';
  $output .='<span class="fecha">'.check_plain($fecha).'</span>';
  $output .='<span class="categoria">'.check_plain($autor).'</span>';
  $output .='</p>';
  $output .='</div>';
  


  return $output;
}
function medQuizs_theme()
{
  return array(
    'user_profile_form' => array(
      // Forms always take the form argument.
      'arguments' => array('form' => NULL),
      'render element' => 'form',
      'template' => 'templates/user-profile-edit',
    ),
  );
}
/*Template file naming with alias*/
function medQuizs_preprocess_page(&$vars) {
  if ($node = menu_get_object()) {
    $alias = drupal_get_path_alias("node/$node->nid");

    // Remove slashes from the potential filename
    $clean_alias = str_replace('/', '__', $alias);

    $vars['theme_hook_suggestions'][] = 'page__node__' . $clean_alias;
  }

  if (!is_null($node)) {
    $alias = drupal_get_path_alias("node/$node->nid");

    if($alias == 'tools' || $alias == 'conference'){
      $clean_alias = str_replace('/', '__', $alias);
      $vars['theme_hook_suggestions'][] =  'page__node__' . $clean_alias;
    }
  }
}

?>
