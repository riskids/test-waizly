<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\ItemsRequest;
use App\Services\ItemsService;
use Illuminate\Http\Response;

class ItemsController extends Controller
{
    protected $ItemsService;

    public function __construct(ItemsService $ItemsService)
    {
        $this->ItemsService = $ItemsService;
    }

    public function get()
    {
        $data = $this->ItemsService->get();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $data,
        ],200);
    }
    
    public function store(ItemsRequest $request)
    {
        try {
            $data = $this->ItemsService->create($request->all());
    
            return response()->json([
                'code' => Response::HTTP_OK,
                'message' => 'Item created successfully',
                'data' => $data
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'code' => $e->getCode(),
                'message' => 'There was an error while processing your request',
                'data' => null
            ], 500);
        }
    }

    public function update(ItemsRequest $request, $id)
    {
        try {
            $data = $this->ItemsService->update($id, $request->all());
    
            return response()->json([
                'code' => Response::HTTP_OK,
                'message' => 'Item updated successfully',
                'data' => $data
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'code' => $e->getCode(),
                'message' => 'There was an error while processing your request',
                'data' => null
            ], 500);
        }
    }

    public function detail($id)
    {
        $data = $this->ItemsService->detail($id);

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $data,
        ],200);
    }

    public function destroy($id)
    {
        $data = $this->ItemsService->delete($id);

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Item Deleted'
        ],200);
    }
}
