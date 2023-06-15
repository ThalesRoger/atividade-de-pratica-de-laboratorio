<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>

{{-- mecanica --}}
<script type="text/javascript">

    //Variáveis globais
    var fator = 0.05;
    var tempoEntreGotas = 1 //1 segundo
    var valorInicialBureta = 50
    //
    
    var volumetitulanteUtilizado;
    var valorAtualBureta;
    var valorAtualErlenmayer;
    var volumeGasto;


   $(document).on('change','#aliquotaAmostraDiluida',function(){
    var aliquotaAmostraDiluida = $('#aliquotaAmostraDiluida').val()
    $('#valorErlenmayer').html(aliquotaAmostraDiluida)

    valorAtualBureta = valorInicialBureta
    valorAtualErlenmayer = aliquotaAmostraDiluida

   })

   //trigger
   $(document).on('click','#iniciarTitulacao',function(){
    volumetitulanteUtilizado = 0
    volumeGasto = 0
    $('#reacaoCompleta').val('Não')

    var concentracaoAmostra = $('#concentracaoAmostra').val()
    var volumeBalaoVolumetrico = $('#volumeBalaoVolumetrico').val()
    var concentracaoTitulante = $('#concentracaoTitulante').val()
    var volumeAmostra = $('#volumeAmostra').val()
    var aliquotaAmostraDiluida = $('#volumeBalaoVolumetrico').val() != 'sem_diluicao' ? $('#aliquotaAmostraDiluida').val() : $('#volumeAmostra').val() 
    var volumeBalaoVolumetrico = $('#volumeBalaoVolumetrico').val() != 'sem_diluicao' ? $('#volumeBalaoVolumetrico').val() : 1

    //calculo para determinar em que momento a concentração da animação deve parar para que o usuário consiga deternimar os valores 
    var numeroMolAmostraBalao = concentracaoAmostra / (volumeBalaoVolumetrico/volumeAmostra)
    var numeroMolAliquoaTitulada =  (numeroMolAmostraBalao * aliquotaAmostraDiluida ) / volumeBalaoVolumetrico
    volumeGasto =   ((numeroMolAliquoaTitulada * 100) / concentracaoTitulante).toFixed(2)
    

        pingar(tempoEntreGotas)
   })

   function pingar(intervalo){

    setTimeout(() => {
            
            var mols = 0.0000;
            var concentracaoTitulante = $('#concentracaoTitulante').val()

            valorAtualBureta = (valorAtualBureta - fator).toFixed(2)
            valorAtualErlenmayer = (valorAtualErlenmayer * 1) + (fator * 1)
            volumetitulanteUtilizado = volumetitulanteUtilizado + (fator * 1)


            //fórmula para número de mols por gota
            mols = ( concentracaoTitulante * volumetitulanteUtilizado ) / 1000

            $('#campoHCl').html(mols.toFixed(6))
            $('#campoNaOH').html( $('#campoHCl').html() )
            $('#campoNaCl').html( $('#campoHCl').html() )
            $('#campoH2O').html( $('#campoHCl').html() )
            
            $('#valorBureta').html(valorAtualBureta)
            $('#valorErlenmayer').html(valorAtualErlenmayer.toFixed(2))
         
            //condição para finalizar titulação


            console.log({valorAtualBureta,volumeGasto,'soma valores':valorInicialBureta - volumeGasto })
             if((valorInicialBureta - volumeGasto == valorAtualBureta ) || (valorAtualBureta == 0) ){
                $('#reacaoCompleta').val('Sim')
                return false                
             }

             pingar(intervalo)
        }, intervalo);
   }


   $(document).on('change','#volumeBalaoVolumetrico',function(){
        //Pegue o valor selecionado no campo volumeBalaoVolumetrico
        var valorSelecionado = $(this).val()

        //se valor for  = sem_diluicao ocultar aliquotaAmostraDiluida, caso contrário
        if(valorSelecionado == 'sem_diluicao'){
            enconderItem('aliquotaAmostraDiluida')
            $('#valorErlenmayer').html($('#volumeAmostra').val())
            
        }else{
            mostrarItem('aliquotaAmostraDiluida')
            $('#valorErlenmayer').html('000')
            $('#aliquotaAmostraDiluida').val('.:Selecione:.')
        }
            
        })
        
        

       //Função para apagar um label de acordo com o campo ocultado
       function enconderItem(id){
    $('#' + id + ', label[for=' + id + ']').hide();
    }

    //Função para mostrar um label de acordo com o campo ocultado
    function mostrarItem(id){
    $('#' + id + ', label[for=' + id + ']').show();
    }

    //função para verificar se o valor digitado pelo usuário está correto - Thales
    function verificarValor(){
        if(basic-addon2 == concentracaoAmostra){
            mostrarItem(notificacao1)
        }else{
            mostrarItem(notificacao2)
        }
    }

</script>

