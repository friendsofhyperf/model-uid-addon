<?php

declare(strict_types=1);
/**
 * This file is part of model-uid-addon.
 *
 * @link     https://github.com/friendsofhyperf/model-uid-addon
 * @document https://github.com/friendsofhyperf/model-uid-addon/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Hyperf\Database\Model\Concerns;

use Hyperf\Database\Model\Events\Creating;
use Hyperf\Utils\Str;

trait HasUuids
{
    /**
     * Generate a primary UUID for the model.
     */
    public function creating(Creating $event)
    {
        /** @var self $model */
        $model = $event->getModel();
        foreach ($model->uniqueIds() as $column) {
            if (empty($model->{$column})) {
                $model->{$column} = $model->newUniqueId();
            }
        }
    }

    /**
     * Generate a new UUID for the model.
     *
     * @return string
     */
    public function newUniqueId()
    {
        return (string) Str::orderedUuid();
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array
     */
    public function uniqueIds()
    {
        return [$this->getKeyName()];
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        if (in_array($this->getKeyName(), $this->uniqueIds())) {
            return 'string';
        }

        return $this->keyType;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        if (in_array($this->getKeyName(), $this->uniqueIds())) {
            return false;
        }

        return $this->incrementing;
    }
}
