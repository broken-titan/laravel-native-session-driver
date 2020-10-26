<?php

    namespace BrokenTitan\NativeSessionDriver\Providers;

    use Illuminate\Support\ServiceProvider;

    class NativeSessionDriverServiceProvider extends ServiceProvider {
        /**
         * @method register
         * @return void
         */
        public function register() {
            $this->app["session"]->extend("native", function($app) {
                return new NativeSessionHandler($app["config"]->get("session.namespace"));
            });
        }

        /**
         * @method provides
         * @return array
         */
        public function provides() {
            return [NativeSessionDriver::class];
        }
    }
