<?php
/**
 * Core interfaces essential for TApplication class.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://github.com/pradosoft/prado4
 * @copyright Copyright &copy; 2005-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado4/blob/master/LICENSE
 * @package Prado
 */

namespace Prado;

/**
 * IModule interface.
 *
 * This interface must be implemented by application modules.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado
 * @since 3.0
 */
interface IModule
{
	/**
	 * Initializes the module.
	 * @param TXmlElement the configuration for the module
	 */
	public function init($config);
	/**
	 * @return string ID of the module
	 */
	public function getID();
	/**
	 * @param string ID of the module
	 */
	public function setID($id);
}