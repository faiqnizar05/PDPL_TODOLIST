<?php


namespace App\Services;


use Illuminate\Support\Facades\Validator;

// Kelas ValidationHandler adalah turunan dari kelas Handler.
class ValidationHandler extends Handler
{
    /**
     * Method untuk menangani request dan melakukan validasi data.
     * @param 
     * @return mixed - Meneruskan request ke handler berikutnya jika validasi lolos.
     * @throws \Exception - Jika validasi gagal, akan melempar Exception.
     */
    public function handle($request)
    {
        // Membuat validator untuk memeriksa data request berdasarkan aturan validasi.
        $validator = Validator::make($request->all(), [
            'name' => 'required',     
            'work' => 'required',     
            'dueDate' => 'required',  
        ]);

        // Mengecek apakah validasi gagal.
        if ($validator->fails()) {
            // Jika validasi gagal, lempar Exception dengan pesan error.
            throw new \Exception("Validation failed: " . implode(", ", $validator->errors()->all()));
        }

        // Jika validasi berhasil, teruskan request ke handler berikutnya dalam rantai.
        return parent::handle($request);
    }
}
