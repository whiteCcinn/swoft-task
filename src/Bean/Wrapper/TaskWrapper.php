<?php

namespace Swoft\Task\Bean\Wrapper;

use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Value;
use Swoft\Bean\Wrapper\AbstractWrapper;
use Swoft\Task\Bean\Annotation\Task;
use Swoft\Task\Bean\Annotation\Scheduled;

/**
 * 任务注解封装器
 *
 * @uses      TaskWrapper
 * @version   2017年09月24日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class TaskWrapper extends AbstractWrapper
{
    /**
     * 类注解
     *
     * @var array
     */
    protected $classAnnotations
        = [
            Task::class
        ];

    /**
     * 属性注解
     *
     * @var array
     */
    protected $propertyAnnotations
        = [
            Inject::class,
            Value::class,
        ];

    /**
     * 方法注解
     *
     * @var array
     */
    protected $methodAnnotations
        = [
            Scheduled::class
        ];

    /**
     * 是否解析类注解
     *
     * @param array $annotations
     *
     * @return bool
     */
    public function isParseClassAnnotations(array $annotations): bool
    {
        return isset($annotations[Task::class]);
    }

    /**
     * 是否解析属性注解
     *
     * @param array $annotations
     *
     * @return bool
     */
    public function isParsePropertyAnnotations(array $annotations): bool
    {
        return isset($annotations[Inject::class]) || isset($annotations[Value::class]);
    }

    /**
     * 是否解析方法注解
     *
     * @param array $annotations
     *
     * @return bool
     */
    public function isParseMethodAnnotations(array $annotations): bool
    {
        return isset($annotations[Scheduled::class]);
    }
}
