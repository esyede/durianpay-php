<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Order;

class Items
{
    private $items = [];

    public function add(string $name, int $qty, int $price, string $logoUrl)
    {
        $this->items[] = [
            'name' => $name,
            'qty' => $qty,
            'price' => $price . '.00',
            'logo' => $logoUrl,
        ];

        return $this;
    }

    public function all()
    {
        return $this->items;
    }

    public function empty()
    {
        return count($this->items) <= 0;
    }

    public function reset()
    {
        $this->items = [];

        return $this;
    }
}
