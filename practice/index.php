<?php
  if(isset($_POST["submit"])) {
    $fileName = $_POST["name"];
    $content = $_POST["content"];

    //echo "echo \"$content\" >> files/$fileName";
    shell_exec("echo \"$content\" >> files/$fileName");
    header("location:index.php");
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Reader application</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Reader</a>
    <form action="view.php" method="GET" class="searchform">
      <input name="file" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search by file name">
    </form>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <span data-feather="home"></span>
                Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <h2>Inserir arquivo</h2>
        <form class="needs-validation" action="index.php" method="POST" name="myForm">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nome do arquivo</label>
              <input type="text" class="form-control" id="firstName" name="name">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Conteúdo</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
          </div>
          <button class="btn btn-primary btn btn-block" type="submit" name="submit">Adicionar</button>
        </form>
        <hr class="mb-4">

        <h2>Arquivos disponíveis</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
<?php
  $dir = "files";
  $result = shell_exec("ls -p $dir | grep -v /");
  foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $key=>$line){
?>
              <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $line; ?></td>
                <td>
                  <a class="action-link" href="view.php?file=<?php echo $line; ?>">
                    <span data-feather="eye"></span>
                  </a>
                </td>
              </tr>
<?php
  }
?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>