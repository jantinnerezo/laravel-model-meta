<?php

namespace Jantinnerezo\LaravelModelMeta;

trait Metable
{
    /**
     * Initialize the trait
     *
     * @return void
     */
    protected function initializeMetable()
    {
        $this->casts['meta'] = 'collection';
        $this->attributes['meta'] = '';
    }

    public function getMeta(string $key)
    {
        return $this->meta->get($key) ?? null;
    }

    public function getAllMeta(): array
    {
        return $this->meta->all();
    }

    public function getMetaOnly(array $keys): array
    {
        return $this->meta->only($keys)->all();
    }

    public function setMeta(string $key, $value): void
    {
        $this->meta = $this->meta->put($key, $value);
        $this->save();
    }

    public function syncMeta(array $values): void
    {
        $this->meta = $this->meta->merge($values ?? []);
        $this->save();
    }

    public function removeMeta(string $key): void
    {
        $this->meta = $this->meta->pull($key);
        $this->save();
    }
}
