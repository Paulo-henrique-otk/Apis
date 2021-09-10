<?php

namespace Source;
class Conversor
{
private int|float $dolar;
private int|float $euro;
public function getConexao(): void
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
public function converterRealDolar(int|float $number): float|int|string
{
  return number_format($number/$this->dolar,2);
}
public function converterRealEuro(int|float $number): float|int|string
{
  return number_format($number/$this->euro,2);
}
public function converterDolarReal(int|float $number): float|int|string
{
  return number_format($number * $this->dolar,2);
}
public function converterEuroReal(int|float $number):float|int|string
{
  return number_format($number * $this->euro,2);
}
}

