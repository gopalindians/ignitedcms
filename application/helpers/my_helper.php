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
      return "#".$color;

    }   
}

/**
  *  @Description: get theme color
  *       @Params: none
  *
  *     @returns: hex val of color
  */


if ( ! function_exists('my_footer_color'))
{
    function my_footer_color()
    {
      $CI =& get_instance();
      $CI->db->select('footercolor');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $footercolor = "";
      foreach ($query->result() as $row) 
      {
        $footercolor = $row->footercolor;
      }
      return "#".$footercolor;

    }   
}

/**
  *  @Description: get theme color
  *       @Params: none
  *
  *     @returns: hex val of color
  */


if ( ! function_exists('my_footer_font_color'))
{
    function my_footer_font_color()
    {
      $CI =& get_instance();
      $CI->db->select('footerfontcolor');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $footerfontcolor = "";
      foreach ($query->result() as $row) 
      {
        $footerfontcolor = $row->footerfontcolor;
      }
      return "#".$footerfontcolor;

    }   
}


/**
  *  @Description: get theme body font
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_body_font'))
{
    function my_body_font()
    {
      $CI =& get_instance();
      $CI->db->select('font');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $font = "";
      foreach ($query->result() as $row) 
      {
        $font = $row->font;
      }
      return $font;

    }   
}

/**
  *  @Description: get footer1
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_footer1'))
{
    function my_footer1()
    {
      $CI =& get_instance();
      $CI->db->select('footer1');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $footer1 = "";
      foreach ($query->result() as $row) 
      {
        $footer1 = $row->footer1;
      }
      return $footer1;

    }   
}

/**
  *  @Description: get footer2
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_footer2'))
{
    function my_footer2()
    {
      $CI =& get_instance();
      $CI->db->select('footer2');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $footer2 = "";
      foreach ($query->result() as $row) 
      {
        $footer2 = $row->footer2;
      }
      return $footer2;

    }   
}

/**
  *  @Description: get footer3
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_footer3'))
{
    function my_footer3()
    {
      $CI =& get_instance();
      $CI->db->select('footer3');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $footer3 = "";
      foreach ($query->result() as $row) 
      {
        $footer3 = $row->footer3;
      }
      return $footer3;

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