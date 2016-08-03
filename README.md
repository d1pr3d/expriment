# Vacancy

Basic VacancyRepository implementation which allows the repository to be extended with various data sources as long as 
these comply to the DatasourceInterface.

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
