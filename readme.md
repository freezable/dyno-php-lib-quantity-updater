# Dyno quantity updater (with help of Scheduler)
Small library, which could help you save some money and schedule quantity of Heroku Dynos for free.

[![PHP Composer](https://github.com/yehor-chernyshov/dyno-php-lib-quantity-updater/actions/workflows/php.yml/badge.svg)](https://github.com/yehor-chernyshov/dyno-php-lib-quantity-updater/actions/workflows/php.yml)

### Requirements 
- Dynos types Hobby or Professional
- installed free [Heroku Scheduler](https://elements.heroku.com/addons/scheduler)
- generated [Heroku API Key](https://help.heroku.com/PBGP6IDE/how-should-i-generate-an-api-key-that-allows-me-to-use-the-heroku-platform-api)

## How to use
- install into your project `composer require dyno-php-lib/quantity-updater`
```
php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME DESIRED_HEROKU_DYNO_QUANTITY DAYS_OF_WEEK HOURS
```
- `HEROKU_TOKEN` - Heroku API Key
- `HEROKU_APP_NAME` - Heroku app name
- `HEROKU_DYNO_NAME` - dyno name, defined in Procfile (for example: web)
- `DESIRED_HEROKU_DYNO_QUANTITY` - qty of Dynos you want to have after update 
- `DAYS_OF_WEEK` - comma separated list of an textual representation of a day, three letters (Mon through Sun)
- `HOURS` - comma separated list of 24-hour format of an hour without leading zeros (1 through 24)


### Example
### how to stop dyno for weekend:
- add new Job into Scheduler to disable dyno: `php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME 0 Fri 22`
- add new Job into Scheduler to enable dyno: `php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME 1 Mon 6`
- this jsobs should be startet hourly in 10th min.


## [Contributing](CONTTIBUTING.md)

## [Code of conduct](CODE_OF_CONDUCT.md)

## [License](LICENSE)
