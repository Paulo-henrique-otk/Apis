<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="shortcut icon" href="<?=asset("icons/moeda-chinesa.png")?>" type="image/x-icon">
  <link rel="stylesheet" href="<?=asset("css/reset.css")?>">
  <link rel="stylesheet" href="<?=asset("css/index.css")?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
</head>
<body>
    <main class="content">
       <h1 class="content__text">Conversor de Moedas</h1>
       <form autocomplete="off" action="<?=$router->route("c.calc")?>" method="POST" class="content__form">
         <label for="value" class="content__p">Valor : </label>
         <input type="text" name="valor" placeholder="100" id="value" class="content__input form__pattern">
         <select name="operation" class="content__select form__pattern">
           <option value="USD">Real->Dolar</option>
           <option value="EUR">Real->Euro</option>
           <option value="USD2">Dolar->Real</option>
           <option value="EUR2">Euro->Real</option>
         </select>
         <button type="submit" class="form__button button__body">Converter</button>
       </form>
    </main>
</body>
</html>