<?php

namespace DummyApp\JsonApi\Videos;

use CloudCreativity\LaravelJsonApi\Schema\EloquentSchema;
use DummyApp\Video;

class Schema extends EloquentSchema
{

    /**
     * @var string
     */
    protected $resourceType = 'videos';

    /**
     * @var array|null
     */
    protected $attributes = null;

    /**
     * @param Video $resource
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'uploaded-by' => [
                self::DATA => isset($includeRelationships['uploaded-by']) ?
                    $resource->user : $this->createBelongsToIdentity($resource, 'user'),
            ],
        ];
    }
}

