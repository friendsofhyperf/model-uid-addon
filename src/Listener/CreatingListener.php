<?php

declare(strict_types=1);
/**
 * This file is part of model-uid-addon.
 *
 * @link     https://github.com/friendsofhyperf/model-uid-addon
 * @document https://github.com/friendsofhyperf/model-uid-addon/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\ModelUidAddon\Listener;

use Hyperf\Database\Model\Concerns\HasUlids;
use Hyperf\Database\Model\Concerns\HasUuids;
use Hyperf\Database\Model\Events\Creating;
use Hyperf\Event\Contract\ListenerInterface;

class CreatingListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            Creating::class,
        ];
    }

    public function process(object $event): void
    {
        $model = $event->getModel();
        $class = get_class($model);

        foreach (class_uses_recursive($class) as $trait) {
            if (! in_array($trait, [HasUuids::class, HasUlids::class])) {
                continue;
            }

            (function () {
                foreach ($this->uniqueIds() as $column) {
                    if (empty($this->{$column})) {
                        $this->{$column} = $this->newUniqueId();
                    }
                }
            })->call($model);
        }
    }
}
