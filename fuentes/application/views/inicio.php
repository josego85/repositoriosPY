<html>
<head>
    <title>RepositoriosPY</title>

    <!-- Cabecera -->
    <?php $this->load->view('comunes/cabecera')?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "Inicio/listarPersonas",
                success: function(p_result) {
                    var v_personas = jQuery.parseJSON(p_result);
                    var v_html = "<ol>"
                    for(var indice in v_personas){
                        var v_persona = v_personas[indice];
                        var v_repositorios = v_persona['repositorios'];
                        var v_html_links = "";
                        for(var indice2 in v_repositorios){
                            v_html_links += " <a href='" + v_repositorios[indice2].link + "' target = '_blank'>link</a> ";
                        }
                        v_html += "<li>" + v_persona['nombre_completo'] + v_html_links + "</li>";
                    }
                    v_html += "</ol>"
                    $("#personas").html(v_html);
                },
                error: function(p_response) {
                    var v_msg = "Error!, algo ha sucedido: ";
                    $("#personas").html(v_msg);
                }
            });
	});
    </script>
</head>
<body>
    <div class="container cabecera">
        <h1>RepositoriosPY</h1>
    </div>
    <div class="container">
        <!-- Menu -->
        <?php $this->load->view('comunes/menu')?>
    </div>
    <div class="container">
        <!-- Mensaje descatacado -->
        <div class="jumbotron">
            <div class="container">
                <!-- Menu -->
                <?php $this->load->view('utiles/mensaje_destacado')?>
            </div>
        </div>
    </div>
    <div>
        <?php
            ;
        
        ?>
    </div>
    
    <div class="container" id="personas"></div>
    <!-- Pie de pagina -->
    <?php //$this->load->view('comunes/pie_pagina')?>
</body>
</html>