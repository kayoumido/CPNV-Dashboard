CPNV-Dashboard
==============

CPNV-Dashboard is a single page web application created with [Symfony](https://symfony.com/). The dashboard display figures about the CPNV's social media (Facebook, Twitter, Instagram).



# Contributing Guide



Before submitting any work, please take some time to read the following.

- [Code of Conduct](../.github/CODE_OF_CONDUCT.md)
- [Issue Reporting](#issue-reporting)
- [Pull Request](#pull-request)
- [Development Setup](#development-setup)
- [Project Structure](#project-structure)
- [Known issues](#known-issues)



## Issue Reporting

Nothing special to do. You can simply use [github issues](https://github.com/kayoumido/PRW3-SO-Survey/issues).



## Pull Request

- The `master` branch is a snapshot of the latest stable version. Any work should be done in a dedicated branch and then merged into `develop`.
- Before doing a **PR**, make sure that you've solved any conflicts by merging the latest version of `develop` against your branch.



## Development Setup

You will need  [Vagrant](https://www.vagrantup.com/) and [Composer](https://getcomposer.org/).

Once you've cloned the repo, run :

```bash
$ composer update
```

You can now, run and work on the project:

```bash
$ vagrant up
```

The app is accessible under [192.168.10.10](192.168.10.10) or you can add the following to your **hosts** file and access it under [dashboard.cpnv.io](http://dashboard.cpnv.io/).

```
192.168.10.10 dashboard.cpnv.io
```

Now all that's needed is to configure the API credentials.

### CONFIGURATION

The project configurations are found in the `app/confg/parameters.yml` file. Copy the `app/confg/parameters.yml.dist` and rename it to `app/confg/parameters.yml`. And fill in your API credentials.

```yaml
api:
    facebook:
        app_id: AppId
        app_secret: AppSecret
        access_token: AccessToken
    twitter:
        app_id: ClientID
        app_secret: ClientSecret
        access_token: AccessToken
        access_token_secret: AccessTokenSecret
```

⚠️ It's important that you don't push this file to the repository!

*For the sake of the evaluation of the project I've added real keys to the dist file. So you'll only need to copy and rename the file*.



## Project Structure

* **app**
  * Ressources/views : contains the different twig files related to the project. The ones related to the dashbaord are found in the `dashboard` folder.
  * config/parameters.yml : contains the configuration for the different apis.
* **src/AppBundle** : contains the source code.
  * Controller : contains the controllers.
  * Service : contains the buisiness logic to access the different social media apis.
* **web/assets** : contains all the assets.

If you want more information about the structure visit Symfony's official [documentation](https://symfony.com/doc/current/index.html).