<?php

namespace App\Actions;

use App\Models\Store;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StoresAction
{
    public function getAllStores()
    {
        return Store::all();
    }

    public function createStore($data)
    {
        return Store::create($data);
    }

    public function getStore($id)
    {
        return Store::findOrFail($id);
    }

    public function updateStore($id, $data)
    {
        $store = Store::findOrFail($id);
        $store->update($data);
        return $store;
    }

    public function deleteStore($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return $store;
    }
}
