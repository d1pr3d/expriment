# Vacancy

Basic VacancyRepository implementation which allows the repository to be extended with various data sources as long as 
these comply to the DatasourceInterface.

### Most important files

* src/Cli.php -- the main runner, no business logic, just demo
* src/Repository/VacancyRepository.php -- aggregator of all the data sources
* src/Repository/DatasourceInterface -- the interface all the data sources must comply to
* src/Datasource/StaticDatasource -- an example data source. This one returns vacancies from an array. Alike ones can be created which would fetch the vacancies from all the random places, being files, databases or remote APIs.

## Installation
Assuming PHP5.5 (+xdebug) and Composer are installed on the target system.

```
$ git clone <URL>
$ cd experiment
$ composer install
```

## Testing

PHPUnit is used. 

```
$ ./vendor/bin/phpunit
```

## Code Check

Code is compliant with the PSR2 guide.

```
$ ./vendor/bin/phpcs --standard=PSR2 src
```

## Running

Example command:

```
$ php run.php 
```
