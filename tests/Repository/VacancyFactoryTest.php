<?php

class VacancyFactoryTest extends PHPUnit_Framework_TestCase
{

    public function test_it_creates_a_vacancy()
    {
        $raw = array(
            'id' => 10,
            'title' => 'Title',
            'content' => 'Content',
            'description' => 'Description',
        );

        $vacancy = \Vacancy\Repository\VacancyFactory::createFromArray($raw);

        $this->assertEquals($raw['id'], $vacancy->getId());
        $this->assertEquals($raw['title'], $vacancy->getTitle());
        $this->assertEquals($raw['content'], $vacancy->getContent());
        $this->assertEquals($raw['description'], $vacancy->getDescription());
    }

    public function test_it_fails_to_validate()
    {
        $raw = array(
            'title' => 'Hey',
        );

        $this->setExpectedException('InvalidArgumentException');
        \Vacancy\Repository\VacancyFactory::createFromArray($raw);
    }
}
