<?php

/**
 * Created by PhpStorm.
 * User: Phantom
 * Date: 01.06.2015
 * Time: 3:15
 */
class Controller_Table extends Controller_Page
{
    public function action_index()
    {
        $arrTables = Database::instance()->list_tables();
        foreach ($arrTables as &$arrName) {
            $arrStr = explode('_', $arrName);
            unset($arrStr[0]);
            $arrStr = array_map('ucwords', $arrStr);
            $uri = implode('', $arrStr);
            $arrName = array(
                'name' => $arrName,
                'uri' => $uri,
            );
        }
        $view = View::factory('table/tableList');
        $view->bind('arrTables', $arrTables);
        $this->content = $view->render();
    }

    public function action_view(){
        $table = $this->request->query('table');
        if (Kohana::auto_load('Model_'.$table)) {
            $dbTable = ORM::factory($table);
        } else {
            throw new HTTP_Exception_404();
        }
        if (!$dbTable->count_all()) {
            $this->content = 'Таблица пуста';
        }else {
            $arrCols = $dbTable->list_columns();
            $dbTable = $dbTable->find_all();
            $arrRows = array();
            foreach ($dbTable as $dbTableRow){
                $arrRow = array();
                foreach ($arrCols as $colName=>$arrCol){
                    $arrRow [$arrCol['column_name']] = $dbTableRow->$arrCol['column_name'];
                }
                $arrRows[] = $arrRow;
            }

            $view = View::factory('table/tableView');
            $view->bind('arrRows', $arrRows);
            $view->bind('arrCols', $arrCols);
            $this->content = $view->render();
        }
    }


} 