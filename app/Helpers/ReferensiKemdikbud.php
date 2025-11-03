<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class ReferensiKemdikbud {

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
            $response = Http::withOptions(['verify' => false])->get("https://referensi.data.kemdikbud.go.id/pendidikan/npsn/".$npsn);

            if ($response->successful() || $response->serverError()) {
                $html = $response->body();

                // Create a new instance of Symfony's DomCrawler
                $crawler = new Crawler($html);

                // Extract the data you want using DOM traversal methods
                $tableRows = $crawler->filter('table tr');
                $dataList = [];

                if ($tableRows->count() > 1) {
                    $tableRows->each(function (Crawler $row) use (&$dataList) {
                        // Extract the data from each table row
                        $rowData = $row->filter('td');
                        //Verify colomn count not single
                        if ($rowData->count() > 1) {
                            $keystring = trim(strtolower($rowData->eq(1)->text()));
                            $keystring = preg_replace('/[^a-zA-Z\s]+/', "", $keystring);
                            //Replace whitespace to underscore
                            $arrKey = str_replace(" ", "_", $keystring);
                            //Verify key in not whitespace
                            if ($arrKey) {
                                $dataList[$arrKey] = trim($rowData->eq(3)->text());
                            }
                        }
                    });
                }

                if (count($dataList) > 0) return $this->set(true, $dataList);

                return $this->set(false, "NPSN tidak ditemukan");

            } else {
                return $this->set(false, "Crawling status in not successed");
            }
        } catch (\Exception $err) {
            return $this->set(false, "Server dalam masalah untuk pengecekan NPSN");

        }
    }

}
