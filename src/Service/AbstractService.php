<?php

namespace xpl\Data\Service;

use xpl\Data\ServiceInterface;

abstract class AbstractService implements ServiceInterface {
	
	abstract public function getProvider();
	
	abstract public function isReadOnly();
	
	public function getOne(array $conditions = array(), $bool_operator = 'AND') {
		return $this->getProvider()->fetchOne($conditions, $bool_operator);
	}
	
	public function getAll(array $conditions = array(), $bool_operator = 'AND') {
		return $this->getProvider()->fetchAll($conditions, $bool_operator);
	}
	
	public function getAllLike(array $conditions = array(), $bool_operator = 'AND') {
		return $this->getProvider()->fetchAllLike($conditions, $bool_operator);
	}
	
	public function query($type) {
		switch($type) {
			case 'select':
				return new \xpl\Database\Query\Select($this->getProvider());
		}
	}
	
}
