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
 * @version  0.1
 * @link     https://github.com/TheWhatis/synchronizer
 */

namespace Whatis\Synchronizer;

/**
 * Интерфейс источника синхронизации
 *
 * @category Synchronizer
 * @package  Whatis\Synchronizer
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/TheWhatis/synchronizer
 */
interface SynchronizerSourceInterface
{
    /**
     * Создать экземпляр источника
     *
     * @param array $settings Настройки
     */
    public function __construct(array $settings);
}
