<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title><?=$this->e($title)?></title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-success">
  <a class="navbar-brand" href="#">IFRS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
<?php /* <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li> */ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/curso">Curso</a>
          <a class="dropdown-item" href="/componente">Componente</a>
          <a class="dropdown-item" href="/docente">Docente</a>
          <a class="dropdown-item" href="/turma">Turma</a>
        </div>
      </li>
<?php /* <li class="nav-item">
        <a class="nav-link disabled" href="#">Desativado</a>
        </li> */?>
    </ul>
  </div>
</nav>
</head>

<?=$this->section('content');?>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

<?=$this->section('script');?>
</body>
</html>
