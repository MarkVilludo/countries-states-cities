<?php 

namespace MarkVilludo\CountryStateCities;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {      
        // Publish the migration
        $this->publishes([
            __DIR__.'/../migrations' => $this->app->databasePath().'/migrations',
        ], 'migrations');
        
        // Publish seeder
        $this->publishes([
            __DIR__.'/../seeds' => $this->app->databasePath().'/seeds',
        ], 'seeder');

        //publish also controllers
        $this->publishes([
          __DIR__.'/../Controllers/' => 'app/Http/Controllers/Api',
        ],'controllers');
        //end

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      // require_once($filename);
    }

}
