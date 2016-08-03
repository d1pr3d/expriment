<?php

use Vacancy\Datasource\StaticDatasource;

class StaticDatasourceTest extends PHPUnit_Framework_TestCase
{
    public function test_it_implements_interface()
    {
        $datasource = new StaticDatasource(array());

        $this->assertInstanceOf('\Vacancy\Repository\DatasourceInterface', $datasource);
    }

    public function test_it_fetches_vacancies()
    {
        $datasource = new StaticDatasource(array(
            array('id' => 1, 'title' => 'One', 'content' => 'Short text', 'description' => 'More details'),
            array('id' => 2, 'title' => 'Two', 'content' => 'Short text', 'description' => 'More details'),
        ));

        $this->assertCount(2, $datasource->fetch());
    }
}
