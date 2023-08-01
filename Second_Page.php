<?php
include('conexao_pesquisa.php');
$id = $_GET['id_tag'];

$sql_codigo = "SELECT * FROM `dados` WHERE id_tag = '$id'";
$query_codigo = $conexao->query($sql_codigo) or die(mysqli_error($conexao));
$code = $query_codigo->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title><?php echo $code['id_tag']; ?></title><!-- pegar nome da tag do banco -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body style="background-color: rgb(246, 246, 246, 0.55);" id="page-top">

    <nav class="navbar navbar-expand-lg navbar-black" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Coding' Nest</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu<i class="fas fa-bars"></i></button>
            <div class="offcanvas offcanvas-start d-xxl-none d-xl-none d-lg-none" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Conteúdo da página</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="menu_esquerda">
                        <li><a id="primeiro-nivel" href="#nome">Nome</a></li>
                        <ul>
                            <li><a id="segundo-nivel" href="#origem">Origem</a></li>
                            <li><a id="segundo-nivel" href="#funcao">Função</a></li>
                        </ul>
                        <li><a id="primeiro-nivel" href="#exemplo">Exemplo</a></li>
                        <ul>
                            <li><a id="segundo-nivel" href="#html">HTML</a></li>
                            <li><a id="segundo-nivel" href="#resultado">Resultado</a></li>
                        </ul>
                    </ul>
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Conteúdo do site</h5>
                    <div>
                        <ul style="max-height: 10px;" id="menu_esquerdo">
                            <?php
                            $sql_conteudos = "SELECT id_tag FROM dados LIMIT 5";
                            $query_conteudos = $conexao->query($sql_conteudos);
                            while ($row = $query_conteudos->fetch_assoc()) {
                                echo "<li style='padding-bottom: 5px;' id='primeiro_nivel'><a id='segundo-nivel' class='links-laterais' href='Second_Page.php?id_tag=" . $row['id_tag'] . "'>" . $row['id_tag'] . "</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="Sugestao.html">Sugestão</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav style="background-color: rgb(230, 230, 230, 0.55);" id="secao-pesquisa" class="navbar navbar-dark sticky-top">
        <div style="width: 90%; margin: auto;">
            <button id="btn-pesquisar" style=" border:2px solid rgb(175, 175, 175, 0.55);" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="botao_pesquisa">Digite aqui seu código</button>
        </div>
    </nav>



    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-white">Pesquise pelo
                        código</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="get">
                        <input id="buscar_dados" name="busca" class="form-control me-2" type="text" onkeyup="carregar_dados(this.value)">
                        <div class="modal_pesquisa">
                            <span id="resutado_da_pesquisa"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div style="width: 90%; margin: auto; padding-top: 10px; margin-bottom: 20px;" class="container">
        <div class="row">
            <div class="col-2 d-none d-md-block d-xl-block d-xxl-block">
                <ul style="max-height: 10px;" id="menu_esquerdo">
                    <h6>Conteudo da do site</h6>
                    <div id="tela-scroll">
                        <?php
                        $sql_conteudos = "SELECT id_tag FROM dados ORDER BY id_tag";
                        $query_conteudos = $conexao->query($sql_conteudos);
                        while ($row = $query_conteudos->fetch_assoc()) {
                            echo "<li style='padding-bottom: 5px;' id='primeiro_nivel'><a id='segundo-nivel' class='links-laterais' href='Second_Page.php?id_tag=" . $row['id_tag'] . "'>" . $row['id_tag'] . "</a></li>";
                        }
                        ?>
                    </div>
                </ul>
            </div>
            <div class="col-7 bg-color preencher">
                <h1 id="nome" style="text-align: center;"><?php echo htmlspecialchars($code['nome_tag']); ?></h1>
                <hr>
                <h2 id="origem">Origem</h2>
                <p><?php echo $code['origem_tag']; ?></p>
                <h2 id="funcao">Função</h2>
                <div class="function-content"><?php echo htmlspecialchars($code['function_tag']); ?></div>
                <div aria-labelledby="exemplos">
                    <h2 id="exemplo">Exemplo</h2>
                    <div class="section-content">
                        <div class="code-example">
                            <p id="html" class="example-header">
                                <span>HTML</span>
                            </p>
                            <span>&lt;!-- Um exemplo --&gt;</span>

                            <pre id="como_html_eh_feito">
<?php $conteudo = $code['exemplo_tag'];
$conteudo = str_replace("&lt;", "<span class='tag-symbol'>&lt;</span>", $conteudo);
$conteudo = str_replace("/&gt;", "<span class='tag-symbol'>/</span>&gt;", $conteudo);
echo htmlentities($conteudo); ?></pre>
                        </div>
                    </div>
                </div>
                <h2 id="resultado">Resultado</h2>
                <div class="Resultado">
                    <div id="Resultado_do_html">
                        <?php echo $code['how_tag']; ?>
                    </div>
                </div>
                </ul>
            </div>

            <div class="col-3 d-none d-md-block d-xl-block d-xxl-block d-lg-block">
                <ul id="menu_esquerda">
                    <h6>Conteudo da pagina</h6>
                    <li><a id="primeiro-nivel" href="#nome">Nome</a></li>
                    <ul>
                        <li><a id="segundo-nivel" href="#origem">Origem</a></li>
                        <li><a id="segundo-nivel" href="#funcao">Função</a></li>
                    </ul>
                    <li><a id="primeiro-nivel" href="#exemplo">Exemplo</a></li>
                    <ul>
                        <li><a id="segundo-nivel" href="#html">HTML</a></li>
                        <li><a id="segundo-nivel" href="#resultado">Resultado</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Contato</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">Site@algumacoisa.com</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Coding' Nest 2023</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="js/pesquisar.js"></script>
</body>

</html>