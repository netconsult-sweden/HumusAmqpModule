<?php

namespace HumusAmqpModule\PluginManager;

use AMQPExchange;
use HumusAmqpModule\Exception;
use Zend\ServiceManager\AbstractPluginManager;

class Exchange extends AbstractPluginManager
{
    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AMQPExchange) {
            // we're okay
            return;
        }

        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            'AMQPExchange'
        ));
    }
}
