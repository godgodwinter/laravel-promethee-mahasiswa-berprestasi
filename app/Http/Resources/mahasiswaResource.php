<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class mahasiswaResource extends JsonResource
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
            'jk'=>$this->jk,
            'hp'=>$this->hp,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            'link' => route('mahasiswa.show',[$this->id])
        ];
    }
}
