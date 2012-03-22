<?php

/*
 * Plugin Name: Bp Activity Smilies
 * Version: 1.0
 * Author: Brajesh Singh
 * Plugin URI: http://buddydev.com
 * Description: Allow Users to add smiley in activity posts by clicking on icons
 */

class BpActivitySmilies{
    private static  $instance;
    private function __construct(){
      add_action('wp_enqueue_scripts',  array($this,'load_js'));  
      add_action('bp_after_activity_post_form',array($this,'list_smiley'));  
      add_action('bp_activity_entry_comments',array($this,'list_smiley'));  
    }
    
    function get_instance(){
        if(!isset (self::$instance))
                self::$instance=new self();
        return self::$instance;
    }
    function list_smiley(){
        global $wpsmiliestrans;
        $html='';
        
        foreach($wpsmiliestrans as $smiley=>$smiley_img){
            $srcurl= includes_url("images/smilies/$smiley_img");
            $html.="<img src='$srcurl' data-code='$smiley' class='bp-activity-smiley' /> ";
        }
        echo $html;
    }
    
   function replace_with_icon(){
       
   }
  
    
    function load_js(){
      $url= plugin_dir_url(__FILE__).'activity-smilies.js';
     
        wp_enqueue_script('activity-smiley-js',$url,array('jquery'));
    }
    
    function load_css(){
        //nothing here at the moment
    }
    
     
}

 BpActivitySmilies::get_instance();
?>