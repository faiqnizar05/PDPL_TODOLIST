<?php


namespace App\Services;

// Kelas abstrak Handler berfungsi sebagai template dasar untuk membangun handler dalam pola desain Chain of Responsibility.
abstract class Handler
{
    // Properti protected untuk menyimpan referensi ke handler berikutnya dalam rantai.
    protected $nextHandler;

    /**
     * Method untuk mengatur handler berikutnya dalam rantai.
     * @param Handler 
     * @return Handler 
     */
    public function setNext(Handler $handler): Handler
    {
        // Menyimpan referensi handler berikutnya di properti $nextHandler.
        $this->nextHandler = $handler;
        
        // Mengembalikan handler berikutnya agar dapat meneruskan pemanggilan.
        return $handler;
    }

    /**
     * Method untuk menangani request atau meneruskannya ke handler berikutnya.
     * @param mixed $request - Request yang akan diproses.
     * @return mixed - Request atau hasil pemrosesan.
     */
    public function handle($request)
    {
        // Mengecek apakah ada handler berikutnya dalam rantai.
        if ($this->nextHandler) {
            // Jika ada, teruskan request ke handler berikutnya.
            return $this->nextHandler->handle($request);
        }

        // Jika tidak ada handler berikutnya, kembalikan request tanpa perubahan.
        return $request;
    }
}
