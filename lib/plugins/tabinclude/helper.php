<?php
// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

class helper_plugin_tabinclude extends DokuWiki_Plugin {
    var $sort = ''; // sort key
    /**
     * Constructor
     */
    function helper_plugin_tabinclude() {
        global $conf;
        // load sort key from settings
        $this->sort = $this->getConf('sortkey');
    }

    function getMethods() {
        $result = array();
        $result[] = array(
                'name'   => 'renderTabsHtml',
                'desc'   => 'Render tabs HTML of DokuWiki pages',
                'params' => array(
                        'renderer'         => 'renderer',
                        'tabs'             => array('page'=>'page ID','title'=>'page title','error'=>'error msg'),
                        'init_page_idx'    => 'int',
                        'class (optional)' => 'string'),
                'return' => array('html' => 'string'),
        );
        $result[] = array(
                'name'   => 'getOdtHtml',
                'desc'   => 'Render tabs ODT of DokuWiki pages',
                'params' => array(
                        'renderer' => 'renderer',
                        'tabs'     =>  array('page'=>'page ID','title'=>'page title','error'=>'error msg'),),
                        'return' => array('odt' => 'string'),
        );

        return $result;
    }


    /**
     * Get Tabpages information
     */
    function getTabPages($match,$isInline=true){
        global $ID;
        $page_delim = $isInline?",":"\n";
        list($class, $match) = explode('>', $match); // extract class
        $class=trim($class);
        $pages = explode($page_delim,$match); // extract page names
        $sz = count($pages);
        if($sz==0) return array();
        $sz = count($pages);

        // loop for tabs
        $tabs = array();
        $init_page_idx = 0; // initial page index
        for($i=0;$i<$sz;$i++){
            // Put page ID into $page
            // Put text in tab into $title
            $title='';
            $page = trim($pages[$i]);

            if($isInline){
                // Inline description
                if($page[0]=='*'){
                    $init_page_idx=count($tabs);
                    $page = substr($page,1);
                }
                $items = explode('|',$page);
                if(count($items)>1){
                    list($page,$title)=$items;
                }
            }else{
                // Lines description

                if (preg_match('/\[\[(.+?)\]\]/', $page, $match)){
                    // Pagelist like syntax,
                    // each tabbed page is provided as DokuWiki unordered list syntax:
                    // *[[id|title]] or **[[id|title]].
                    $p = substr($page,0,strpos($page,'[['));
                    $page = $match[1];
                    if($page=='') continue;
                    if (strpos($p,'*') !== strrpos($p,'*')) {
                        // multiple '*' means initial page!!
                        $init_page_idx = count($tabs);
                    }
                } else {
                    // original syntax
                    $asterisk = false;
                    while($page[0]=='*'){
                        $page = substr($page,1);
                        $asterisk = true;
                    }
                    if($page=='') continue;
                    if($asterisk) $init_page_idx = count($tabs);
                }
                list($page, $title) = explode('|', $page, 2);
                list($page ,$section) = explode('#', $page, 2);
                if($page=='') continue;
            }

            // Build tab title
            resolve_pageid(getNS($ID),$page,$exists);
            if($title==''){
                // Show first heading as tab name ?
                if($this->getConf('use_first_heading')){
                    $meta_title= p_get_metadata($page,'title');
                    if($meta_title!=''){
                        $title = $meta_title;
                    }
                }

                // Show namespace(s) of page name in tab ?
                if($title==''){
                    $title = $this->getConf('namespace_in_tab')?$page:noNS($page);
                }
            }

            // Check errors
            if(page_exists($page)==false){
                // page in tab exists ?
                $tabs[] = array('error'=>tpl_link(wl($page),$page,'',true).' - '.$this->getLang('error_notfound'));
            }else if($ID==$page){
                // page is identical to parent ?
                $tabs[] = array('error'=>$this->getLang('error_parent'));
            }else{
                $tabs[] = array('page'=>hsc($page),'title'=>hsc($title));
            }
        }
        return array($state,$tabs,$init_page_idx,hsc(trim($class)));
    }

