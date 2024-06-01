<?php
/**
 * FlameCore Synchronizer
 * Copyright (C) 2017 IceFlame.net
 *
 * Permission to use, copy, modify, and/or distribute this software for
 * any purpose with or without fee is hereby granted, provided that the
 * above copyright notice and this permission notice appear in all copies.
 *
 * PHP version 8
 *
 * @category Synchronizer
 * @package  CashCarryShop\Synchronizer
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @version  1.0.0
 * @link     https://github.com/cashcarryshop/synchronizer
 */

namespace CashCarryShop\Synchronizer;

/**
 * Интерфейс фабрики синхронизаций
 *
 * @category Synchronizer
 * @package  CashCarryShop\Synchronizer
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  Unlicense <https://unlicense.org>
 * @link     https://github.com/cashcarryshop/synchronizer
 */
interface SynchronizerFactoryInterface
{
    /**
     * Создать синхронизацию
     *
     * @param array $sourceSettings Настройки для источника
     * @param array $targetSettings Настройки для цели
     *
     * @return SynchronizerInterface
     */
    public function create(
        array $sourceSettings,
        array $targetSettings
    ): SynchronizerInterface;

    /**
     * Создать источник синхронизации
     *
     * @param array $settings Настройки
     *
     * @return SynchronizerSourceInterface
     */
    public function createSource(array $settings): SynchronizerSourceInterface;

    /**
     * Создать цель синхронизации
     *
     * @param array $settings Настройки
     *
     * @return SynchronizerTargetInterface
     */
    public function createTarget(array $settings): SynchronizerTargetInterface;
}
