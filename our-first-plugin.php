<?php 



/**
 * Plugin Name: Our First Plugin
 * Plugin URI: https://example.com
 * Author: Seemol Chakroborit
 * Author URI: #
 * Description: Description here.
 * Version: 1.0.0
 * License: GPLv2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html 
 * 
 */


require_once(__DIR__ . "/vendor/autoload.php");

use Carbon\Carbon;


class Our_First_Plugin {
    private static $instance = null;
    function __construct() {
        add_filter("the_title",array($this, "charge_title_case"));
        add_filter("get_the_date", array($this, "human_readable_date"));
    }

     public static function get_instance() {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;

    }

   public function charge_title_case ($title) {
            return strtoupper($title);
    }

    public function human_readable_date ($date){
        $date = Carbon::parse($date);

        return $date->diffForHumans();

    }
}

Our_First_Plugin::get_instance();



