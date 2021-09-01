<?php
namespace Source;
class Conversor{
private float $dolar;
private float $euro;
public function __construct()
{
  $curl = curl_init();
  curl_setopt_array($curl,[
  CURLOPT_URL => "https://api.hgbrasil.com/finance?key=2729234a",
  CURLOPT_RETURNTRANSFER => true
  ]);
  $reposta = curl_exec($curl);
  $repostaArray = json_decode($reposta,true);
  $this->dolar = $repostaArray["results"]["currencies"]["USD"]["buy"];
  $this->euro = $repostaArray["results"]["currencies"]["EUR"]["buy"];
}
public function converterRealDolar(float $number):float{
  return number_format($number/$this->dolar,2);
}
public function converterRealEuro(float $number):float{
  return number_format($number/$this->euro,2);
}
public function converterDolarReal(float $number){
  return number_format($number * $this->dolar,2);
}
public function converterEuroReal(float $number){
  return number_format($number * $this->euro,2);
}
}

