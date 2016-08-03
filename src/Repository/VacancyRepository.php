<?php
namespace Vacancy\Repository;

class VacancyRepository
{
    /**
     * @var array of DatasourceInterface
     */
    private $dataSources = array();

    /**
     * @param DatasourceInterface $dataSource
     * @return $this
     */
    public function registerDatasource(DatasourceInterface $dataSource) {
        $this->dataSources[] = $dataSource;

        return $this;
    }

    /**
     * @return array of DatasourceInterface
     */
    public function getDatasources() {
        return $this->dataSources;
    }

    /**
     * @return array of VacancyInterface
     */
    public function getVacancies() {
        $vacancies = array();

        /**
         * @var DatasourceInterface $dataSource
         */
        foreach ($this->dataSources as $dataSource) {
            $vacancies = array_merge($vacancies, $dataSource->fetch());
        }

        return $vacancies;
    }
}