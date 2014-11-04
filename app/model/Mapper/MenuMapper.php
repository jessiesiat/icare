<?php namespace App\Model\Mapper;

use ICare\Database\DatabaseAdapterInterface;
use App\Model\Collection\MenuCollection;
use App\Model\Menu;

class MenuMapper extends AbstractDataMapper implements MenuMapperInterface {

	protected $adapter;

	protected $entityTable = 'menus';

    public function fetchAll(array $conditions = array()) 
    {
        $collection = new MenuCollection;

        $this->adapter->select($this->entityTable, $conditions);

        $rows = $this->adapter->fetchAll();
        
        if ($rows) {
            foreach ($rows as $row) {
                $collection->addMenu($this->createEntity($row));
            }
        }
     
        return $collection;
    }
    
    protected function createEntity(array $row) 
    {
        return new Menu($row["name"]);
    }

}