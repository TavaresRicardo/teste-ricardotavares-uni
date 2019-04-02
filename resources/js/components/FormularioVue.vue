<template>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <!-- <h1 class="display-4">Cadastro de Cliente</h1>
            <p class="lead">Para cadastrar um novo cliente, entre com os dados pedidos a seguir.</p> -->
            <form action="/clientes/cadastrar" method="POST">

                    <div class="form-row">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" placeholder="Nome do cliente">

                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="telefone">Telefone:</label>
                            <input name="numero" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" id="telefone" type="text" placeholder="Ex.: (11) 11111-1111" >

                        </div>
                        <div class="col">
                            <div class="radio">
                                <div class="form-row">
                                    <div class="col">
                                    <label>Telefone principal?</label>
                                        <div class="col">
                                            <label for="radios-0">
                                            <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                                            Sim
                                            </label>
                                            <label for="radios-1">
                                            <input type="radio" name="radios" id="radios-1" value="0">
                                            Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" id="data_nascimento" class="form-control  {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" name="data_nascimento" placeholder="Data de Nascimento do cliente">

                    </div>
                    <div class="form-row">
                        <label for="data_cadastro">Data do Cadastro</label>
                        <input id="data_cadastro" class="form-control  {{ $errors->has('data_cadastro') ? 'is-invalid' : '' }}" name="data_cadastro" type="date" >

                    </div>
                    <div class="form-row">
                        <label for="data_atualizacao">Data de atualização</label>
                        <input id="data_atualizacao" class="form-control  {{ $errors->has('data_atualizacao') ? 'is-invalid' : '' }}" name="data_atualizacao" type="date">

                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary bnt-sm">Salvar</button>
                    <a href="/" class="btn btn-danger bnt-sm"> Cancelar </a>
            </form>
        </div>
    </div>
<template>
<script>
    export default {
    name: 'FormularioVue',
    props:['cor','logo','descricao','ano'],
    data () {
        return {

        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
