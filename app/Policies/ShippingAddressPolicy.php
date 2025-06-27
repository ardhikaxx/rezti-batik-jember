<?php

namespace App\Policies;

use App\Models\Pembeli;
use App\Models\ShippingAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShippingAddressPolicy
{
    use HandlesAuthorization;

    public function view(Pembeli $pembeli, ShippingAddress $address)
    {
        return $pembeli->id === $address->pembeli_id;
    }

    public function update(Pembeli $pembeli, ShippingAddress $address)
    {
        return $pembeli->id === $address->pembeli_id;
    }

    public function delete(Pembeli $pembeli, ShippingAddress $address)
    {
        return $pembeli->id === $address->pembeli_id;
    }
}