<?php
/**
 * DokuWiki Plugin highlightparent (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Michael Große <dokuwiki@cosmocode.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_highlightparent extends DokuWiki_Action_Plugin {

    protected $hasBeenRendered = false;

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       $controller->register_hook('TPL_CONTENT_DISPLAY', 'BEFORE', $this, 'handle_tpl_content_display');

    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */
    public function handle_tpl_content_display(Doku_Event $event, $param) {
        if ($this->hasBeenRendered) {
            return;
        }
        $link = $this->tpl();
        $event->data = $link . $event->data;

    }

    /**
     * Return a link to the configured parent page
     *
     * @return string
     */
    public function tpl() {
        global $ID, $ACT;
        if (act_clean($ACT) !== 'show') {
            return '';
        }

        $baseID = $this->getBaseID();
        if ($baseID === '') {
            return '';
        }
        return $this->buildLinkToPage($baseID);
    }

    /**
     * Determine the page to which to link
     *
     * @return string pageid or empty string
     */
    protected function getBaseID()
    {
        $pattern = trim($this->getConf('namespace pattern'));
        if ($pattern === '') {
            return $this->getStartpageOrParentStartpage();
        }

        return $this->getParentIDFromPattern($pattern);
    }

    /**
     * Determine if and to which page to link based on the configured pattern
     *
     * @param string $pattern regex to match a namespace
     *
     * @return string pageid or empty string
     */
    protected function getParentIDFromPattern($pattern)
    {
        global $ID;
        $matches = array();

        if (preg_match('/' . $pattern . '/', $ID, $matches) === 1) {
            global $conf;
            $baseID = $matches[1];
            if (substr($baseID, -1) === ':') {
                $baseID .= $conf['start'];
            }
            if ($baseID === $ID) {
                return '';
            }
            return $baseID;
        }
        return '';
    }

    /**
     * Get the startpage of the current namespace or of the parent namespace if on a startpage
     *
     * @return string pageid or empty string if on startpage in root namespace
     */
    protected function getStartpageOrParentStartpage()
    {
        global $ID, $conf;
        if ($ID === $conf['start']) {
            return '';
        }
        $ns = getNS($ID);
        $page = noNS($ID);

        if ($ns === false) {
            return ':' . $conf['start'];
        }

        if ($page !== $conf['start']) {
            return $ns . ':' . $conf['start'];
        }

        return getNS($ns) . ':' . $conf['start'];
    }

    /**
     * Render a link to a wikipage as HTML, wrapped by a span with an id
     *
     * @param string $baseID
     *
     * @return string
     */
    protected function buildLinkToPage($baseID)
    {
        $baseTitle = p_get_first_heading($baseID);
        $xhtml_renderer = new Doku_Renderer_xhtml();
        $link = $xhtml_renderer->internallink($baseID, ($baseTitle ?: $baseID), false, true);
        $link = "<span id='plugin__highlightparent'>$link</span>";
        $this->hasBeenRendered = true;
        return $link;
    }
}

// vim:ts=4:sw=4:et:
