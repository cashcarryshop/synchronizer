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
 * Абстрактный класс синхронизатора
 *
 * @category Synchronizer
 * @package  Whatis\Synchronizer
 * @author   Christian Neff <christian.neff@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/TheWhatis/synchronizer
 */
abstract class AbstractSynchronizer implements SynchronizerInterface
{
    /**
     * Источник
     *
     * @var SynchronizerSourceInterface
     */
    protected SynchronizerSourceInterface $source;

    /**
     * Цель
     *
     * @var SynchronizerTargetInterface
     */
    protected SynchronizerTargetInterface $target;

    /**
     * Диспетчер событий
     *
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $dispatcher;

    /**
     * Создать экземпляр синхронизации
     *
     * @param SynchronizerSourceInterface $source Источник
     * @param SynchronizerTargetInterface $target Цель
     */
    public function __construct(
        SynchronizerSourceInterface $source,
        SynchronizerTargetInterface $target
    ) {
        $this->setSource($source);
        $this->setTarget($target);
    }

    /**
     * Установить источник
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return static
     */
    public function setSource(SynchronizerSourceInterface $source): static
    {
        if (!$this->supportsSource($source)) {
            throw new \InvalidArgumentException(sprintf('%s does not support %s.', get_class($this), get_class($source)));
        }

        $this->source = $source;
        return $this;
    }

    /**
     * Установить цель
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return static
     */
    public function setTarget(SynchronizerTargetInterface $target): static
    {
        if (!$this->supportsTarget($target)) {
            throw new \InvalidArgumentException(sprintf('%s does not support %s.', get_class($this), get_class($target)));
        }

        $this->target = $target;
        return $this;
    }

    /**
     * Установить наблюдателя
     *
     * @param EventDispatcherInterface $dispatcher Наблюдатель
     *
     * @return static
     */
    public function observe(EventDispatcherInterface $dispatcher): static
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

    /**
     * Вызвать уведомление
     *
     * @return void
     */
    public function event(): void
    {
        if (isset($this->dispatcher)) {
            $this->dispatcher->dispatch(...func_get_args());
        }
    }
}
