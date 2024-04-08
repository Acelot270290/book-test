<?php

namespace App\Http\Controllers;

use App\Actions\StoresAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    protected $storesAction;

    public function __construct(StoresAction $storesAction)
    {
        $this->storesAction = $storesAction;
    }

    public function index()
    {
        return response()->json($this->storesAction->getAllStores());
    }

    public function store(StoreRequest $request)
    {
        $store = $this->storesAction->createStore($request->all());
        return response()->json(['message' => 'Store created successfully', 'store' => $store], 201);
    }

    public function show($id)
    {
        try {
            $store = $this->storesAction->getStore($id);
            return response()->json($store);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    }

    public function update(StoreRequest $request, $id)
    {
        try {
            $store = $this->storesAction->updateStore($id, $request->all());
            return response()->json(['message' => 'Store updated successfully', 'store' => $store]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    }
    public function destroy($id)
    {
        try {
            $this->storesAction->deleteStore($id);
            return response()->json(['message' => 'Store deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Store not found'], 404);
        }
    }
}
