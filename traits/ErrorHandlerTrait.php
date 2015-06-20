<?php
/**
 * ErrorHandlerTrait.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\rollbar\traits;

/**
 * Trait ErrorHandlerTrait
 * @package rmrevin\yii\rollbar\traits
 */
trait ErrorHandlerTrait
{

    public $rollbarComponent = 'rollbar';

    /**
     * @return null|\rmrevin\yii\rollbar\Component
     * @throws \yii\base\InvalidConfigException
     */
    protected function getRollbar()
    {
        return is_string($this->rollbarComponent)
            ? \Yii::$app->get($this->rollbarComponent)
            : $this->rollbarComponent;
    }

    /**
     * Handle fatal error
     */
    public function handleFatalError()
    {
        if ($this->getRollbar()->enabled) {
            \Rollbar::report_fatal_error();
        }

        parent::handleFatalError();
    }

    /**
     * Handle errors
     * @param $code
     * @param $message
     * @param $file
     * @param $line
     */
    public function handleError($code, $message, $file, $line)
    {
        if ($this->getRollbar()->enabled) {
            \Rollbar::report_php_error($code, $message, $file, $line);
        }

        parent::handleError($code, $message, $file, $line);
    }

    /**
     * Handle exceptions
     * @param $exception
     */
    public function handleException($exception)
    {
        if ($this->getRollbar()->enabled && !($exception instanceof \yii\web\HttpException && $exception->statusCode == 404)) {
            \Rollbar::report_exception($exception);
        }

        parent::handleException($exception);
    }
}