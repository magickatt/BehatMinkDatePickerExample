# Behat and Mink date picker example

Example of how to use Behat and Mink to test HTML elements such as a date picker which is used to calculate the age of a person

## Setup

    composer install
    php -S localhost:9999 public/index.php
    
## Build

You can run Ant with the default build.xml, or can run only the tests using the tests target

### Tests

Unit tests can be run via PhpSpec and functional tests can be run via Behat

    bin/phpspec run
    bin/behat
    
*Mink is configured to localhost:9999 as above, so if you are using a different domain/port you will need to update behat.yml*