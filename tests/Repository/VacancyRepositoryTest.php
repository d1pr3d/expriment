<?php

use Vacancy\Repository\VacancyRepository;

class VacancyRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Prophecy\Prophet
     */
    private $prophet;

    public function setup()
    {
        $this->prophet = new \Prophecy\Prophet();
    }

    public function test_it_registers_new_data_source()
    {
        $repository = new VacancyRepository();

        $datasourceMock1 = $this->prophet->prophesize('Vacancy\Repository\DatasourceInterface');
        $datasourceMock2 = $this->prophet->prophesize('Vacancy\Repository\DatasourceInterface');

        $repository->registerDatasource($datasourceMock1->reveal());
        $repository->registerDatasource($datasourceMock2->reveal());

        $this->assertCount(2, $repository->getDatasources(), 'Expecting two data sources to be registered.');
    }

    /**
     * @dataProvider datasourcesProvider
     */
    public function test_it_fetches_vacancies($dataSources, $amountOfExpectedVacancies)
    {
        $repository = new VacancyRepository();

        foreach ($dataSources as $dataSource) {
            $repository->registerDatasource($dataSource);
        }

        $this->assertCount($amountOfExpectedVacancies, $repository->getVacancies(),
            sprintf("Expected amount of vacancies is %d.", $amountOfExpectedVacancies));
    }

    /**
     * @return array
     */
    public function dataSourcesProvider()
    {
        $prophet = new \Prophecy\Prophet();
        $vacancyMock = $prophet->prophesize('Vacancy\Repository\VacancyInterface');

        $datasourceMock1 = $prophet->prophesize('Vacancy\Repository\DatasourceInterface');
        $datasourceMock1->fetch()->willReturn(array(
            $vacancyMock->reveal(),
        ));

        $datasourceMock2 = $prophet->prophesize('Vacancy\Repository\DatasourceInterface');
        $datasourceMock2->fetch()->willReturn(array(
            $vacancyMock->reveal(),
            $vacancyMock->reveal(),
        ));

        return array(
            array( array($datasourceMock1->reveal()), 1), // one data source, one vacancy
            array( array($datasourceMock2->reveal()), 2), // another data source, two vacancies
            array( array($datasourceMock1->reveal(), $datasourceMock2->reveal()), 3), // both data sources, three vacancies
        );
    }
}

