<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: A better html entities handles £ sign
  *       @Params: $var
  *
  *    @returns: Escaped string containing pound signs
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

/**
  *  @Description: get theme color
  *       @Params: none
  *
  *     @returns: hex val of color
  */


if ( ! function_exists('my_theme_color'))
{
    function my_theme_color()
    {
      $CI =& get_instance();
      $CI->db->select('color');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $color = "";
      foreach ($query->result() as $row) 
      {
        $color = $row->color;
      }
      return $color;

    }   
}





 /**
  *  @Description: show the site logo
  *       @Params: params
  *
  *     @returns: returns
  */
if ( ! function_exists('my_show_logo'))
{
    function my_show_logo()
    {
      $CI =& get_instance();
      $CI->db->select('logo');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $logo = "";
      foreach ($query->result() as $row) 
      {
        $logo = $row->logo;
      }
      return $logo;

    }   
}

/**
  *  @Description: show the site title
  *       @Params: params
  *
  *     @returns: returns
  */
if ( ! function_exists('my_site_title'))
{
    function my_site_title()
    {
      $CI =& get_instance();
      $CI->db->select('site');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $site = "";
      foreach ($query->result() as $row) 
      {
        $site = $row->site;
      }
      return $site;

    }   
}