    /**
     * Get AJAX tab XHTML from pagenames
     */
    function renderTabsHtml(&$renderer,$tabs,$init_page_idx,$class='') {
        // render
        if($class) $class=' class="'.$class.'"';
        $html.= '<div id="dwpl-ti-container"'.$class.'>'.NL;

        $html.='<ul class="dwpl-ti">'.NL;
        $sz = count($tabs);
        for($i=0;$i<$sz;$i++){
            if(empty($tabs[$i]['error'])){
                $selected_class=($init_page_idx==$i)?' selected':'';
                $html.='<li class="dwpl-ti-tab"><div class="dwpl-ti-tab-title'.$selected_class.'" value="'.$tabs[$i]['page'].'">'.$tabs[$i]['title'].'</div></li>'.NL;
            }else{
                $html.='<li class="dwpl-ti-tab"><div class="dwpl-ti-tab-title error">'.$tabs[$i]['error'].'</div></li>'.NL;
            }
        }
        $html.= '</ul>'.NL;
        $html.='<div class="dwpl-ti-content-box">';
        if($this->getConf('hideloading')!=1){
            $html.='<div id="dwpl-ti-loading" class="dwpl-ti-loading">'.$this->getLang('loading').'</div>';
        }
        $html.='<div id="dwpl-ti-content" class="dwpl-ti-content">';
        if($this->getConf('ajax_init_page')!=0){
            $html.='<div id="dwpl-ti-read-init-page" class="hidden" value="'.$tabs[$init_page_idx]['page'].'"></div>';
        }

        $goto = $this->getLang('gotohere');
        $pagelink = tpl_link(wl($tabs[$init_page_idx]['page']),$goto,'',true);
        if($this->getConf('goto_link_header')!=0)
            $html.= '<div class="dwpl-ti-permalink-header">'.$pagelink.'</div>'.NL;
        if($this->getConf('ajax_init_page')==0){
            $html.=tpl_include_page($tabs[$init_page_idx]['page'],false);
        }
        if($this->getConf('goto_link_footer')!=0)
            $html.= '<div class="dwpl-ti-permalink-footer">'.$pagelink.'</div>'.NL;
        $html.= '</div></div>'.NL.'</div>'.NL;


        $renderer->doc.=$html;

        global $conf;
        if($conf['allowdebug']==1){
            $renderer->doc.="<!-- \n".print_r(array($tabs,$init_page_idx,$class),true)."\n -->";
        }

        return true;
    }
    /**
     * Get links of tab XHTML from pagenames
     */
    function renderLinkTabs(&$renderer,$tabs,$init_page_idx,$class='') {
        global $ID;
        // Selected page defined ?
        if(isset($_GET['tabpage_idx'])) $init_page_idx = $_GET['tabpage_idx'];

        // render
        if($class) $class=' class="'.$class.'"';
        $html.= '<div id="dwpl-ti-container"'.$class.'>'.NL;
        $html.='<ul class="dwpl-ti">'.NL;
        $sz = count($tabs);
        for($i=0;$i<$sz;$i++){
            if(empty($tabs[$i]['error'])){
                $selected_class=($init_page_idx==$i)?' selected':'';
                $html.='<li class="dwpl-ti-tab">';
                $html.=tpl_link(wl($ID,'tabpage_idx='.$i.'#dokuwiki__content'),$tabs[$i]['title'],'class="'.$selected_class.'"',true);
                $html.='</li>'.NL;
            }else{
                $html.='<li class="dwpl-ti-tab">';
                $html.='<div class="dwpl-ti-tab-title error">'.$tabs[$i]['error'].'</div>';
                $html.='</li>'.NL;
            }
        }
        $html.= '</ul>'.NL;
        $html.='<div class="dwpl-ti-content-box">';
        $html.='<div id="dwpl-ti-content" class="dwpl-ti-content">';

        $goto = $this->getLang('gotohere');
        $pagelink = tpl_link(wl($tabs[$init_page_idx]['page']),$goto,'',true);
        if($this->getConf('goto_link_header')!=0)
            $html.= '<div class="dwpl-ti-permalink-header">'.$pagelink.'</div>'.NL;
        $html.=tpl_include_page($tabs[$init_page_idx]['page'],false);
        if($this->getConf('goto_link_footer')!=0)
            $html.= '<div class="dwpl-ti-permalink-footer">'.$pagelink.'</div>'.NL;
        $html.= '</div></div>'.NL.'</div>'.NL;

        $renderer->doc.=$html;

        global $conf;
        if($conf['allowdebug']==1){
            $renderer->doc.="<!-- \n".print_r(array($tabs,$init_page_idx,$class),true)."\n -->";
        }

        return true;
    }

