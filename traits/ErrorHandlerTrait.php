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

    /** @var string|\rmrevin\yii\rollbar\Component */
    public $rollbar = 'rollbar';

    /**
     * @return null|\rmrevin\yii\rollbar\Component
     * @throws \yii\base\InvalidConfigException
     */
    protected function getRollbar()
    {
        return is_string($this->rollbar)
            ? \Yii::$app->get($this->rollbar)
            : $this->rollbar;
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
        if ($this->getRollbar()->enabled) {
            \Rollbar::report_exception($exception);
        }

        parent::handleException($exception);
    }
}