</head>
<body>
    <div style="height: 500px;margin:30px;">
        
        {{-- Linha de cima --}}
        <div class="row h-25 border rounded d-flex align-items-center " style="background-color: RGBA(0,0,0,0.03);"> 

            <div class="col-md-2 text-center" >
                <label for="concentracaoAmostra"><small><strong>Concentração da amostra: NaOH</strong></small></label>
                  <div class="input-group mb-3">
                    <select class="custom-select" id="concentracaoAmostra">
                        <option selected value="desconhecido">Desconhecido</option>
                        <option value="0,25">0,25 mol/L</option>
                        <option value="0,5">0,5 mol/L</option>
                        <option value="1">1 mol/L</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center ">
                <label for="concentracaoTitulante"><small><strong>Concentração do titulante: HCl</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="concentracaoTitulante">
                        <option selected>.:Selecione:.</option>
                        <option value="0.2">0,2 mol/L</option>
                        <option value="0.4">0,4 mol/L</option>
                        <option value="0.5">0,5 mol/L</option>
                        <option value="1">1,0 mol/L</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center ">
                <label for="volumeAmostra"><small><strong>Volume da amostra</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="volumeAmostra">
                        <option selected>.:Selecione:.</option>
                        <option value="5">5 mL</option>
                        <option value="10">10 mL</option>
                        <option value="15">15 mL</option>
                        <option value="20">20 mL</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center">
                <label for="volumeBalaoVolumetrico"><small><strong>Volume do balão volumétrico</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="volumeBalaoVolumetrico">
                        <option selected>.:Selecione:.</option>
                        <option value="50">50 mL</option>
                        <option value="100">100 mL</option>
                        <option value="200">200 mL</option>
                        <option value="250">250 mL</option>
                        <option value="sem_diluicao">Sem diluição</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <label for="aliquotaAmostraDiluida"><small><strong>Alíquota da amostra diluída</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="aliquotaAmostraDiluida">
                    <option selected>.:Selecione:.</option>
                    <option value="5">5 mL</option>
                    <option value="10">10 mL</option>
                    <option value="20">20 mL</option>
                    <option value="25">25 mL</option>
                  </select>
            </div>
            </div>
{{--abaixo estou colocando uma aba para o indicador--}}

            <div class="col-md-2 text-center">
                <label><small><strong>Indicador</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select">
                    <option selected>.:Selecione:.</option>
                    <option >Fenolftaleína</option>
                    </select>
            </div>
            </div>


            <div class="col-md-2  text-center ">
                <button id="iniciarTitulacao" type="button" class="btn btn-primary">Iniciar Titulação</button>
            </div>
        </div>
        <br>
        {{-- linha de baixo --}}
        <div class="row h-75">
            <div class="col-6">
                 <div class="row  h-75">
                    <div class="col text-center">
                            Volume inicial da bureta: <span>50 mL</span><br>
                            Volume Final da bureta: <span id="valorBureta">50 </span> mL<br>
                            {{--Valor da Erlenmayer: <span id="valorErlenmayer">000</span><br>
                            Reação completa: <span id="reacaoCompleta">Não</span>--}}
                    </div>
                 </div>
                 <div class="row h-25 d-flex align-items-center justify-content-center border rounded" style="background-color: RGBA(0,0,0,0.03);">
                    <div class="col-md-12 text-center">
                        <strong>Reação Química</strong>
                    </div>
                    <div class="col-md-11 ">
                        <div class="row">
                        <div class="col-md-5 ">
                            <div class="col-md-12 text-center">
                                <strong>Reagentes</strong>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <small><strong>HCl</strong></small>
                                    <div><small><span id="campoHCl">0,0000</span></small></div>
                                </div>
                                <div class="col d-flex justify-content-center ">+</div>
                                <div class="col">
                                    <small><strong>NaOH</strong></small>
                                    <div><small><span id="campoNaOH">0,0000</span></small></div>
                                </div>
                            </div>
                            <div class="col-5 text-center">
                          
                            </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-center">-></div>
                        <div class="col-md-5 ">
                            <div class="col-md-12 text-center">
                                <strong>Produtos</strong>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <small><strong>NaCl</strong></small>
                                    <div><small> <span id="campoNaCl">0,0000</span> </small></div>
                                </div>
                                <div class="col d-flex justify-content-center ">+</div>
                                <div class="col">
                                    <small><strong>H20</strong></small>
                                    <div><small> <span id="campoH2O"> 0,0000</span></small></div>
                                </div>
                            </div>
                            <div class="col-5 text-center">
                          
                            </div>
                        </div>
                    </div>
                    </div>      
                 </div>
            </div>

            <div class="col-6 border rounded" style="background-color: RGBA(0,0,0,0.03);">
                <br> 
                <div class="row h-75">
                        <div class="col text-center">
                            <div id="notificacao" class="col text-center">

                            <div id="notificacao1" class="alert alert-success col-12" role="alert">
                                    Seu cálculo está correto.
                                </div>
                                <div id="notificacao2" class="alert alert-danger col-12" role="alert">
                                    Seu cálculo está incorreto.
                                </div> 
                            </div>
                            <br>
                            <h4>Concentração da amostra</h4>  
                            <br>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Digite aqui o resultado encontrado" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">mol/L</span>
                                </div>
                              </div>
                            <button type="button" class="btn btn-primary btn-block">Validar cálculo</button>
                            <button type="button" class="btn  btn-block">Reiniciar simulação</button>
                            <a href="/" class="btn btn-danger  btn-block">Voltar para o menu</a>
                        </div>
                </div>
                <br>
            </div>
        </div>

    </div>
</body>
</html>