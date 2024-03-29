<?php

namespace Armincms\Originalnod;
 
use Illuminate\Support\ServiceProvider;

class OriginalnodServiceProvider extends ServiceProvider  
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {        
        $this->app->booted(function($app) {
            $component = $app['site']->get('easy-license')->components()->first(function($component) {
                return $component->name() == 'checkout';
            });

            $component->config([
                'layout' => 'phoenix'
            ]);
          
            $app['site']->get('blog')->components()->each(function($component) { 
                $component->config([
                    'layout' => 'orion'
                ]);
            });

            $app['site']->get('home')->components()->each(function($component) { 
                $component->config([
                    'layout' => 'orion'
                ]);
            });
        });      
    }  
}
