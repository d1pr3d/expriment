<?php

namespace Vacancy\Repository;

interface DatasourceInterface
{
    /**
     * Return
     * @return array of VacancyInterface
     */
    public function fetch();
}
