<?php
/**
 * TOracleTableColumn class file.
 *
 * @author Marcos Nobre <marconobre[at]gmail[dot]com>
 * @link https://github.com/pradosoft/prado4
 * @copyright Copyright &copy; 2005-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado4/blob/master/LICENSE
 * @package Prado\Data\Common\Oracle
 */

namespace Prado\Data\Common\Oracle;

/**
 * Load common TDbTableCommon class.
 */
use Prado\Data\Common\TDbTableColumn;
use Prado\Prado;


/**
 * Describes the column metadata of the schema for a PostgreSQL database table.
 *
 * @author Marcos Nobre <marconobre[at]gmail[dot]com>
 * @package Prado\Data\Common\Oracle
 * @since 3.1
 */
class TOracleTableColumn extends TDbTableColumn
{
	private static $types=array(
		'numeric' => array( 'numeric' )
//		'integer' => array('bit', 'bit varying', 'real', 'serial', 'int', 'integer'),
//		'boolean' => array('boolean'),
//		'float' => array('bigint', 'bigserial', 'double precision', 'money', 'numeric')
	);

	/**
	 * Overrides parent implementation, returns PHP type from the db type.
	 * @return boolean derived PHP primitive type from the column db type.
	 */
	public function getPHPType()
	{
		$dbtype = strtolower($this->getDbType());
		foreach(self::$types as $type => $dbtypes)
		{
			if(in_array($dbtype, $dbtypes))
				return $type;
		}
		return 'string';
	}
}

