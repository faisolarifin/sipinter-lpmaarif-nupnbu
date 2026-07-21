<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class DapoMaarifNU {

    private bool $status;
    private $result;

    private function set(bool $status, $result) {
        $this->status = $status;
        $this->result = $result;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getResult() {
        return $this->result;
    }

    public function clone($npsn)
    {
        try {
            $response = Http::withOptions(['verify' => false])
            ->withToken(config('services.dapo.token'))
            ->get(config('services.dapo.url') . '/' . $npsn);

            if ($response->successful()) {
                $jsonResponse = $response->json();
                return $this->set(true, $jsonResponse);

            }  elseif ($response->failed()) {
                $statusCode = $response->status();
                $errorBody = $response->json(); // The response body that might contain error details
                
                if ($statusCode == 400) {
                    Log::warning("DapoMaarifNU: NPSN {$npsn} tidak ditemukan (HTTP 400)");
                    return $this->set(false, "NPSN {$npsn} tidak ditemukan di Dapo Maarif NU");
                } else {
                    Log::error("DapoMaarifNU: HTTP {$statusCode} untuk NPSN {$npsn}", ['body' => $errorBody]);
                    return $this->set(false, "Gagal mengakses API Dapo Maarif NU untuk NPSN {$npsn}: HTTP {$statusCode}, " . ($errorBody["error"] ?? 'tidak ada detail error'));
                }

            } else {
                Log::error("DapoMaarifNU: Response tidak terduga untuk NPSN {$npsn}");
                return $this->set(false, "Gagal mengakses API Dapo Maarif NU untuk NPSN {$npsn}: response tidak terduga");
            }
        } catch (\Exception $err) {
            Log::error("DapoMaarifNU: Exception NPSN {$npsn} - {$err->getMessage()}", ['exception' => $err]);
            return $this->set(false, "Koneksi ke Dapo Maarif NU gagal saat mengecek NPSN {$npsn}");

        }
    }

}
