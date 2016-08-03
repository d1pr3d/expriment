<?php

require(__DIR__ . '/vendor/autoload.php');

use Symfony\Component\Console\Command\Command;

class VacanciesCli extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('vacancies:report')
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

    }
}
