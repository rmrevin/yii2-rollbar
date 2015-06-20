<?php
/**
 * Logger.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\rollbar;

/**
 * Class Logger
 * @package rmrevin\yii\rollbar
 */
class Logger implements \iRollbarLogger
{

    const LOG_CATEGORY = 'Rollbar';

    /**
     * @param string $level
     * @param string $msg
     */
    public function log($level, $msg)
    {
        switch ($level) {
            default:
            case 'INFO':
                \Yii::info($msg, static::LOG_CATEGORY);
                break;
            case 'WARNING':
                \Yii::warning($msg, static::LOG_CATEGORY);
                break;
            case 'ERROR':
                \Yii::error($msg, static::LOG_CATEGORY);
                break;
        }
    }
}