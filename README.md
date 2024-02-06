# Project Title

[inxuro]() is a CRM for insurance sales agents built on open-source technologies such as [Laravel](), [Vue.js](), [Tailwind]().

* [Requirements](#requirements)
* [Installation](#installation)
* [Contributing](#contributing)
* [Changelog](#changelog)
* [Security](#security)
* [Credits](#credits)
* [License](#license)


## Requirements

* PHP 8.0.2 or higher
* MySQL Database

## Installation

    $ composer install

    $ npm install

    $ npm run dev

    $ php artisan migrate

    $ php artisan db:seed

Create sample data (optional)

    $ php artisan db:demo

## Contributing

Kindly ensure your commit messages and pull requests are descriptive; pull requests with blank messages might be declined without further explanation.

When adding code to inxuro, adhere to the PSR coding guidelines. The guiding principle is: Imitate the existing inxuro coding style.

Be aware that this project comes with a [Contributor Code of Conduct](). Engaging in this project means you accept its conditions.

## Changelog

For recent changes, kindly refer to the [Releases](../../releases) section.

## Security

Please review [our security policy]() on how to report security vulnerabilities.

## Credits

* [Ryan Vel Bon](https://github.com/ryanvelbon)

## License

inxuro is released under the [BSL license](LICENSE.txt).

---
<!-- The rest of this README is Docs -->

### Running the tests

You need to create a separate MySQL database for running tests.

Take note of these configurations in `phpunit.xml`:

```
<env name="APP_ENV" value="testing"/>
<env name="DB_CONNECTION" value="mysql"/>
<env name="DB_DATABASE" value="test_db"/>
```

```
CREATE DATABASE test_db;
```

Also create a `.env.testing` file and set these variables:

```
APP_ENV=testing
DB_DATABASE=test_db
```

You can seed your test database by including `--env=testing` flag

    $ php artisan migrate --env=testing
    $ php artisan db:seed --class=StaticDataSeeder --env=testing

Run all tests

    $ php artisan test

Run tests in a specific directory

    $ php artisan test --filter=Policies

or

    $ vendor/bin/phpunit --filter Policies


### Deployment

# Visit our live [Demo](https://demo.mydomain.com)

## Features

##### Users, Teams

##### Roles & Permissions

##### Leads and Contact management

##### Insurer, Rates (find the best coverage)

##### Policies, Claims

##### Accounting, Billing, Quotes, Invoice & Recurring Invoices

##### Reporting & Informative Dashboard

##### Tasks, Events, Calendars

##### global and advanced search

##### Multi-Tenancy
<!-- It is possible that there are multiple records for the same person. For example suppose John Doe buys a policy from Insurer A and a policy from Insurer B. Both insurer A and insurer B register John Doe on the system and a separate record is kept for both insurers like this they can manage their own data. -->

##### Multi-Lingual support

##### Multi-Theme support

##### export and import data

## Database Entities

### User



### Team

Each `User` belongs to exactly one `Team`.

Teams can be thought of as sales channels. Insurance companies distribute their products through sales channels such as insurance agents, insurance brokerages, and direct sales.

A `Team` can be any of the following:

|Type|description|
|-|-|
|Brokerage|represents multiple insurance companies|
|Agency|represents one insurance company and its products|
|TII||
|Price Aggregator||
|Direct|the insurance company itself|

### Insurer

### Person

A person can either be a natural person (_i.e._, an individual human being) or a juridical person (_e.g.,_ corporation, government, or charity).

The following stakeholders are all stored in the `persons` table:

| Person        | created by user |
|---------------|-----------------|
| policyholder  | sales agent     |
| damaged party | claims adjuster |


### Policy

An insurance policy

