<?php

/**
 * PHP Service Bus (publish-subscribe pattern) transport common parts
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

namespace ServiceBus\Transport\Common\Package;

use ServiceBus\Transport\Common\DeliveryDestination;

/**
 * Outbound package
 *
 * @property-read string              $payload
 * @property-read array               $headers
 * @property-read DeliveryDestination $destination
 * @property-read bool                $persistentFlag
 * @property-read bool                $mandatoryFlag
 * @property-read bool                $immediateFlag
 * @property-read int|null            $expiredAfter
 * @property-read string|int          $traceId
 */
class OutboundPackage
{
    /**
     * Message body
     *
     * @var string
     */
    public $payload;

    /**
     * Message headers
     *
     * @var array<string, string|int|float>
     */
    public $headers;

    /**
     * Message destination
     *
     * @var DeliveryDestination
     */
    public $destination;

    /**
     * The message must be stored in the broker
     *
     * @var bool
     */
    public $persistentFlag = false;

    /**
     * The message must be sent to the existing recipient
     *
     * @var bool
     */
    public $mandatoryFlag = false;

    /**
     * The message will be sent with the highest priority
     *
     * @var bool
     */
    public $immediateFlag = false;

    /**
     * The message will be marked expired after N milliseconds
     *
     * @var int|null
     */
    public $expiredAfter;

    /**
     * Trace operation id
     *
     * @var string
     */
    public $traceId;

    /**
     * @param string                          $payload
     * @param array<string, string|int|float> $headers
     * @param DeliveryDestination             $destination
     * @param string|int                      $traceId
     *
     * @return static
     */
    public static function create(string $payload, array $headers, DeliveryDestination $destination, $traceId): self
    {
        return new static($payload, $headers, $destination, $traceId);
    }

    /**
     * @param string                          $payload
     * @param array<string, string|int|float> $headers
     * @param DeliveryDestination             $destination
     * @param string|int                      $traceId
     */
    private function __construct(string $payload, array $headers, DeliveryDestination $destination, $traceId)
    {
        $this->payload     = $payload;
        $this->headers     = $headers;
        $this->destination = $destination;
        $this->traceId     = $traceId;
    }
}