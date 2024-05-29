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
 * @package  Whatis\Synchronizer
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @version  1.0.0
 * @link     https://github.com/TheWhatis/synchronizer
 */

namespace Whatis\Synchronizer;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Интерфейс синхронизатора
 *
 * @category Synchronizer
 * @package  Sizya
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  Unlicense <https://unlicense.org>
 * @link     https://github.com/TheWhatis/synchronizer
 */
interface SynchronizerInterface
{
    /**
     * Синхронизировать
     *
     * @param array $settings Настройки для синхронизации
     *
     * @return bool
     */
    public function synchronize(array $settings = []): bool;

    /**
     * Установить источник
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return static
     */
    public function setSource(SynchronizerSourceInterface $source): static;

    /**
     * Установить цель
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return static
     */
    public function setTarget(SynchronizerTargetInterface $target): static;

    /**
     * Проверить, поддерживается ли источник
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return bool
     */
    public function supportsSource(SynchronizerSourceInterface $source): bool;

    /**
     * Проверить, поддерживается ли цель
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return bool
     */
    public function supportsTarget(SynchronizerTargetInterface $target): bool;

    /**
     * Установить наблюдатель
     *
     * @param EventDispatcherInterface $dispatcher Наблюдатель
     *
     * @return static
     */
    public function observe(EventDispatcherInterface $dispatcher): static;
}
