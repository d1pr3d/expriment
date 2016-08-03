<?php

namespace Vacancy\Datasource;

use Vacancy\Repository\DatasourceInterface;
use Vacancy\Repository\VacancyFactory;

/**
 * Class StaticDatasource
 * @package Datasource
 *
 * Example source of static vacancies.
 */
class StaticDatasource implements DatasourceInterface
{
    /**
     * @var array
     */
    private $vacancies;

    /**
     * StaticDatasource constructor.
     *
     * Each array is represented as below record:
     * array(
     *  id: int,
     *  title: string,
     *  description: string,
     *  content: string,
     * )
     *
     * @param $vacancies
     */
    public function __construct($vacancies)
    {
        $this->vacancies = $vacancies;
    }

    /**
     * @return array of vacancies
     */
    public function fetch()
    {
        $vacancies = array();
        foreach ($this->vacancies as $rawVacancy) {
            $vacancies[] = VacancyFactory::createFromArray($rawVacancy);
        }

        return $vacancies;
    }
}
