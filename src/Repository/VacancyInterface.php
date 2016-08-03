<?php

namespace Vacancy\Repository;

interface VacancyInterface
{
    public function getId();

    public function getTitle();

    public function getContent();

    public function getDescription();
}