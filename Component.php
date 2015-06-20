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

    public $baseApiUrl;
    public $accessToken;
    public $environment;
    public $branch;
    public $batched;
    public $batchSize;
    public $person;
    public $person_fn;
    public $handler = 'blocking';
    public $logger;
    public $root = '@app';
    public $timeout = 3; // seconds
    public $scrub_fields = ['passwd', 'password', 'secret', 'confirm_password', 'password_confirmation', 'auth_token', 'csrf_token'];

    public function init()
    {
        if (empty($this->accessToken)) {
            throw new \yii\base\InvalidConfigException(sprintf('`rollbar\Component::%s` must be specified.', 'accessToken'));
        }

        $config = [
            'access_token' => $this->accessToken,
            'environment' => $this->environment,
            'branch' => $this->branch,
            'batched' => $this->batched,
            'batch_size' => $this->batchSize,
            'handler' => $this->handler,
            'timeout' => $this->timeout,
            'logger' => $this->logger,
            'base_api_url' => $this->baseApiUrl,
            'root' => \Yii::getAlias($this->root),
        ];

        if (!empty($this->person)) {
            $config['person'] = $this->person;
        }

        if (!empty($this->scrub_fields)) {
            $config['scrub_fields'] = $this->scrub_fields;
        }

        if (is_callable($this->person_fn)) {
            $config['person_fn'] = $this->person_fn;
        }

        \Rollbar::init($config, false, false);

        parent::init();
    }
}
