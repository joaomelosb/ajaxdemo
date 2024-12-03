# AJAX DEMO
Esse é um projeto simples de navegação ajax usando php e a interface `XMLHttpRequest`
# Adicionando novas páginas
Primeiro, modifique o arquivo `pages.php`:
```php
$pages = array(
  // ...
  'novapagina' => array(
    'title' => 'Nova Página',
    'path' => 'caminho_pagina.php'
  )
);
```
Então, crie o novo arquivo da seguinte forma, exemplo `caminho_pagina.php`:
```php
<?php include 'page_start.php'; ?>
<h2>Título da nova página</h2>
<p>Conteúdo da nova página. Qualquer conteúdo HTML5.</p>
<?php
define('ID', 'novapagina');

include 'page_end.php';
```
**Importante**: A constante `ID` precisa coincidir com a nova chave de array adicionada no passo anterior.
