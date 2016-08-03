<?php

use Vacancy\Repository\Vacancy;

class VacancyTest extends PHPUnit_Framework_TestCase
{

    public function test_it_implements_interface()
    {
        $vacancy = new Vacancy();

        $this->assertInstanceOf('\Vacancy\Repository\VacancyInterface', $vacancy);
    }

    public function test_getters_setters()
    {
        $id = 7;
        $title = 'Hello';
        $content = 'Some text';
        $description = 'Even more of text';

        $vacancy = new Vacancy();
        $vacancy->setId($id);
        $vacancy->setTitle($title);
        $vacancy->setContent($content);
        $vacancy->setDescription($description);

        $this->assertEquals($id, $vacancy->getId());
        $this->assertEquals($title, $vacancy->getTitle());
        $this->assertEquals($content, $vacancy->getContent());
        $this->assertEquals($description, $vacancy->getDescription());
    }
}
