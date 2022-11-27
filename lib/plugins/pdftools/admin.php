<?php
/**
 * PDF-Tools
 *
 * @license    GPL2
 * @author     Gero Gothe <gero.gothe@medizindoku.de>
 */
 
require_once(DOKU_INC . 'lib/plugins/pdftools/functions.php');

class admin_plugin_pdftools extends DokuWiki_Admin_Plugin {
     
    var $output = 'COMMAND: none';
    
    function getMenuText($language){
        return $this->getLang('admin menu');
    }

    /**
    * handle user request
    */
    function handle() {

        # Check if dw2pdf is activated	
        $list = plugin_list();
        if(in_array('dw2pdf',$list)===false) return;
        if (!isset($_REQUEST['cmd'])) return;   // first time - nothing to do


        if (!checkSecurityToken()) return;
        if (!is_array($_REQUEST['cmd'])) return;
     
        // verify valid values
        $command = key($_REQUEST['cmd']);


        if (strpos($command,"install:")===0) {
            $command = str_replace("install:","",$command);

            $this->output = "COMMAND: Install template '$command'";

            recurse_copy(DOKU_PLUGIN."/pdftools/tpl/$command",DOKU_PLUGIN."/dw2pdf/tpl/$command");
        }
        
        if (strpos($command,"erase:")===0) {
            $command = str_replace("erase:","",$command);

            $this->output = "COMMAND: Erase '$command'";

            $this->rrmdir(DOKU_PLUGIN."dw2pdf/tpl/$command");
        }
        

        # Upload templates

        if(strpos($command,"upload")===0) {
            $filename = $_FILES["zip_file"]["name"];
            $source = $_FILES["zip_file"]["tmp_name"];
            $type = $_FILES["zip_file"]["type"];

            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                    $okay = true;
                    break;
                } 
            }

            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if(!$continue) {
                msg("The file you are trying to upload is not a .zip file. Please try again.",-1);
                return;
            }

            $target_path = DOKU_PLUGIN."dw2pdf/tpl/".$filename;  // change this to the correct site path
            
