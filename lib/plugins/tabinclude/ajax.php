<?php
/**
 * AJAX call handler for tabinclude plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Ikuo Obataya <I.Obataya@gmail.com>
 */
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_INC.'inc/init.php');
require_once(DOKU_INC.'inc/common.php');
require_once(DOKU_INC.'inc/pageutils.php');
require_once(DOKU_INC.'inc/auth.php');
require_once(DOKU_INC.'inc/template.php');
require_once(DOKU_INC.'inc/html.php');

//close session
session_write_close();

global $conf;
global $ID;
global $INPUT;

//fix for Opera XMLHttpRequests
$postData = http_get_raw_post_data();
if(!count($_POST) && !empty($postData)){
    parse_str($postData, $_POST);
}

$ID=$_POST['page'];
if(auth_quickaclcheck($ID) < AUTH_READ) die('No permission to read');

$link = $ID;
if(strpos($ID,":")===0) $link = substr($ID,1);
$ACT = 'show';
$ti = plugin_load('helper','tabinclude');
$goto = $ti->getLang('gotohere');
$pagelink = tpl_link(wl($link),$goto,'',true);

if($ti->getConf('goto_link_header')!=0)
echo '<div class="dwpl-ti-permalink-header">'.$pagelink.'</div>'.NL;

tpl_include_page($ID,true);

if($ti->getConf('goto_link_footer')!=0)
echo '<div class="dwpl-ti-permalink-footer">'.$pagelink.'</div>'.NL;
