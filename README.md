# countries-states-cities
Laravel package for addresses that mostly used for dropdown in form.

## Installation

1. Require this package with composer.

```shell

composer require mark-villudo/countries-states-cities

```
2. Publish Seeder and Migration files

You can publish the migration with:

```

php artisan vendor:publish --provider="MarkVilludo\CountryStateCities\ServiceProvider" --tag="migrations"

```

You can publish the seeder with:

```

php artisan vendor:publish --provider="MarkVilludo\CountryStateCities\ServiceProvider" --tag="seeder"

```

You can publish its default controllers

```

php artisan vendor:publish --provider="MarkVilludo\CountryStateCities\ServiceProvider" --tag="controllers"

```
3. Add this route in routes/api.php
```

Route::prefix('v1')->group(function () {
	//Country, Province/State and City
	Route::prefix('countries')->group(function () {
		Route::get('/','Api\CountryController@index');
		Route::get('/{id}/provinces','Api\ProvinceController@index');
	});
	Route::prefix('provinces')->group(function () {
		Route::get('/{id}/cities','Api\CityController@index');
	});
});

```

4. Make resource file for models. for Countries, Provinces, and Cities.

```
php artisan make:resource CountryResource
php artisan make:resource ProvinceResource
php artisan make:resource CityResource
```


## Usage

//Access the url from the code added in routes/api.php

```
php artisan serve
```
