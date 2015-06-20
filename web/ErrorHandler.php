<?php
/**
 * ErrorHandler.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\rollbar\web;

/**
 * Class ErrorHandler
 * @package rmrevin\yii\rollbar\console
 */
class ErrorHandler extends \yii\web\ErrorHandler
{

    use \rmrevin\yii\rollbar\traits\ErrorHandlerTrait;
}
