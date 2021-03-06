<?php
/**
 * TRepeater class file
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://github.com/pradosoft/prado4
 * @copyright Copyright &copy; 2005-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado4/blob/master/LICENSE
 * @package Prado\Web\UI\WebControls
 */

namespace Prado\Web\UI\WebControls;
use Prado\TPropertyValue;

/**
 * TRepeaterItem class
 *
 * A TRepeaterItem control represents an item in the {@link TRepeater} control,
 * such as heading section, footer section, or a data item.
 * The index and data value of the item can be accessed via {@link getItemIndex ItemIndex}>
 * and {@link getDataItem DataItem} properties, respectively. The type of the item
 * is given by {@link getItemType ItemType} property.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado\Web\UI\WebControls
 * @since 3.0
 */
class TRepeaterItem extends \Prado\Web\UI\TControl implements \Prado\Web\UI\INamingContainer, IItemDataRenderer
{
	/**
	 * index of the data item in the Items collection of repeater
	 */
	private $_itemIndex;
	/**
	 * type of the TRepeaterItem
	 * @var TListItemType
	 */
	private $_itemType;
	/**
	 * data associated with this item
	 * @var mixed
	 */
	private $_data;

	/**
	 * @return TListItemType item type
	 */
	public function getItemType()
	{
		return $this->_itemType;
	}

	/**
	 * @param TListItemType item type.
	 */
	public function setItemType($value)
	{
		$this->_itemType=TPropertyValue::ensureEnum($value,'Prado\\Web\\UI\\WebControls\\TListItemType');
	}

	/**
	 * Returns a value indicating the zero-based index of the item in the corresponding data control's item collection.
	 * If the item is not in the collection (e.g. it is a header item), it returns -1.
	 * @return integer zero-based index of the item.
	 */
	public function getItemIndex()
	{
		return $this->_itemIndex;
	}

	/**
	 * Sets the zero-based index for the item.
	 * If the item is not in the item collection (e.g. it is a header item), -1 should be used.
	 * @param integer zero-based index of the item.
	 */
	public function setItemIndex($value)
	{
		$this->_itemIndex=TPropertyValue::ensureInteger($value);
	}

	/**
	 * @return mixed data associated with the item
	 * @since 3.1.0
	 */
	public function getData()
	{
		return $this->_data;
	}

	/**
	 * @param mixed data to be associated with the item
	 * @since 3.1.0
	 */
	public function setData($value)
	{
		$this->_data=$value;
	}

	/**
	 * This property is deprecated since v3.1.0.
	 * @return mixed data associated with the item
	 * @deprecated deprecated since v3.1.0. Use {@link getData} instead.
	 */
	public function getDataItem()
	{
		return $this->getData();
	}

	/**
	 * This property is deprecated since v3.1.0.
	 * @param mixed data to be associated with the item
	 * @deprecated deprecated since version 3.1.0. Use {@link setData} instead.
	 */
	public function setDataItem($value)
	{
		return $this->setData($value);
	}

	/**
	 * This method overrides parent's implementation by wrapping event parameter
	 * for <b>OnCommand</b> event with item information.
	 * @param TControl the sender of the event
	 * @param TEventParameter event parameter
	 * @return boolean whether the event bubbling should stop here.
	 */
	public function bubbleEvent($sender,$param)
	{
		if($param instanceof \Prado\Web\UI\TCommandEventParameter)
		{
			$this->raiseBubbleEvent($this,new TRepeaterCommandEventParameter($this,$sender,$param));
			return true;
		}
		else
			return false;
	}
}