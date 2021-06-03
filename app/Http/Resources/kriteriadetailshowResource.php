<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class kriteriadetailshowResource extends JsonResource
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
            'nama'=>$this->nama,
            'bobot'=>$this->bobot,
            'kriteria_id'=>$this->kriteria_id,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            // 'link' => route('mahasiswa.show',[$this->id])
        ];
    }
}
