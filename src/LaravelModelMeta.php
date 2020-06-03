<?php

namespace Jantinnerezo\LaravelModelMeta;

trait LaravelModelMeta
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'collection'
    ];

    protected $attributes = [
        'meta' => ''
    ];

    public function getMeta(string $key)
    {
        return $this->meta->get($key) ?? null;
    }

    public function getAllMeta()
    {
        return $this->meta->all();
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
}
