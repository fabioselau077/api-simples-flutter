<?php
include_once "conexao.php";
header("Content-type: text/html; charset=utf-8"); 
?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Listar Contatos - Selau</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a  class="simple-text">
                    <img src="assets/img/logo.png">
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="pe-7s-users"></i>
                        <p>Listar Contatos</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <center><a class="navbar-brand" href="#">Contatos</a></center>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <center><h4 class="title">Listar Contatos</h4></center>
                            </div>
                            <div class="content table-responsive table-full-width">
<?php //consultar no banco de dados
$result_usuario = "SELECT * from contatos ORDER BY id ASC";
$resultado_usuario = mysqli_query($conn, $result_usuario); 
 ?>
<?php
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Conteúdo</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                ?>
                <tr>
                    <th><?php echo $row_usuario['id']; ?></th>
                    <th><?php echo utf8_encode($row_usuario['nome']); ?></th>
                    <th><?php echo utf8_encode($row_usuario['conteudo']); ?></th>
                    <td><?php echo date('d/m/Y',strtotime($row_usuario['data'])); ?></td>

                    <td><center><i> <a href="#""><span style="color: black" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-edit"></i></span></a></i><i> <i> <a href="#"><span style="color: black" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-eye"></i><i> <a href="#"><span style="color: red" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-remove"></i></span></a></i></center></span></a></i><i></td>
                </tr>
                <?php
            }?>
        </tbody>
    </table>
<?php
}else{
    echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
} ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    
Copyright © 2019 All rights reserved <br>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>