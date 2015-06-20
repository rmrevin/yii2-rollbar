<?php
/**
 * ErrorHandler.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\rollbar\console;

/**
 * Class ErrorHandler
 * @package rmrevin\yii\rollbar\console
 */
class ErrorHandler extends \yii\console\ErrorHandler
{

    use \rmrevin\yii\rollbar\traits\ErrorHandlerTrait;
}
