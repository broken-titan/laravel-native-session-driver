<?php

    namespace BrokenTitan\NativeSessionDriver\Providers;

    use BrokenTitan\NativeSessionDriver\Extensions\NativeSessionHandler;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\ServiceProvider;

    class NativeSessionDriverServiceProvider extends ServiceProvider {
        /**
         * @method boot
         * @return void
         */
        public function boot() {
            Session::extend("native", function($app) {
                return new NativeSessionHandler(config("session.namespace"));
            });
        }
    }
