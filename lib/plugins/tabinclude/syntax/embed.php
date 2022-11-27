<?php
/*
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Ikuo Obataya (i.obataya[at]gmail.com)
 */
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
@require_once(DOKU_PLUGIN.'syntax.php');
/**
 * Tab plugin
 */
class syntax_plugin_tabinclude_embed extends DokuWiki_Syntax_Plugin{
  function __construct(){
      $this->helper = plugin_load('helper','tabinclude');
  }
  function getType(){ return 'substition'; }
  function getSort(){ return 158; }
  function connectTo($mode){$this->Lexer->addSpecialPattern('\{\{tabembed.+?[^}]*\}\}',$mode,'plugin_tabinclude_embed');}
 /**
  * handle syntax
  */
  function handle($match, $state, $pos, Doku_Handler $handler){
      $match = substr($match,10,-2); // strip markup
      return $this->helper->getTabPages($match);
  }
 /**
  * Render tab control
  */
  function render($mode, Doku_Renderer $renderer, $data) {
      list($state, $tabs,$init_page_idx,$class) = $data;
      if ($mode=='xhtml'){
          $this->helper->renderEmbedTabs($renderer,$tabs,$init_page_idx,$class);
          return true;
      }else if($mode=='odt'){
          $this->helper->getOdtHtml($renderer,$tabs);
          return true;
      }
      return false;
  }
}
?>
