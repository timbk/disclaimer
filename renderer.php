<?php
/**
 * Alternative XHTML renderer that adds a disclaimer text to the top of selected pages
 */

// include the default xhtml renderer so we can inherig from it
if(!defined('DOKU_INC')) die();
require_once DOKU_INC.'inc/parser/xhtml.php';

/** The custom renderer */
class renderer_plugin_disclaimer extends Doku_Renderer_xhtml {
    /**
     * Show that we are an XHTML renderer
     * @param requested format
     */
    public function canRender($format) {
        return $format == 'xhtml';
    }

    /** Overload the document finalizer function */
    public function document_end() {
        parent::document_end();
	// $disclaimer_box = "<p class=\"disclaimer_box raw\" data-disclaimer-ns=\"" . $this->getConf("disclaimer_namespaces") . "\">" . $this->getConf("disclaimer_msg") . "</p>";
	$disclaimer_box = "<p class=\"disclaimer_box raw\" style=\"background-color:%bg_clr;\" data-disclaimer-ns=\"%ns\" data-parent-id=\"%parent_id\">%msg</p>";
        $vars = array( '%msg'       => $this->getConf("disclaimer_msg"),
                       '%ns'        => $this->getConf("disclaimer_namespaces"),
                       '%parent_id' => $this->getConf("disclaimer_parent_id"),
                       '%bg_clr'    => $this->getConf("disclaimer_bg_color"),
        );
        
        // insert our box into the document
	$this->doc = strtr($disclaimer_box, $vars) . $this->doc;
    }
}
