<?php

namespace Twyco\ImageSystem\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenericPaginationResource extends JsonResource
{
    public function __construct($ressource, protected $dataClass)
    {
        parent::__construct($ressource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->dataClass::collection($this->items()),
            'lastPage' => $this->lastPage(),
            'currentPage' => $this->currentPage(),
            'total' => $this->total(),
            'perPage' => $this->perPage(),
        ];
    }
}
