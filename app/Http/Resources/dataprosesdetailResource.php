<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class dataprosesdetailResource extends JsonResource
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
            'thseleksi_id'=>$this->thseleksi_id,
            'kriteria_id'=>$this->kriteria_id,
            'bobot_kd'=>$this->bobot_kd,
            'nama'=>$this->nama,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            // 'link' => route('mahasiswa.show',[$this->id])
        ];
    }
}
