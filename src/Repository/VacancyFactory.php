<?php

namespace Vacancy\Repository;

/**
 * Class VacancyFactory
 *
 * Contains routine to create a vacancy instance from some raw data.
 *
 * @package Repository
 */
class VacancyFactory
{
    private static $validKeys = array(
        'id',
        'title',
        'content',
        'description',
    );

    public static function createFromArray($rawVacancy)
    {
        self::validateRaw($rawVacancy);

        $vacancy = new Vacancy();
        $vacancy->setId($rawVacancy['id']);
        $vacancy->setTitle($rawVacancy['title']);
        $vacancy->setDescription($rawVacancy['description']);
        $vacancy->setContent($rawVacancy['content']);

        return $vacancy;
    }

    /**
     * Validate rawVacancy has only expected fields.
     *
     * @param $rawVacancy
     */
    private static function validateRaw($rawVacancy)
    {
        if (array_diff(self::$validKeys, array_keys($rawVacancy))) {
            throw new \InvalidArgumentException('Raw vacancy is of unexpected format.');
        }
    }
}
