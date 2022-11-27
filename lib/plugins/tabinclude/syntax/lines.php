<?php
/*
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Satoshi Sahara (sahara.satoshi[at]gmail.com
 * @author     Ikuo Obataya (i.obataya[at]gmail.com)
 */
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
@require_once(DOKU_PLUGIN.'syntax.php');
/**
 * Yet another sytax component for Tab plugin,
 * provided by satoshi.sahara@gmail.com
*/
class syntax_plugin_tabinclude_lines extends DokuWiki_Syntax_Plugin{
    function __construct(){
        $this->helper = plugin_load('helper','tabinclude');
    }
    function getType(){ return 'substition'; }
    function getSort(){ return 158; }
    function connectTo($mode){
        $this->Lexer->addSpecialPattern('<tabbed.+?</tabbed>', $mode, 'plugin_tabinclude_lines');
    }
    /**
     * handle syntax
     */
    function handle($match, $state, $pos, Doku_Handler $handler){
        $match = substr($match,7,-9);  // strip markup
        return $this->helper->getTabPages($match,false);
    }
    /**
     * Render tab control
     */
    function render($mode, Doku_Renderer $renderer, $data) {
        list($state, $tabs,$init_page_idx,$class) = $data;
        if ($mode=='xhtml'){
            $this->helper->renderTabsHtml($renderer,$tabs,$init_page_idx,$class);
            return true;
        }else if($mode=='odt'){
            $this->helper->getOdtHtml($renderer,$tabs);
            return true;
        }
        return false;
    }
}
