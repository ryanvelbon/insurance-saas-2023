# Project Title
<!-- One paragraph of your project's description goes here. Describe what your project is, what problem it solves, how it solves the problem, and the architecture. -->


## Topics

1. [Introduction](#introduction)
2. [link](#link)
3. [Running the tests](#running-the-tests)
4. [Deployment](#deployment)
5. [link](#link)




### Introduction

[Insurance Broker]() is a CRM for insurance sales agents built on open-source technologies such as [Laravel](), [Vue.js](), [Tailwind]().

## Getting Started

### Demo

    $ php artisan migrate

    $ php artisan db:seed

    $ php artisan db:seed --class=DemoSeeder


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

