<?php
/**
 * Component.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\rollbar;

/**
 * Class Component
 * @package rmrevin\yii\rollbar
 */
class Component extends \yii\base\Object
{

    public $enabled = true;
    public $useLogger = true;

    public $accessToken;
    public $agentLogLocation = '@app/runtime/rollbar';
    public $baseApiUrl = 'https://api.rollbar.com/api/1/';
    public $batchSize = 50;
    public $batched = true;
    public $branch = 'master';
    public $captureErrorStacktraces = true;
    public $codeVersion;
    public $environment = 'production';
    public $errorSampleRates = [];
    public $handler = 'blocking';
    public $host;
    public $includedErrno;
    public $logger;
    public $person;
    public $personFn;
    public $root = '@app';
    public $scrubFields = ['passwd', 'password', 'secret', 'confirm_password', 'password_confirmation', 'auth_token', 'csrf_token'];
    public $shiftFunction = true;
    public $timeout = 3; // seconds
    public $reportSuppressed = false;
    public $useErrorReporting = false;
    public $proxy;

    public function init()
    {
        $this->enabled = $this->enabled !== false;

        if ($this->enabled === true) {
            if (empty($this->accessToken)) {
                throw new \yii\base\InvalidConfigException(sprintf('`rollbar\Component::%s` must be specified.', 'accessToken'));
            }

            $logger = $this->logger;
            if (!($logger instanceof \iRollbarLogger) && $this->useLogger === true) {
                $logger = new Logger();
            }

            $config = [
                'access_token' => $this->accessToken,
                'agent_log_location' => $this->agentLogLocation,
                'base_api_url' => $this->baseApiUrl,
                'batch_size' => $this->batchSize,
                'batched' => $this->batched,
                'branch' => $this->branch,
                'capture_error_stacktraces' => $this->captureErrorStacktraces,
                'code_version' => $this->codeVersion,
                'environment' => $this->environment,
                'error_sample_rates' => $this->errorSampleRates,
                'handler' => $this->handler,
                'host' => $this->host,
                'included_errno' => $this->includedErrno,
                'logger' => $logger,
                'person' => $this->person,
                'person_fn' => $this->personFn,
                'root' => \Yii::getAlias($this->root),
                'scrub_fields' => $this->scrubFields,
                'shift_function' => $this->shiftFunction,
                'timeout' => $this->timeout,
                'report_suppressed' => $this->reportSuppressed,
                'use_error_reporting' => $this->useErrorReporting,
                'proxy' => $this->proxy,
            ];

            \Rollbar::init($config, false, false);
        }

        parent::init();
    }
}
