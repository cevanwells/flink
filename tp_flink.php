<?php
/*
Plugin Name: ThriftyPants Future Links (flink)
Version: 0.1.0
Plugin URI: http://thriftypants.github.com/flink
Description: Create links to posts that are not yet published. The flink won't become a link until the post actually becomes published, thus maintaining a good overall appearance, without having to return and add links later.
Author: Chris Wells
Author URI: http://recklesswells.com
License: BSD-2

Copyright (c) 2013, Chris Wells <chris@thriftypants.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without 
modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, 
  this list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice, 
  this list of conditions and the following disclaimer in the documentation 
  and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE 
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE 
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL 
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR 
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, 
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE 
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

/**
* Short code function
*/
function tp_flink_sc( $atts, $content="" ) {
	extract( shortcode_atts( array(
		'post_id' => '#'
	), $atts ) );
	
	$linked = get_post( $post_id );
	if ( $linked == null || $linked->post_status != "publish" ) return $content;
	else {
		return '<a href="'.get_permalink( $linked ).'" title="'.$linked->post_title.'">'.$content.'</a>';
	}
}

add_shortcode( 'flink', 'tp_flink_sc' );