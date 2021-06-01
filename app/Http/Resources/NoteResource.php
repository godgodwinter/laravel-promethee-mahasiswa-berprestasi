<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Symfony\Component\Routing\Router;

class NoteResource extends JsonResource
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
            'title'=>$this->title,
            'slug'=>$this->slug,
            'subject'=>$this->subject->name,
            'subjectId'=>$this->subject->id,
            'description'=>$this->description,
            'publish'=>Carbon::parse($this->created_at)->diffForHumans(),
            'link' => route('notes.show',[$this->slug])
            // 'link' => route('notes.show',[$this->subject,$this->slug])
            // 'publish'=>Carbon::parse($this->created_at)->format('d F, Y')
            // 'publish'=>$this->created_at->diffForHumans()
        ];
    }
}
