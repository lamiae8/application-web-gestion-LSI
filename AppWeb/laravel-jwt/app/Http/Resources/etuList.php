<?php

namespace App\Http\Resources;
use App\Models\Etudiant;
use Illuminate\Http\Resources\Json\JsonResource;

class etuList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'cne'         => $this->cne,
            'semester' => $this->semester_id,
        ];
    }
}
