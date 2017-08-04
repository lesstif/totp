<?php

namespace Lesstif\TOTP\Configuration;

/**
 * Class AbstractConfiguration.
 */
abstract class AbstractConfiguration
{
    /**
     * Override the default label in "otpauth://" URL
     *
     * @var string
     */
    public $label;

    /**
     * Override the default issuer in "otpauth://" URL
     *
     * @var string
     */
    public $issuer;

    /**
     * Limit logins to N per every M seconds
     *
     * @var string
     */
    public $rateLimit;

    /**
     * Limit logins to N per every M seconds
     *
     * @var int
     */
    public $rateTime;

    /**
     * secret key shared with clinet.
     *
     * @var string
     */
    public $secret;

    /**
     * Set interval between token refreshes. defualt 17
     *
     * @var int
     */
    public $stepSize;

    /**
     * Set window of concurrently valid codes.
     *
     * @var int
     */
    public $windowSize;

    /**
     * Disable window of concurrently valid codes
     *
     * @var bool
     */
    public $minimalwindow;


    /**
     * Path to log file.
     *
     * @var string
     */
    public $logFile;
}
