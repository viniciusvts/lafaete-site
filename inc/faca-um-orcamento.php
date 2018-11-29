<div class="fale-conosco bg-orcamento">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form>
                    <div class="fale-conosco-left">
                        <div class="cabecalho">
                            <h2>Faça um Orçamento</h2>
                            <span></span>                     
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <input placeholder="Empresa*" type="text">
                            </div>
                            <div class="col-md-4 div-select">
                                <input placeholder="CNPJ*" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input placeholder="Nome*" type="text">
                            </div>
                            <div class="col-md-2">
                                <input placeholder="Telefone*" type="text">
                            </div>
                            <div class="col-md-4">
                                <input placeholder="Email*" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <h4>Produtos Desejados</h4>
                                <?php for($produtos = 0; $produtos < 9; $produtos++){ ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Caçambas</label>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <h4>Serviços Desejados</h4>
                                <?php for($produtos = 0; $produtos < 3; $produtos++){ ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Caçambas</label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input placeholder="Local da sua Obra*" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea rows="4" cols="50" placeholder="Informações Adicionais"></textarea> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="float-right btn botao-laranja">Enviar</button>
                            </div>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>