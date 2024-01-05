<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponseTrait
{
    /**
     * Render Response in \Illuminate\Http\JsonResponse format
     *
     * @param  mixed  $status
     * @param  mixed  $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginatedApiResponse(string $status, string $message, int $code, $data = null)
    {
        $result = [
            'status' => $status,
            'meta' => [
                'message' => $message,
            ],
        ];

        if ($data) {

            $paginatedData = $this->paginationHandler($data);

            $result['meta'] = array_merge($result['meta'], [
                'pagination' => $paginatedData['meta'],
            ]);

            $result = array_merge($result, [
                'data' => $paginatedData['data'],
            ]);
        }

        return response()->json($result, $code);
    }

    public function specificApiResponse(string $status, string $message, int $code, $data = null)
    {
        $result = [
            'status' => $status,
            'meta' => [
                'message' => $message,
            ],
        ];

        if ($data) {

            $result = array_merge($result, [
                'data' => $data,
            ]);
        }

        return response()->json($result, $code);
    }

    protected function paginationHandler($collection)
    {
        $currentPage = request('page', 1);
        $perPageResult = request('per_page', 15);

        $result = new LengthAwarePaginator(
            $collection->forPage($currentPage, $perPageResult),
            $collection->count(),
            $perPageResult,
            $currentPage,
        );

        $paginatedMetaResponse = [
            'total_data' => $result->total(),
            'count' => $result->count(),
            'per_page' => $result->perPage(),
            'current_page' => $result->currentPage(),
            'last_page' => $result->lastPage(),
        ];

        $resultData = $result->values();

        return [
            'meta' => $paginatedMetaResponse,
            'data' => $resultData,
        ];
    }
}
