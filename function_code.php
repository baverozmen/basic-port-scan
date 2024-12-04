<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

function scanner($json_file) {
    $reason = [];
    $json_data = file_get_contents($json_file);
    $ports = json_decode($json_data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die("JSON dosyası hatalı: " . json_last_error_msg());
    }

    $ip_input = readline("Lütfen IP adresi girin: ");
    if (!filter_var($ip_input, FILTER_VALIDATE_IP)) {
        die("Geçersiz bir IP adresi girdiniz.\n");
    }

    $client = new Client();
    foreach ($ports['ports'] as $port => $description) {
        echo "Port $port ($description) kontrol ediliyor...\n";

        try {
            if (in_array($port, [80, 8080, 443])) { // HTTP destekleyen portlar
                $response = $client->get("http://$ip_input:$port", ['timeout' => 30]);
                echo "Port $port açık! Durum Kodu: " . $response->getStatusCode() . "\n";

                $reason[] = "Port $port ($description)";
            } else {
                echo "Port $port HTTP üzerinden test edilemiyor. fsockopen ile kontrol ediliyor...\n";
                $connection = @fsockopen($ip_input, $port, $errno, $errstr, 2);

                if (is_resource($connection)) {
                    echo "Port $port açık!\n";
                    $reason[] = "Port $port ($description)";

                    fclose($connection);
                
                } else {
                    echo "Port $port kapalı: $errstr\n";
                }
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo "Port $port kontrol edilemedi: " . $e->getMessage() . "\n";
            continue;
        }
    }
    $dosya = readline("dosya ismini giriniz: ");
    $file = fopen($dosya,"w");
    if($file){
        foreach($reason as $reas){
            fwrite($file, "açık olan port: $reas\n");
        
    }
    fclose();
    }else{
        echo "dosya oluşturulamadı";    
    }

}
