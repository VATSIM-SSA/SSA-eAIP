<?php
/**
 * PDF-Tools
 *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 */
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_pdftools extends DokuWiki_Syntax_Plugin {

    private $dw2pdf_inst = false;

    function getType(){return 'substition';}

    function getSort(){return 59;}

  	# Checks if dw2pdf is installed/activated
  	function __construct() {
  		$list = plugin_list();
  		if(in_array('dw2pdf',$list)) {
  			$this->dw2pdf_inst = true;
  		}
  	}

    # Returns list of installed dw2pdf-templates
    function templateList(){
        if ($this->dw2pdf_inst) {

            $path = DOKU_PLUGIN."/dw2pdf/tpl/";

            $dirs = array();

            // directory handle
            $dir = dir($path);

            while (false !== ($entry = $dir->read())) {
                if ($entry != '.' && $entry != '..') {
                    if (is_dir($path . '/' .$entry)) {
                        $dirs[] = $entry;
                    }
                }
            }

            return $dirs;
        }
        return false;
    }

    # Add patterns
    function connectTo($mode) {
        $this->Lexer->addEntryPattern('<pdf (?=.*?>)',$mode,'plugin_pdftools');
        $this->Lexer->addSpecialPattern('<etikett>',$mode,'plugin_pdftools');
		$this->Lexer->addSpecialPattern('<abstand1>',$mode,'plugin_pdftools');		
		$this->Lexer->addSpecialPattern('<abstand2>',$mode,'plugin_pdftools');
		$this->Lexer->addSpecialPattern('<abstand3>',$mode,'plugin_pdftools');
		$this->Lexer->addSpecialPattern('<quer1>',$mode,'plugin_pdftools');
		$this->Lexer->addSpecialPattern('<quer2>',$mode,'plugin_pdftools');
		$this->Lexer->addSpecialPattern('<quer3>',$mode,'plugin_pdftools');
    }


    function postConnect() {
      $this->Lexer->addExitPattern('>','plugin_pdftools');
    }


    /* Handle the match */
    function handle($match, $state, $pos, Doku_Handler $handler){	
		return array($state,$match);
    }


    /* Create output */
    function render($format, Doku_Renderer $renderer, $data) {
        global $ID;
        if($format != 'xhtml') return false;

		$match = $data[0];
		list($state, $match) = $data;
		
		if ($match=='<abstand1>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=1">';return true;}
		if ($match=='<abstand2>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=3">';return true;}
		if ($match=='<abstand3>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=5">';return true;}
		
		if ($match=='<quer1>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=1&q">';return true;}
		if ($match=='<quer2>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=3&q">';return true;}
		if ($match=='<quer3>') {$renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/line.php?h=5&q">';return true;}
		

        if ($match=='<etikett>') {
          $renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/etikett.png">';
          return true;
        }

        if (!$this->dw2pdf_inst) {
    			$renderer->doc .= '<i class="noprint">Plugin <u>dw2pdf</u> benötigt.</i><br>';
    		} else {
          if ($state == DOKU_LEXER_UNMATCHED) {
              $t=$this->templateList();
              
              # The tag "quer" creates landscape orientation
              if (strpos($match,"quer")>0) {
				  $quer = '&orientation=landscape';
				  $match = str_replace("quer","",$match);
				  $match = trim($match);
			  } else $quer = '';
              
              if (!in_array($match,$t)) {
                  $msg = "Vorlage '<u>$match</u>' existiert nicht. Bitte einer der folgende Vorlagen verwenden:<br>";
                  $msg .= '<b>'.implode(", ",$t).'</b>';

                  $renderer->doc .= "<div class='noprint boxed'>$msg</div>";
              } else {
                  $renderer->doc .= "<div class='noprint'>
                                    <a href='doku.php?id=$ID&do=export_pdf&toc=0&tpl=$match$quer&rev=".($_GET['rev'])."'>";
                  $renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/img/pdfbutton.php?text='.$match.'"></a></div>';
              }
          }

        }

        return true;

    } # function render


}

//Setup VIM: ex: et ts=4 enc=utf-8 :
