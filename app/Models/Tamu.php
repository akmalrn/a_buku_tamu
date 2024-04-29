<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_telp',
        'email',
        'kategori',
        'tujuan',
        'image_path', // Tambahkan kolom untuk menyimpan path gambar
    ];

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = Carbon::createFromFormat('Y-m-d', $value);
    }

    // Accessor untuk format tanggal_masuk
    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getFullImagePathAttribute()
    {
        return asset('storage/images/' . $this->image_path);
    }

    public static function rules()
    {
        return [
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'kategori' => 'required',
            'tujuan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function getDailyData()
    {
        // Implementasi logika untuk mendapatkan data harian
        // Misalnya, menggunakan Eloquent Query untuk mengambil data dari database
        return $this->whereDate('created_at', now()->toDateString())->get();
    }
}
