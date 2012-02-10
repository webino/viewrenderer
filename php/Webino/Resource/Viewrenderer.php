<?php
/**
 * Webino
 *
 * PHP version 5.3
 *
 * LICENSE: This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt. It is also available through the
 * world-wide-web at this URL: http://www.webino.org/license/
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@webino.org
 * so we can send you a copy immediately.
 *
 * @category   Webino
 * @package    Viewrenderer
 * @subpackage Resource
 * @author     Peter Bačinský <peter@bacinsky.sk>
 * @copyright  2012 Peter Bačinský (http://www.bacinsky.sk/)
 * @license    http://www.webino.org/license/ New BSD License
 * @version    GIT: $Id$
 * @link       http://pear.webino.org/viewrenderer/
 */

/**
 * Resource for setting options to ViewRenderer action helper
 *
 * example of options:
 *
 * - helperClass     = Zend_Controller_Action_Helper_ViewRenderer
 * - viewSuffix      = html
 * - noController    = 0
 * - neverRender     = 0
 * - neverController = 0
 * - noController    = 0
 * - noRender        = 0
 * - responseSegment = ''
 * - scriptAction    = ''
 * - viewBasePathSpec   = ':moduleDir/views'
 * - viewScriptPathSpec = ':controller/:action.:suffix'
 * - viewScriptPathNoControllerSpec = ':action.:suffix'
 *
 * Only helperClass option is required when using this resource.
 *
 * @category   Webino
 * @package    Viewrenderer
 * @subpackage Resource
 * @author     Peter Bačinský <peter@bacinsky.sk>
 * @copyright  2012 Peter Bačinský (http://www.bacinsky.sk/)
 * @license    http://www.webino.org/license/ New BSD License
 * @version    Release: @@PACKAGE_VERSION@@
 * @link       http://pear.webino.org/viewrenderer/
 */
class Webino_Resource_Viewrenderer
    extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * Name of helper class option
     */
    const HELPERCLASS_KEYNAME = 'helperClass';

    /**
     * Zend view
     *
     * @var View
     */
    private $_view;

    /**
     * Create ViewRenderer action helper and pass given options
     */
    public function init()
    {
        Zend_Controller_Action_HelperBroker::addHelper(
            new $this->_options[self::HELPERCLASS_KEYNAME](
                $this->_view, $this->_options
            )
        );
    }

    /**
     * Inject view
     *
     * @param View $view
     *
     * @return Webino_Resource_Viewrenderer
     */
    public function setView($view)
    {
        $this->_view = $view;

        return $this;
    }
}
