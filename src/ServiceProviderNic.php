<?php

namespace FNDEV\Nic;


use FNDEV\Nic\Api\Contact\contact;
use FNDEV\Nic\Api\NicApi;
use Illuminate\Support\ServiceProvider;

class ServiceProviderNic extends ServiceProvider
{
    public function register()
    {
//        $this->app->bind('Nic', function () {
//            return new NicApi();
//        });
        $this->mergeConfigFrom(__DIR__ . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR . "nic.php", 'nic');
//        $b= new  NicApi('78.157.48.155',"JymVL4MTokDkVwsL");
//       dd($b->contact()->check(["contact_id"=>'ex999-irnic']));
    }
}
