<?php

/**
 * PHP Service Bus (publish-subscribe pattern) transport common parts
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

namespace ServiceBus\Transport\Common\Exceptions;

/**
 * Error creating queue
 */
final class CreateQueueFailed extends \RuntimeException implements TransportFail
{

}