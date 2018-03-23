<?php
/**
 * get_option wrapper
 *
 * @uses   get_option()
 *
 * @param  string $name option   name
 * @param  mixed  $default       default value
 * @param  bool   $stripslashes  whether to filter the result with stripslashes()
 *
 * @return mixed                 option value
 */
function wpv_get_option($name, $default = null, $stripslashes = true) {
    global $wpv_defaults;

    $default_arg = $default;
    if ($default === null) {
        $default = isset($wpv_defaults[$name]) ? $wpv_defaults[$name] : false;
    }

    $option = get_option('wpv_' . $name, $default);

    if (is_string($option)) {
        if ($option === 'true')
            return true;

        if ($option === 'false')
            return false;

        if ($stripslashes && $option !== $default_arg)
            return stripslashes($option);
    }

    return $option;
}

/**
 * Same as wpv_get_option, but converts '1' and '0' to booleans
 *
 * @uses   wpv_get_option()
 *
 * @param  string $name option   name
 * @param  mixed  $default       default value
 * @param  bool   $stripslashes  whether to filter the result with stripslashes()
 *
 * @return mixed                 option value
 */
function wpv_get_optionb($name, $default = null, $stripslashes = true) {
    $value = wpv_get_option($name, $default, $stripslashes);

    if ($value === '1' || $value === 'true')
        return true;

    if ($value === '0' || $value === 'false')
        return false;

    return $value;
}

/**
 * Map an accent name to its value
 *
 * @param  string $color accent name
 * @return string        hex color or the input string
 */
function wpv_sanitize_accent($color) {
    if (preg_match('/accent(?:-color-)?(\d)/i', $color, $matches)) {
        $num = (int) $matches[1];
        $color = wpv_get_option("accent-color-$num");
    }

    return $color;
}

function wpv_sub_shortcode($name, $content, &$params, &$sub_contents) {
    if (!preg_match_all("/\[$name\b(?P<params>.*?)(?:\/)?\](?:(?P<contents>.*?)\[\/$name\])?/s", $content, $matches)) {
        return false;
    }

    $params = array();
    $sub_contents = $matches['contents'];

    // this is from wp-includes/formatting.php
    /* translators: opening curly double quote */
    $opening_quote = _x('&#8220;', 'opening curly double quote', 'default');
    /* translators: closing curly double quote */
    $closing_quote = _x('&#8221;', 'closing curly double quote', 'default');
    /* translators: double prime, for example in 9" (nine inches) */
    $double_prime = _x('&#8243;', 'double prime', 'default');

    foreach ($matches['params'] as $param_str) {
        $param_str = str_replace(array($opening_quote, $closing_quote, $double_prime, '&#8220;', '&#8221;'), '"', $param_str);
        $params[] = shortcode_parse_atts($param_str);
    }

    return true;
}

class WPV_Accordion {
	public function __construct() {
		add_shortcode('accordion', array(__CLASS__, 'shortcode'));
	}

	public static function shortcode($atts, $content = null, $code = 'accordion') {
		extract(shortcode_atts(array(
			'closed_bg' => 'accent1',
			'title_color' => 'accent8',
			'collapsible' => 'true',
		), $atts));

		if (!wpv_sub_shortcode('pane', $content, $params, $sub_contents))
			return do_shortcode($content);

		wp_enqueue_script('jquery-ui-accordion');

		$title_tag = apply_filters('wpv_accordion_title_tag', 'h4');

		$closed_bg = wpv_sanitize_accent($closed_bg);
		$title_color = wpv_sanitize_accent($title_color);

		global $wpv_accordions_shown;
		if(!isset($wpv_accordions_shown))
			$wpv_accordions_shown = 0;

		$wpv_accordions_shown++;

		$output = '';
		foreach($sub_contents as $i=>$sc) {
			$tab_class = '';
			$bgimage = '';
			if(isset($params[$i]['background_image']) && !empty($params[$i]['background_image'])) {
				$bgimage = 'background-image: url("'.$params[$i]['background_image'].'");';
				$tab_class .= ' has-bg';
			}

			$output .= '<li class="pane-wrapper" style="'.esc_attr($bgimage).'">
					<'.$title_tag.' class="tab'.$tab_class.'"><div class="inner">' . $params[$i]['title'] . '</div></'.$title_tag.'>
					<div class="pane"><div class="inner">' . do_shortcode(trim($sc)) . '</div></div>
					</li>';
		}

		$style = '<style>.wpv-accordion-'.$wpv_accordions_shown.' .tab .inner { background-color: '.$closed_bg.'; color: '.$title_color.'; }</style>';

		return '<div class="wpv-accordion-wrapper wpv-accordion-'.$wpv_accordions_shown.'"><ul class="wpv-accordion" data-collapsible="'.esc_attr($collapsible).'">' . $output . '</ul>'.$style.'</div>';
	}
}

new WPV_Accordion;
