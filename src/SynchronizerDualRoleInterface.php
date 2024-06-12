<?php
/**
 * Конечная точка синхронизации (и цель, и источник)
 *
 * PHP version 8
 *
 * @category Synchronizer
 * @package  CashCarryShop\Synchronizer
 * @author   TheWhatis <anton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @version  0.1
 * @link     https://github.com/cashcarryshop/synchronizer
 */

namespace CashCarryShop\Synchronizer;

/**
 * Конечная точка синхронизации (и цель, и источник)
 *
 * @category Synchronizer
 * @package  CashCarryShop\Synchronizer
 * @author   TheWhatis <anton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/cashcarryshop/synchronizer
 */
interface SynchronizerDualRoleInterface extends SynchronizerSourceInterface, SynchronizerTargetInterface
{
    // ...
}
