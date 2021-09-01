<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="stylesheet" href="<?=asset("css/reset.css")?>">
  <link rel="stylesheet" href="<?=asset("css/result.css")?>">
  <link rel="shortcut icon" href="<?=asset("icons/dinheiro.png")?>" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado da Conversão</title>
</head>
<body>
  <main class="main">
  <h1 class="main__ftext">Resultado da Conversão</h1>
  <p class="main__text">Valor : <?=$cifraValor?><?=$valordigitado?></p>
  <p class="main__text">Resultado : <?=$cifraResult?><?=$resultado?></p>
  <a href="<?=$router->route("h.screen")?>" class="main__link">Home</a>
  </main>
</body>
</html>