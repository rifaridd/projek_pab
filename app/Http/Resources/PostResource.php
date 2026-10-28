<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public $status;
    public $message;

    // 1. Menerima teks pesan dari Controller
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    // 2. Mencetak pesan tersebut ke dalam format JSON akhir
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message, // <-- Bagian utama pencetak pesan
            'data'      => $this->resource
        ];
    }
}