<?php 

namespace services;

class WeatherApiService {

    private $townName;
    private $townHabitantsNumber; 
    private $townHigh;
    private $townTemp = array();
    private $townMinTemp;
    private $townMaxTemp;
    private $townHumidity;
    private $townWind;
    private $townState;

    public function __construct($codProv, $codMun)
    {   
        $url = "https://www.el-tiempo.net/api/json/v2/provincias/" . $codProv . "/municipios/" . $codMun;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo 'Error al conectarse con la API';
        } else {
            $data = json_decode($response, true);
            if ($data === null) {
                echo 'Error al decodificar la respuesta';
            } else {

                $splitedTitle =  explode("|", $data['title']);
                $this->townName = $splitedTitle[1];
                $this->townHabitantsNumber = $data['municipio']['POBLACION_MUNI'];
                $this->townHigh = $data['municipio']['ALTITUD'];
                $this->townTemp[0] = $data['temperatura_actual'];
                $this->townMinTemp = $data['temperaturas']['min'];
                $this->townMaxTemp = $data['temperaturas']['max'];
                $this->townHumidity = $data['humedad'];
                $this->townWind = $data['viento'];
                $this->townState = $data['stateSky']['description'];

                foreach ($data['proximos_dias'] as $dia) {
                    $i = 0;
                    $i++;
                    $this->townTemp[$i] = $this->calculateAverage($dia['temperatura']['minima'],$dia['temperatura']['maxima']);

                }

            }
        }
    }

    private function calculateAverage($num1, $num2) {
        $average = ($num1 + $num2) / 2;
        return $average;
    }
      

    public function shareWeatherInfo(){
        $aux = array();
        $aux[0] = $this->townName;
        $aux[1] = $this->townTemp;
        $aux[2] = $this->townMinTemp;
        $aux[3] = $this->townMaxTemp;
        $aux[4] = $this->townHumidity;
        $aux[5] = $this->townWind;
        $aux[6] = $this->townState;

        return $aux; 
    }

    public function shareGeographyInfo(){
        $aux = array();
        $aux[0] = $this->townName;
        $aux[1] = $this->townHabitantsNumber;
        $aux[2] = $this->townHigh;

        return $aux; 
    }
}



?> 