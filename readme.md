# Dyno quantity updater (with help of Scheduler)

### Requirements 
- installed free [Heroku Scheduler](https://elements.heroku.com/addons/scheduler)
- generated [Heroku API Key](https://help.heroku.com/PBGP6IDE/how-should-i-generate-an-api-key-that-allows-me-to-use-the-heroku-platform-api)

## How to use
- install into your project `composer require dyno-php-lib/quantity-updater`
```
php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME DESIRED_HEROKU_DYNO_QUANTITY DAY_OF_WEEK HOUR
```
- `HEROKU_TOKEN` - Heroku API Key
- `HEROKU_APP_NAME` - Heroku app name
- `HEROKU_DYNO_NAME` - dyno name, defined in Procfile (for example: web)
- `DAY_OF_WEEK` - A textual representation of a day, three letters (Mon through Sun)
- `HOUR` - 24-hour format of an hour without leading zeros (1 through 24)

### Example
### how to stop dyno for weekend:
- add new Job into Scheduler for disable dyno: `php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME 0 Fri 22`
- add new Job into Scheduler for enable dyno: `php dyno-quantity-updater.php HEROKU_TOKEN HEROKU_APP_NAME HEROKU_DYNO_NAME 1 Mon 6`


## [Contributing](CONTTIBUTING.md)

## [Code of conduct](CODE_OF_CONDUCT.md)

## [License](LICENSE)