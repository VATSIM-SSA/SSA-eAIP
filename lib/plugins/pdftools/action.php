<?php
/**
 * PDF-Tools
 *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 */


# must be run within Dokuwiki
if(!defined('DOKU_INC')) die();


class action_plugin_pdftools extends DokuWiki_Action_Plugin {

    public function register(Doku_Event_Handler $controller) {

        $controller->register_hook('PLUGIN_DW2PDF_REPLACE', 'BEFORE', $this, 'replacement_before', null, 100);
        $controller->register_hook('TPL_CONTENT_DISPLAY', 'AFTER',  $this, 'printbutton');

    }

    function printbutton(Doku_Event $event, $param) {
        global $conf;
        global $ID;
        
        if ($ID=="start") return;
        
        $show_button = !$this->getConf("print hide");
        $hide_on_start = $this->getConf("print hide on start");
        
        if ($hide_on_start==true && 
            strpos($ID,'start')!==false &&
           (strlen($ID)-strpos($ID,'start'))==5) $show_button = false;
        #echo $ID;
        #var_dump($hide_on_start);
        
        if ($show_button) {
            
            # Check for local <pdf>-Button FUNKTIONIERT noch nicht
            $page = rawwiki($ID);
            $pdf_button = preg_match('/\<pdf (.*?)\>/', $page, $matches);
        
            echo '<div class="pdftools_print_area">';
            echo '<div class="pdftools_print_icon"><img src="'.DOKU_URL.'lib/plugins/pdftools/img/printer.png" alt="Print"></div>';
            
            echo '<div class="pdftools_templates">';
                for ($c=1;$c<5;$c++) {
                    $d = strval($conf['plugin']['pdftools']['print template'.$c]);
                    if (strlen($d)>1){
                        $t = explode(';',$d);
                        
                        if ($pdf_button && $t[0] == $matches[1]){
                            $chosen="2";
                            $match=true;
                        } else {$chosen="";$match=false;}
                        
                        echo "<i>".($t[1])."</i><span class='pdftools_printButton$chosen' onclick=\"location.href='doku.php?id=".$ID."&do=export_pdf&toc=0&tpl=".($t[0])."&rev=".($_GET['rev'])."'\"><a style='color:white' href='doku.php?id=".$ID."&do=export_pdf&toc=0&tpl=".($t[0])."&rev=".($_GET['rev'])."'>".ucfirst($t[0])."</a></span><hr>";
                    }
                }
            echo '</div>';
                
            echo '</div>';
        }
    }
    
    function replacement_before(Doku_Event $event, $param) {
		global $conf;
		global $INFO;

        $event->data['replace']['@COMPANY@'] = $conf['plugin']['pdftools']['company'];	
        $event->data['replace']['@AUTHOR@'] = $INFO['meta']['contributor'][$INFO['user']];

        # Compatibility with approve-plus-plugin: if not installed, the @APPROVER@-Tag is "removed"
        if (!isset($event->data['replace']['@APPROVER@'])) $event->data['replace']['@APPROVER@'] = '';

        # Remove Approve-Tag also, if author = approver
        if (strpos($event->data['replace']['@APPROVER@'],$event->data['replace']['@AUTHOR@']) > 0) $event->data['replace']['@APPROVER@'] = '';

	}
   
}

//Setup VIM: ex: et ts=4 enc=utf-8 :