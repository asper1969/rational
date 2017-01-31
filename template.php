<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function rational_preprocess_maintenance_page(&$vars) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  // rational_preprocess_html($vars);
  // rational_preprocess_page($vars);

  // This preprocessor will also be used if the db is inactive. To ensure your
  // theme is used, add the following line to your settings.php file:
  // $conf['maintenance_theme'] = 'rational';
  // Also, check $vars['db_is_active'] before doing any db queries.
}

/**
 * Implements hook_modernizr_load_alter().
 *
 * @return
 *   An array to be output as yepnope testObjects.
 */
/* -- Delete this line if you want to use this function
function rational_modernizr_load_alter(&$load) {

}

/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_html(&$vars) {

}

/**
 * Override or insert variables into the page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_page(&$vars) {

}

/**
 * Override or insert variables into the region templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_region(&$vars) {

}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_block(&$vars) {

}
// */

/**
 * Override or insert variables into the entity template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_entity(&$vars) {

}
// */

/**
 * Override or insert variables into the node template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_node(&$vars) {
  $node = $vars['node'];
}
// */

/**
 * Override or insert variables into the field template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("field" in this case.)
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_field(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the comment template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
}
// */

/**
 * Override or insert variables into the views template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function rational_preprocess_views_view(&$vars) {
  $view = $vars['view'];
}
// */


/**
 * Override or insert css on the site.
 *
 * @param $css
 *   An array of all CSS items being requested on the page.
 */
/* -- Delete this line if you want to use this function
function rational_css_alter(&$css) {

}
// */

/**
 * Override or insert javascript on the site.
 *
 * @param $js
 *   An array of all JavaScript being presented on the page.
 */
/* -- Delete this line if you want to use this function
function rational_js_alter(&$js) {

}
// */

function rational_commerce_currency_format($amount, $currency_code, $object = NULL, $convert = TRUE) {
  // First load the currency array.
  $currency = commerce_currency_load($currency_code);

  // Then convert the price amount to the currency's major unit decimal value.
  if ($convert == TRUE) {
    $amount = commerce_currency_amount_to_decimal($amount, $currency_code);
  }

  // Invoke the custom format callback if specified.
  if (!empty($currency['format_callback'])) {
    return $currency['format_callback']($amount, $currency, $object);
  }

  // Format the price as a number.
  $price = number_format(commerce_currency_round(abs($amount), $currency), NULL, $currency['decimal_separator'], $currency['thousands_separator']);

  // Establish the replacement values to format this price for its currency.
  $replacements = array(
      '@code_before' => $currency['code_placement'] == 'before' ? $currency['code'] : '',
      '@symbol_before' => $currency['symbol_placement'] == 'before' ? $currency['symbol'] : '',
      '@price' => $price,
      '@symbol_after' => $currency['symbol_placement'] == 'after' ? $currency['symbol'] : '',
      '@code_after' => $currency['code_placement'] == 'after' ? $currency['code'] : '',
      '@negative' => $amount < 0 ? '-' : '',
      '@symbol_spacer' => $currency['symbol_spacer'],
      '@code_spacer' => $currency['code_spacer'],
  );

  return trim(t('@code_before@code_spacer@negative@symbol_before@price@symbol_spacer@symbol_after@code_spacer@code_after', $replacements));
}

function rational_preprocess_commerce_cart_block(&$vars) {


  $orderWrapper = entity_metadata_wrapper('commerce_order', $vars['order']);
  $quantity = commerce_line_items_quantity($orderWrapper->commerce_line_items, commerce_product_line_item_types());
  $total = $orderWrapper->commerce_order_total->value();
  $totalText = webmaster_commerce_currency_format($total['amount'], $total['currency_code']);

  $linkOptions = array('attributes' => array('title' => 'Перейти в корзину'));

  $result = '<div class="w-cart">';
  $result .= '<div class="cart-link">' . l(t('Корзина'), 'cart', $linkOptions) . '</div>';

  $result .='<div class="w-count"><div class="count-total">' . $quantity . ' шт.</div>';
  $result .= '<div class="price-total">' . $totalText . ' тг.</div>';
  $result .= '</div></div>';
  $vars['contents_view'] = $result;
}

function rational_commerce_cart_empty_block() {


  $linkOptions = array('attributes' => array('title' => 'Перейти в корзину'));
  $result = '<div class="w-cart empty">';
  $result .= '<div class="cart-link">' . l(t('Корзина'), 'cart', $linkOptions) . '</div>';
  $result .='<div class="w-count"><div class="count-total"><span>0</span></div>';
  $result .= '<div class="price-total"><span>0</span></div>';
  $result .= '</div></div>';

  return $result;
}

function rational_form_comment_form_alter(&$form, &$form_state, $form_id) {

  if(isset($form['author']['homepage'])) hide($form['author']['homepage']);
  $form['actions']['submit']['#value'] = t('Отправить');
}

function rational_preprocess_comment(&$variables) {
  unset($variables['content']['links']['comment']['#links']['comment-reply']); //удалить ссылку "Ответить"
  $variables['author'] = strip_tags($variables['author']);
}


function rational_preprocess_username(&$vars) {
  $vars['name'] = $vars['name_raw'];
}
