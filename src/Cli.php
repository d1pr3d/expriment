<?php

namespace Vacancy;

use Symfony\Component\Console\Command\Command;
use Vacancy\Repository\Vacancy;
use Vacancy\Repository\VacancyRepository;
use Vacancy\Datasource\StaticDatasource;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Cli extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('vacancies')
            ->setDescription('The tool to fetch vacancies from different sources.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $staticDataSource = new StaticDatasource(array(
            array('id' => 1, 'title' => 'One', 'content' => 'Short text', 'description' => 'More details'),
            array('id' => 2, 'title' => 'Two', 'content' => 'Short text', 'description' => 'More details'),
            array('id' => 3, 'title' => 'Three', 'content' => 'Short text', 'description' => 'More details'),
        ));

        $vacancyRepository = new VacancyRepository();
        $vacancyRepository->registerDatasource($staticDataSource);

        $vacancies = $vacancyRepository->getVacancies();

        /**
         * @var Vacancy $vacancy
         */
        foreach ($vacancies as $vacancy) {
            $output->writeln(sprintf("%d: %s", $vacancy->getId(), $vacancy->getTitle()));
        }
    }
}

