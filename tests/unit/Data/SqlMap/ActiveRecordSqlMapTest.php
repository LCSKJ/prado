<?php

require_once(dirname(__FILE__).'/BaseCase.php');

Prado::using('System.Data.ActiveRecord.*');

class ActiveAccount extends TActiveRecord
{
	public $Account_Id;
	public $Account_FirstName;
	public $Account_LastName;
	public $Account_Email;

	public $Account_Banner_Option;
	public $Account_Cart_Option;

	const TABLE='Accounts';

	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}
}

/**
 * @package System.Data.SqlMap
 */
class ActiveRecordSqlMapTest extends BaseCase
{
	function __construct()
	{
		parent::__construct();
		$this->initSqlMap();
		TActiveRecordManager::getInstance()->setDbConnection($this->getConnection());

		//$this->initScript('account-init.sql');
	}

	function testLoadWithSqlMap_SaveWithActiveRecord()
	{
		$record = $this->sqlmap->queryForObject('GetActiveRecordAccounts');
		$record->Account_FirstName = "Testing 123";

		$this->assertTrue($record->save());

		$check1 = $this->sqlmap->queryForObject('GetActiveRecordAccounts');
		$finder = ActiveAccount::finder();
		$check2 = $finder->findByAccount_FirstName($record->Account_FirstName);


		$this->assertSameAccount($record,$check1);
		$this->assertSameAccount($record,$check2);

		$this->initScript('account-init.sql');
	}

	function assertSameAccount($account1,$account2)
	{
		$props = array('Account_Id', 'Account_FirstName', 'Account_LastName',
						'Account_Email', 'Account_Banner_Option', 'Account_Cart_Option');
		foreach($props as $prop)
			$this->assertEquals($account1->{$prop}, $account2->{$prop});
	}
}
