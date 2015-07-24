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
  *  @Description: get username
  *       @Params: none
  *
  *     @returns: username or string "Profile" if none set
  */


if ( ! function_exists('my_username'))
{
    function my_username()
    {
        //check if session is set
        $CI =& get_instance();
        if($CI->session->userdata('userid') !== FALSE)
        {
          $userid = $CI->session->userdata('userid');

          $CI =& get_instance();
          $CI->db->select('name');
          $CI->db->from('user');
          $CI->db->where('id', $userid);
          $CI->db->limit(1);

          $query = $CI->db->get();
          $name = "";
          foreach ($query->result() as $row) 
          {
            $name = $row->name;
          }
          return $name;
        }
        else{
          return "Profile";
        }
    }   
}


/**
  *  @Description: renders user dashboard depending on permissions
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_render_dashboard'))
{
    function my_render_dashboard()
    {
        //check if session is set
        $CI =& get_instance();

        //pretty up the output
        $CI->load->helper('inflector');

        $userid = $CI->session->userdata('userid');

        $CI->load->model('Stuff_permissions');
        $list = $CI->Stuff_permissions->get_permissions($userid);

        //echo $list;
        //strip the last comma
        $list = trim($list,",");

        $access = explode(",", $list);



        foreach ($access as $key) {
          //get the icon
          $icon = $CI->Stuff_permissions->get_icon($key);

          echo("<a href=". site_url($key).">
                  <div class='col-sm-4 my-pad-top'>
                    <div class='my-blk'>
                       <i class='$icon'></i>
                       <div class='my-info'>".humanize($key)."</div>

                    </div>
                     
                  </div>
                </a>");


        }

        
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

/**
  *  @Description: show the Group Permission name
  *       @Params: role id
  *
  *     @returns: returns
  */
if ( ! function_exists('my_role'))
{
    function my_role($id)
    {
      $CI =& get_instance();
      $CI->db->select('groupName');
      $CI->db->from('permission_groups');
      $CI->db->where('groupID', $id);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $groupName = "";
      foreach ($query->result() as $row) 
      {
        $groupName = $row->groupName;
      }
      return $groupName;

    }   
}



/**
  *  @Description: show the page name
  *       @Params: params
  *
  *     @returns: returns
  */
if ( ! function_exists('my_page_name'))
{
    function my_page_name($id)
    {
      $CI =& get_instance();
      $CI->db->select('name');
      $CI->db->from('pages');
      $CI->db->where('id', $id);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $name = "";
      foreach ($query->result() as $row) 
      {
        $name = $row->name;
      }
      return $name;

    }   
}