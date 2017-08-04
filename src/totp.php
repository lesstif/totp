<?php
namespace Lesstif\TOTP;

use Lesstif\TOTP\Configuration\AbstractConfiguration;
use Lesstif\TOTP\Configuration\DotEnvConfiguration;

public class TOTP
{
    public function __construct(AbstractConfiguration $configuration = null, Logger $logger = null, $path = './')
    {
        if ($configuration === null) {
            if (!file_exists($path.'.env')) {
                // If calling the getcwd() on laravel it will returning the 'public' directory.
                $path = '../';
            }
            $configuration = new DotEnvConfiguration($path);
        }

        $this->configuration = $configuration;
        $this->json_mapper = new \JsonMapper();

        // Fix "\JiraRestApi\JsonMapperHelper::class" syntax error, unexpected 'class' (T_CLASS), expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$'
        $this->json_mapper->undefinedPropertyHandler = [new \JiraRestApi\JsonMapperHelper(), 'setUndefinedProperty'];

        // create logger
        if ($logger) {
            $this->log = $logger;
        } else {
            /* TODO
            $this->log = new Logger('JiraClient');
            $this->log->pushHandler(new StreamHandler(
                $configuration->logFile,
                $this->convertLogLevel($configuration->getJiraLogLevel())
            ));
            */
        }

        $this->http_response = 200;
    }

}