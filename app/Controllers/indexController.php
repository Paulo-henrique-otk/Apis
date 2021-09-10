<?php

namespace App\Controllers;

use League\Plates\Engine;
use Source\Conversor;

class indexController
{
 private  $view;
 private  $router;
 function __construct($router)
 {
   $this->view = Engine::create(__DIR__ . "/../views","php");
   $this->router = $router;
   $this->view->addData(["router"=>$router]);
 } 
 public function home()
 {
 echo $this->view->render("home");
 }
 public function calcularMoeda(array $data)
 {
     $pattern = "/^(\d+)(.?)(,?)(\d+?)$/";
     $conversor = new Conversor();
     $conversor->getConexao();
     $valor = $data["valor"];
     $moeda = $data["operation"];
     if(preg_match($pattern, $valor,$matches)>0){
      if(strpos($valor,",")!==false){
      $valor = preg_replace($pattern,"$1.$4",$valor);
      }
          if ($moeda == "USD") {
              $_SESSION["resultado"] = $conversor->converterRealDolar(floatval($valor));
              $_SESSION["cifravalor"] = "R$";
              $_SESSION["cifraresult"] = "USD$";
          } else if($moeda == "EUR"){
              $_SESSION["resultado"] = $conversor->converterRealEuro(floatval($valor));
              $_SESSION["cifravalor"] = "R$";
              $_SESSION["cifraresult"] = "EUR$";
          }else if($moeda == "USD2"){
            $_SESSION["resultado"] = $conversor->converterDolarReal(floatval($valor));
            $_SESSION["cifravalor"] = "USD$";
            $_SESSION["cifraresult"] = "R$";
        }else if($moeda == "EUR2"){
          $_SESSION["resultado"] = $conversor->converterEuroReal(floatval($valor));
          $_SESSION["cifravalor"] = "EUR$";
          $_SESSION["cifraresult"] = "R$";
      }
          $_SESSION["valordigitado"] = $valor;
          $this->router->redirect("r.screen");  
     }else{
       $this->router->redirect("h.screen");
     }
   
 }
 public function result()
 {
   if (isset($_SESSION["resultado"])) {
       echo $this->view->render("result",["valordigitado"=>$_SESSION["valordigitado"],
  "resultado"=>$_SESSION["resultado"],
  "cifraValor"=>$_SESSION["cifravalor"],
  "cifraResult"=>$_SESSION["cifraresult"]
]);
   }else{
     $this->router->redirect("h.screen");
   }
 }
}