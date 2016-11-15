<?php
/*
Plugin Name: Conversion Squares
Description: Hoverable Coversion Squares
Version: .1
Author: mpw
Text Domain: conversion_squares
*/

function load_plugin_styles () {
  wp_register_style( 'conversion-square-style', plugins_url( '/squares.css', __FILE__ ), array(),'0.1' );
}
add_action( 'wp_enqueue_scripts', 'load_plugin_styles' );

function conv_square ( $atts ) {
  $atts = shortcode_atts(
    array(
      'icon' => '',
      'text' => '',
      'link' => '',
      'link_text' => '',
      'id' => '',
      'class' => ''
    ), $atts, 'conversion_square' );

  $cont = '';
  $cont .= '<div class="conversion-square ';
  if ( !empty($atts['class']) ) {
    $cont .= $atts['class'];
  }
  $cont .= '"';
  if ( !empty($atts['id']) ) {
    $cont .= 'id="' . $atts['class'] . '"';
  }
  $cont .= '<div class="icon-container">
    <img src="'. $atts['icon'] .'" class="aligncenter "></div>';
  $cont .= '<div class="item-text">
    <h3 class="item-title">' . $atts['text'] . '</h3>
    </div>';
$cont .= '<div class="item-button">
    <a href="'.  $atts['link'] . '" class="conv-button">' . $atts['link_text'] . '</a>
    </div>';

  $cont .= '</div>';

  return $cont;
}

add_shortcode( 'conversion_square', 'conv_square' );
