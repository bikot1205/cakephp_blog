# CakePHP3

## config

Add config file and load in config/bootstrap.php 

## bootstrap

* [reference](http://qiita.com/soichinakatake/items/e3d34b050699c1915b69)

## smarty

【controller】universes#index

* [reference](http://qiita.com/yukikikuchi/items/3c0c19d17c62bdd56c8c)

## Middleware

src/Middleware/TrackingCookieMiddleware.php

## Component

src/Controller/Component/MathComponent.php

## Chronos

【controller】universes#customize

## Customize PasswordHasher

* src/Auth/LegacyPasswordHasher.php
* src/Controller/AppController.php

## Debug

【controller】universes#customize

## Log and Monolog

* config/bootstrap.php

## Exception

* src/Error/MissingWidgetException.php
* src/Template/Error/missing_widget.ctp
* src/Error/AppExceptionRenderer.php

## Email

* src/Template/Email/html/welcome.ctp
* src/Mailer/UserMailer.php

## Paginator

【controller】universes#index

## i18n

* src/Locale/ja_JP/default.po
* bin/cake i18n extract -> create pot file

## Validation

* $this->Form->create(model_name, ['novalidate' => true]);
* $this->Form->control: show error message automatically

## Collection

【controller】universes#customize, universes#index 

## Entity

【Entity】Universe

* when converting to array or json, virtual field and hidden field 

## Query

* Finder: UniversesTable->findLarge 



