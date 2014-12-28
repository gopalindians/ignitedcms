<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: A better html entities handles £ sign
  *       @Params: $var
  *
  *  	 @returns: Escaped string containing pound signs
  */
if ( ! function_exists('my_html_escape'))
{
    function my_html_escape($var)
    {
       $tmp = htmlentities($var,ENT_QUOTES,"UTF-8");
       
       return $tmp; 

    }   
}
/**
  *  @Description: Pretty up the date format
  *       @Params: datestamp
  *
  *     @returns: pretty date
  */


if ( ! function_exists('my_pretty_date'))
{
    function my_pretty_date($var)
    {
       //use ci active record
       return date('j M Y g:i A',strtotime($var));

    }   
}