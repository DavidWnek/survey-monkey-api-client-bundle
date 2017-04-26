# Survey Monkey API v3 Client Bundle

Work In Progress. PR's Welcome!!

Symfony integration bundle of the Survey Monkey API Client

## Getting Started

These instructions will help you get this bundle running in your project.

## Prerequisites
Symfony project 3.* and above(Should work on 2.x projects, currently developing for a project so it's untested on 2.x)

## Installation

###1. Add composer dependency and install the bundle
```
composer require davidwnek/survey-monkey-api-client-bundle dev-master
```

###2. Enable the bundle in `AppKernel.php`
``` php
    // app/AppKernel.php

        public function registerBundles()
        {
        $bundles = array(
            // ...
            new davidwnek\SurveyMonkeyApiClientBundle\SurveyMonkeyApiClientBundle(),
        );
        }
```

###3. Setup config.yml

```
//app/config/config.yml
survey_monkey_api_client:
    client_id: '%sm.client_id%'
    client_secret: '%sm.secret%'
    redirect_url: '%sm.redirect_url%'
    #These fields are optional if you use your own Authentication controller as explained later.
    authentication_success_redirect_route_name: {INSERT_SUCCESS_REDIRECT_ROUTE}
    authentication_failed_redirect_route_name: {INSERT_FAILED_REDIRECT_ROUTE}
```

###4. Setup parameters.yml/.dist

```
//app/config/parameters.yml.dist

    sm.client_id: ~
    sm.secret: ~
    sm.redirect_url: ~
```

Place actual values in parameters.yml to keep sensitive data out of the repository!
client_id, secret can be generated: https://developer.surveymonkey.com/apps/

Create new app, or use existing.
Under Credentials place the Client ID and Secret provided in parameters.yml

The Redirect URL needs to match in Survey Monkeys developer panel, and in code. It's 
used to return to your application after the OAuth process has completed.

This bundle already provides an Action to handle the code response from Survey Money if you choose to use it. 
You can always create your own Action and handle the code response that way.

Redirect URL Examples:

Local development using built in Controller: http://localhost:8000/survey_monkey/code

For Staging, Testing, Production branches, change the parameters.yml to contain the actual 
hostname of your domain. Keep in mind, you also need to have the redirect_url in Survey Money.
It's beneficial to have multiple Apps for different environments.


```
//app/config/parameters.yml

    sm.client_id: {INSERT ACTUAL CLIENT ID}
    sm.secret: {INSERT ACTUAL CLIENT SECRET}
    sm.redirect_url: {INSERT ACTUAL REDIRECT_URL}
```
###5. Setting up routing.yml
This step is optional if you chose to not use the built in AuthenticationController.php

```
//app/config/routing.yml

survey_monkey_api_client:
    resource: "@SurveyMonkeyApiClientBundle/Controller"
    type: annotation

```

## Examples
TODO: Shortly a demo project will be available showing how to use the bundle.


## Contributing 
Please feel free to submit pull requests. Keep in mind this is a Work in Progress project, and will continue to expand over time. All help is welcome.

## Versioning
TODO

## Authors

* **David Wnek** - *Inital Work* - https://github.com/DavidWnek
* **Josh Schroeder** - *Consulting and Code Review* - https://github.com/jschroed91
* **Anthony White** - *Code Review* - https://github.com/AnthonyWhiteCaxy

## License
This project is licensed under the Apache License 2.0 - see the [LICENSE.md](LICENSE.md) file for details