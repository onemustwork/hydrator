<?php

namespace OneMustWork\Hydrator;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Hydrator
 * @package OneMustWork\Hydrator
 */
class Hydrator implements HydratorInterface
{
    /** @var array */
    protected $normalizers = [];

    /** @var array */
    protected $serializers = [];

    /**
     * Hydrator constructor.
     */
    public function __construct()
    {
        $this->normalizers[] = new ObjectNormalizer();
}

    /**
     * @inheritdoc
     */
    public function hydrate($object, array $array)
    {
        return $this->getSerializer()
            ->denormalize($array, get_class($object), null, ['object_to_populate' => $object]);
    }

    /**
     * @inheritdoc
     */
    public function extract($object)
    {
        return $this->getSerializer()->normalize($object);
    }

    /**
     * @return Serializer
     */
    protected function getSerializer()
    {
        return new Serializer($this->normalizers, $this->serializers);
    }
}