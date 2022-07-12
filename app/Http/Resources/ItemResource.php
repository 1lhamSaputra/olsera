<?php

namespace App\Http\Resources;

use App\Models\Pajak;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pajak = [];

        $dataPajak = explode(',', $this->pajak);

        // echo $request->id; return;

        // print_r($dataPajak); return;

        for ($i=0; $i < count($dataPajak); $i++) { 
            # code...
            $data = Pajak::findOrFail($dataPajak[$i]);
            if ($data) {
                # code...
                array_push($pajak, $data);
            }
        }

        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'pajak' => $pajak,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
