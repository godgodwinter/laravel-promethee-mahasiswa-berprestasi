<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class dataprosesResource extends JsonResource
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
            'nim'=>$this->nim,
            'nama'=>$this->nama,
            'jurusan'=>$this->jurusan,
            'thseleksi_id'=>$this->thseleksi_id,
            'hasilhitung'=>$this->hasilhitung,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            // 'link' => route('mahasiswa.show',[$this->id])
        ];
    }
}
