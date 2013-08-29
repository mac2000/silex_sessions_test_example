<?php
namespace Acme;

use Silex\Application as BaseApplication;
use Silex\Provider\SessionServiceProvider;

class Application extends BaseApplication {
    function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->register(new SessionServiceProvider());

        // the route we wish to test
        $this->get('/test', function(){
            if($this['session']->get('test', false)) {
                return 'SESSION DETECTED';
            } else {
                return 'nothing';
            }
        });

        // temporary route for hands testing
        $this->get('/set', function(){
            $this['session']->set('test', true);
            return $this->redirect('/test');
        });
    }
}