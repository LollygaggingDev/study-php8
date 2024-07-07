<?php

class LargeFileDownloader {

    private $url;
    private $filePath;

    public function __construct($url, $filePath) {
        $this->url = $url;
        $this->filePath = $filePath;
    }

    public function download() {
        $this->downloadWithCurl($this->url, $this->filePath);
    }

    private function downloadWithCurl($url, $filePath) {

        set_time_limit(0);

        $targetFilePath = dirname(__FILE__) . '/' . $filePath;
        printf("Target file path is $targetFilePath\n");

        $fp = fopen ($targetFilePath, 'w+');
        $ch = curl_init(str_replace(" ","%20", $url));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_FILE, $fp); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_exec($ch); 

        if (curl_errno($ch)) {
            $errorMsg = curl_error($ch);
            printf("Error received while downloading file $errorMsg");
        }

        curl_close($ch);

        fclose($fp);
    }
}