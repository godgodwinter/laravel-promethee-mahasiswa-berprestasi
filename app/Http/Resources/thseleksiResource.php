<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class thseleksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'tahun'=>$this->tahun,
            'kuota'=>$this->kuota,
            'status'=>$this->status,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            // 'link' => route('mahasiswa.show',[$this->id])
        ];
    }
}
