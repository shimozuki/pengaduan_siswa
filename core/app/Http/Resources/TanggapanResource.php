<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TanggapanResource extends JsonResource
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
            "id_tanggapan" => $this->id_tanggapan,
            "tgl_tanggapan" => $this->tgl_tanggapan,
            "tanggapan" => $this->tanggapan,
            "id_pengaduan" => $this->id_pengaduan,
            "id_petugas" => $this->id_petugas,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
