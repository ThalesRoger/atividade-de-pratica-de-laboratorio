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
    
</script>

</head>
<body>
    <div style="height: 500px;margin:30px;">
        
        {{-- Linha de cima --}}
        <div class="row h-25 border rounded ">

            <div class="col-md-2 text-center">
                <label for="concentracaoAmostra"><small><strong>Concentração da amostra</strong></small></label>
                  <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected value="desconhecido">Desconhecido</option>
                        <option value="1">1%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center ">
                <label for="concentracaoTitulante"><small><strong>Concentração do titulante</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>.:Selecione:.</option>
                        <option value="0.1">0,1 mol/L</option>
                        <option value="0.2">0,2 mol/L</option>
                        <option value="0.4">0,4 mol/L</option>
                        <option value="0.05">0,05 mol/L</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center ">
                <label for="volumeAmostra"><small><strong>Volume da amostra</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>.:Selecione:.</option>
                        <option value="5">5 mL</option>
                        <option value="10">10 mL</option>
                        <option value="15">15 mL</option>
                        <option value="20">20 mL</option>
                    </select>
                  </div>
            </div>
            <div class="col-md-2  text-center">
                <label for="volumeBalaoVolumetrico"><small><strong>Volume do balao volumétrico</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>.:Selecione:.</option>
                        <option value="50">50 mL</option>
                        <option value="100">100 mL</option>
                        <option value="200">200 mL</option>
                        <option value="250">250 mL</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <label for="alíquotaAmostraDiluida"><small><strong>Alíquota da amostra diluída</strong></small></label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                    <option selected>.:Selecione:.</option>
                    <option value="5">5 mL</option>
                    <option value="10">10 mL</option>
                    <option value="20">20 mL</option>
                    <option value="25">25 mL</option>
                  </select>
            </div>
            </div>
            <div class="col-md-2  text-center ">
                <button type="button" class="btn btn-primary">Iniciar Titulação</button>
            </div>
        </div>
        <br>
        {{-- linha de baixo --}}
        <div class="row h-75">
            <div class="col-6 ">
                 <div class="row  h-75">
                    <div class="col text-center">
                        <img src="{{asset('img/img01.png')}}" width="200" height="200"/>
                    </div>
                 </div>
                 <div class="row h-25">
                    <div class="row w-100 border rounded">
                        <div class="col-3 text-center">
                            <small>mol do titulante</small>
                            <div class="col">
                                <small><strong>HCl</strong></small>
                                <div><small>0,0002</small></div>
                            </div>
                        </div>
                        <div class="col text-center">+</div>
                        <div class="col-3 text-center">
                            <small>mol da amostra</small>
                            <div class="col">
                                <small><strong>NaOH</strong></small>
                                <div><small>0,0002</small></div>
                            </div>
                        </div>
                        <div class="col text-center">-></div>
                        <div class="col-4 text-center">
                            <small>reação Química</small>
                            <div class="row">
                                <div class="col">
                                    <small><strong>NaCl</strong></small>
                                    <div><small>0,0002</small></div>
                                </div>
                                <div class="col">+</div>
                                <div class="col">
                                        <small><strong>H20</strong></small>
                                        <div><small>0,0002</small></div>
                                </div>
                            </div>

                        </div>
                    </div>      
                 </div>
            </div>


            <div class="col-6 border rounded">
                <br> 
                <div class="row h-75">
                        <div class="col text-center">
                            <div class="col text-center">
                                <div class="alert alert-success col-12" role="alert">
                                    Seu cálculo está correto.
                                </div>
                                <div class="alert alert-danger col-12" role="alert">
                                    Seu cálculo está incorreto.
                                </div>
                            </div>
                            <br>
                            <h4>Digite o resultado do cálculo</h4>  
                            <br>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Digite o resultado do cálculo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">mol/L</span>
                                </div>
                              </div>
                            <button type="button" class="btn btn-primary btn-block">Validar cálculo</button>
                            <button type="button" class="btn  btn-block">Reiniciar simulação</button>
                        </div>
                </div>
                <br>
            </div>
        </div>

    </div>
</body>
</html>