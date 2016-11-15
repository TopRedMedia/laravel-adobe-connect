<?php

namespace AsimovExpress\AdobeConnect\Providers;

use Illuminate\Support\ServiceProvider;
use AdobeConnect\Config;
use AdobeConnect\ApiClient;

class AdobeConnectServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('AdobeConnect', function ($app) {
            $config = $app['config'];
            $host = $config->get('adobe.host');
            $username = $config->get('adobe.username');
            $password = $config->get('adobe.password');

            $config = new Config($host, $username, $password);
            return new ApiClient($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(){
        return array('adobeconnect');
    }

}