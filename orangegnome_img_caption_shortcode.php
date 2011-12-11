<?php
/*
Plugin Name: Improved HTML5 Caption
Description: Removes inline styling from wp-caption and changes to HTML5 figure/figcaption 
Version: 2.0.1
Author: Brent Lineberry
Author URI: http://www.orangegnome.com/
*/

/*  Copyright 2011 Brent Lineberry (email: brent at orangegnome.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_filter('img_caption_shortcode', 'orangegnome_img_caption_shortcode_filter',10,3);

/**
 * Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
 *
 **/
function orangegnome_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
	. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
?>