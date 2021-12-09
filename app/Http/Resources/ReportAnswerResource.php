<?php

namespace App\Http\Resources;

use App\Http\Resources\AnswerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'reporter'=>$this->user,
            'reported answer'=>$this->answer,
            'forum'=>$this->answer->forum
        ];
    }
}