    /**
     * Get embed tabs XHTML from pagenames
     */
    function renderEmbedTabs(&$renderer,$tabs,$init_page_idx,$class='') {
        global $ID;
        // Selected page defined ?
        if(isset($_GET['tabpage_idx'])) $init_page_idx = $_GET['tabpage_idx'];

        // render all tabs !
        if($class) $class=' class="'.$class.'"';
        $html.= '<div id="dwpl-ti-container"'.$class.'>'.NL;
        $html.='<ul class="dwpl-ti">'.NL;
        $sz = count($tabs);
        for($i=0;$i<$sz;$i++){
            if(empty($tabs[$i]['error'])){
                $selected_class=($init_page_idx==$i)?' selected':'';
                $html.='<li class="dwpl-ti-tab">';
                $html.='<div class="dwpl-ti-tab-embd-title'.$selected_class.'">'.$tabs[$i]['title'].'</div></li>'.NL;
                $html.='</li>'.NL;
            }else{
                $html.='<li class="dwpl-ti-tab">';
                $html.='<div class="dwpl-ti-tab-title error">'.$tabs[$i]['error'].'</div>';
                $html.='</li>'.NL;
            }
        }
        $html.= '</ul>'.NL;
        $html.='<div class="dwpl-ti-content-box">';

        for($i=0;$i<$sz;$i++){
            $html.='<div id="dwpl-ti-content" class="dwpl-ti-content">';
            if($i==$init_page_idx)
                $html.='<div class="dwpl-ti-tab-embd">';
            else
                $html.='<div class="dwpl-ti-tab-embd hidden">';
            $goto = $this->getLang('gotohere');
            $pagelink = tpl_link(wl($tabs[$i]['page']),$goto,'',true);
            if($this->getConf('goto_link_header')!=0)
                $html.= '<div class="dwpl-ti-permalink-header">'.$pagelink.'</div>'.NL;
            $html.=tpl_include_page($tabs[$i]['page'],false);
            if($this->getConf('goto_link_footer')!=0)
                $html.= '<div class="dwpl-ti-permalink-footer">'.$pagelink.'</div>'.NL;
            $html.= '</div></div>'.NL;
        }
        $html.='</div>'.NL;
        $html.='</div>'.NL;

        $renderer->doc.=$html;

        global $conf;
        if($conf['allowdebug']==1){
            $renderer->doc.="<!-- \n".print_r(array($tabs,$init_page_idx,$class),true)."\n -->";
        }

        return true;
    }
    /**
     * Get tab ODT from pagenames
     */
    function getOdtHtml(&$renderer,$tabs){
        $renderer->strong_open();
        $renderer->doc.='Tab pages';
        $renderer->strong_close();
        $renderer->p_close();

        $renderer->listu_open();
        for($i=0;$i<$sz;$i++){
            $page = $tabs[$i]['page'];
            $title = $tabs[$i]['title'];
            $desc = p_get_metadata($page,'description');

            if(empty($tabs[$i]['error'])){
                $renderer->listitem_open();
                $renderer->p_open();
                $renderer->internallink($page,$title);
                $renderer->p_close();

                if(is_array($desc)){
                    $renderer->p_open();
                    $renderer->doc.=hsc($desc['abstract']);
                    $renderer->p_close();
                }
                $renderer->listitem_close();
            }else{
                $renderer->p_open();
                $renderer->doc.=$tabs[$i]['error'];
                $renderer->p_close();
            }
        }
        $renderer->listu_close();
        $renderer->p_open();

        global $conf;
        if($conf['allowdebug']==1){
            $renderer->doc.="<!-- \n".print_r(array($tabs,$init_page_idx,$class),true)."\n -->";
        }

        return true;
    }
}
