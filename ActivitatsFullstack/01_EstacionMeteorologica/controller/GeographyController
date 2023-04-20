<?php 

    require_once "../assets/php/controller/MainController.php";
    require_once "../services/geographyApiService.php";
    require_once "../model/GeographyModel.php";

    namespace controller;

    use MainController;
    use model\GeographyModel;
    use services\WeatherApiService;

    class GeographyController extends MainController{

        public function index()
        {
        }

        public function share()
        {
            $geographyService = new WeatherApiService($_POST['cod_prov'], $_POST['cod_mun']);
            $geographyModel = new GeographyModel;

            $aux = $geographyService->shareGeographyInfo();

            foreach ($geographyModel->getVariables() as $key => $value) {
                $geographyModel->__set($value,$aux[$key]);
            }

            $infoToShare = array();

            foreach ($geographyModel->getVariables() as $key => $variable) {
                $infoToShare[$key] = $variable;
            }
            
            return $infoToShare;

        }
    }
    

?>