            if(move_uploaded_file($source, $target_path)) {
                # Using Linix unzip on the command line
                ob_start();
                system("unzip -d '".DOKU_PLUGIN."dw2pdf/tpl/' $target_path");
                $retval = ob_get_contents();
                ob_end_clean();
                
                unlink($target_path);

                msg("Your .zip file was uploaded and unpacked into the <code>dw2pdf/tpl</code> directory.<br><br><pre>$retval</pre>",1);

            } else {
                msg("There was a problem with the upload. Could not move uploaded file to plugin directory.",-1);
            }
    
        }
        
    }
     
    /**
    * output appropriate html
    */
    function html() {
        global $ID;



        ptln('<form action="'.wl($ID).'" method="post" enctype="multipart/form-data">');        
     
        // output hidden values to ensure dokuwiki will return back to this plugin
        ptln('  <input type="hidden" name="do"   value="admin" />');
        ptln('  <input type="hidden" name="page" value="'.$this->getPluginName().'" />');
        formSecurityToken();

        $dw = dirList(DOKU_PLUGIN."/dw2pdf/tpl/");
        $pi = dirList(DOKU_PLUGIN."/pdftools/tpl/");

        echo '<h1>'.$this->getLang('admin title main').'</h1>';

        $p_time = filectime(__FILE__);
        
        # Upload form
        echo '<h2>'.$this->getLang('admin title upload').'</h2>';
        
        echo $this->getLang('text upload');
        
        echo '<label>'.$this->getLang('text zipfile').': <input type="file" name="zip_file" /></label>
            <input type="submit" name="cmd[upload]" value="'.$this->getLang('btn upload').'" /><br><br>';
        
        echo '<hr>';

        echo '<h2>'.$this->getLang('admin title manage').'</h2>';
        
        echo '<style>.pdftools_preview:hover{transform:scale(3);box-shadow:0px 0px 17px 12px rgba(0,0,0,0.53);}</style>';

        echo '<table>';

        # Installed templates
        foreach ($dw as $v) {
            ptln ('<tr>');
            ptln("<td style='background-color:lightgreen;font-weight:bold'>$v</td>");


            ptln ("<td>");
            if (in_array($v,$pi) !== false) {
                ptln('<input type="submit" name="cmd[install:'.$v.']"  value="'.($this->getLang('btn reinstall')).'" /><br><br>');
            }
            
            echo '<input type="submit" name="cmd[erase:'.$v.']"  value="'.($this->getLang('btn erase')).'" /><br><br>';
            
            # Zeitpunkt der Installation der Vorlage
            $m_time = filectime(DOKU_PLUGIN."/dw2pdf/tpl/$v/style.css");
            ptln("Installation: ".date("Y-m-d / H:i:s",$m_time));

            # Zeitpunkt, an der das Plugin bzw. das Template aktualisiert wurde, prüfen.
            # Aktualisierungshinweis geben, wenn dieser über dem Zeitpunkt der Installation liegt
            if (in_array($v,$pi) !== false) {
                $o_time = filectime(DOKU_PLUGIN."/pdftools/tpl/$v/style.css");
                if ($o_time>$m_time) ptln ("<br><br><span style='color:red'>".$this->getLang('text update')."<br>Update: ".date("Y-m-d / H:i:s",$o_time)."</span>");
            }
            ptln ("</td>");

            if (file_exists(DOKU_PLUGIN."/dw2pdf/tpl/$v/preview.png")) {
                ptln ('<td><img class="pdftools_preview" style="height:200px" src="'.DOKU_URL.'lib/plugins/dw2pdf/tpl/'.$v.'/preview.png"></td>');
            } else ptln("<td><i>".$this->getLang('text preview')."</i></td>");

            if (file_exists(DOKU_PLUGIN."/dw2pdf/tpl/$v/description.html")) {
                ptln ('<td>'.file_get_contents(DOKU_URL.'lib/plugins/dw2pdf/tpl/'.$v.'/description.html').'</td>');
            } else ptln("<td><i>".$this->getLang('text desc')."</i></td>");

            ptln ('</tr>');
        }

        # Volagen aus dem Vorlagenpaket, welche nicht installiert sind
        foreach ($pi as $v) {
            if (in_array($v,$dw) === false) {
                ptln ('<tr>');
            
                ptln ("<td style='background-color:linen;font-weight:bold'>$v</td>");
            
                ptln('<td>');
            
                ptln('<input type="submit" name="cmd[install:'.$v.']"  value="'.$this->getLang('btn install').'" /><br><br>');
            
                $m_time = filectime(DOKU_PLUGIN."/pdftools/tpl/$v/style.css");
                ptln(date("Y-m-d / H:i:s",$m_time));
                ptln('</td>');
            
                if (file_exists(DOKU_PLUGIN."/pdftools/tpl/$v/preview.png")) {
                    ptln ('<td><img class="pdftools_preview" style="height:200px" src="'.DOKU_URL.'lib/plugins/pdftools/tpl/'.$v.'/preview.png"></td>');
                } else ptln("<td><i>".$this->getLang('text preview')."</i></td>");
                
                if (file_exists(DOKU_PLUGIN."/pdftools/tpl/$v/description.html")) {
                ptln ('<td>'.file_get_contents(DOKU_URL.'lib/plugins/pdftools/tpl/'.$v.'/description.html').'</td>');
                } else ptln("<td><i>".$this->getLang('text desc')."</i></td>");
            
                ptln ('</tr>');
            }
        }

        ptln ('</table>');
        ptln('</form>');
        
        ptln('<br><code>'.htmlspecialchars($this->output).'</code>');

    }
    
    # From: https://www.php.net/manual/de/function.rmdir.php
    # recursively erase a directory with its subdirectories
    function rrmdir($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    rrmdir($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }


}

