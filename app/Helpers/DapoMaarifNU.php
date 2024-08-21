<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;
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
            ->withToken('7FJ9KP0Q3W8H6R2D5T1V')
            ->get("http://dapo.maarifnu.or.id/pusatdata/pendidikan/". $npsn);

            if ($response->successful()) {
                $jsonResponse = $response->json();
                return $this->set(true, $jsonResponse);

            }  elseif ($response->failed()) {
                $statusCode = $response->status();
                $errorBody = $response->json(); // The response body that might contain error details
                
                if ($statusCode == 400) {
                    return $this->set(false, "NPSN tidak ditemukan");
                } else {
                    // Handle other types of errors
                    return $this->set(false, $errorBody["error"]);
                }

            } else {
                return $this->set(false, "Crawling status in not successed");
            }
        } catch (\Exception $err) {
            return $this->set(false, "Server dalam masalah untuk pengecekan NPSN");

        }
    }

}
