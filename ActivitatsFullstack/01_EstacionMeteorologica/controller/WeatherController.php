<?php 

    require_once "../assets/php/controller/MainController.php";
    require_once "../services/WeatherApiService.php";
    require_once "../model/WeatherModel.php";
    namespace controller;

    use MainController;
    use model\WeatherModel;
    use services\WeatherApiService;

    class WeatherController extends MainController{

        public function index()
        {
            
        
        }

        public function share()
        {
            $weatherService = new WeatherApiService($_POST['cod_prov'],$_POST['cod_mun']);
            $weatherModel = new WeatherModel();

            $aux = $weatherService->shareWeatherInfo();

            foreach ($weatherModel->getVariables() as $key => $value) {
                $weatherModel->__set($value,$aux[$key]);
            }

            $infoToShare = array();

            foreach ($weatherModel->getVariables() as $key => $variable) {
                $infoToShare[$key] = $variable;
            }
            
            return $infoToShare;

        }

    }


?> 