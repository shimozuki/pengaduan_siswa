<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengaduanResource extends JsonResource
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
            "id_pengaduan" => $this->id_pengaduan,
            "tgl_pengaduan" => $this->tgl_pengaduan,
            "nik" => $this->nik,
            "judul_laporan" => $this->judul_laporan,
            "isi_laporan" => $this->isi_laporan,
            "foto" => secure_url('storage/images/' . $this->foto),
            "tanggapan" => new TanggapanResource($this->whenLoaded('tanggapan')),
            "status" => ucfirst($this->status),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
