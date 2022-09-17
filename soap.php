<?php
    $cliente = new SoapClient('https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>Web Service dos Correios</title>
    </head>

    <body>
        <div style="width:30%; margin:2% auto;">

            <div class="card">
                <div class="card-header text-bg-primary">Consultar Endereço</div>

                <div class="card-body">            
                    <form action="#" method="post">  
                        <label>CEP</label>                   
                        <div class="input-group">
                            <input type="text" required name="cep" class="form-control" id="cep" maxlength="8" minlength="8">                                               
                            <button type="submit" class="btn btn-primary">Consultar</button>                                                                                            
                        </div>                                  
                    </form>

                    <br />            

                    <div>
                        <?php                  
                            if(isset($_POST['cep'])) {
                                try {                            
                                    foreach($cliente->__soapCall('consultaCEP', array('consultaCEP' => array('cep' => $_POST['cep']))) as $row) {  
                                        echo "                                
                                            <label>Cidade</label>                   
                                            <input type='text' class='form-control' value='{$row->cidade}' disabled>
                                                                                                
                                            <label>Bairro</label>                   
                                            <input type='text' class='form-control' value='{$row->bairro}' disabled>
                                                                    
                                            <label>CEP</label>                   
                                            <input type='text' class='form-control' value='{$row->cep}' disabled>
                                                                    
                                            <label>Endereço</label>                   
                                            <input type='text' class='form-control' value='{$row->end}' disabled>
                                                                    
                                            <label>Estado</label>                   
                                            <input type='text' class='form-control' value='{$row->uf}' disabled>                            
                                        
                                            <label>Complemento 2</label>                   
                                            <input type='text' class='form-control' value='{$row->complemento2}' disabled>                                
                                        ";                    
                                    }    
                                } catch(Exception $e) {                            
                                    echo "<center>".$e->getMessage()."</center>";
                                }
                            }                                    
                        ?>
                    </div>        
                </div>
            </div>
        </div>
    </body>
</html>