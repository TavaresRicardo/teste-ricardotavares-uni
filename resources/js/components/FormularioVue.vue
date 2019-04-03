<template>
  <span>
    <header>

    </header>

      <nav-bar-vue logo="CRUD Cliente" url="#" cor="#263238 blue-grey darken-4" />


    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="12">
            <slot />
            <div class="alert alert-danger" v-if="error" style="margin-top: 15px;">
                <strong>Erro!</strong> {{error}}
            </div>
            <div class="alert alert-success" v-if="sucesso" style="margin-top: 15px;">
                <strong>Sucesso!</strong> Os dados foram enviados corretamente.
            </div>
            <div class="jumbotron jumbotron-fluid" style="margin-top: 15px;">


                <div class="container">
                    <h1 class="display-4">Cadastro de Cliente</h1>
                    <!-- <form> -->
                        <!-- <div class="form-group"> -->
                            <div >
                                <label for="nome">Nome</label>
                                <input v-model="nome" id="nome" type="text" class="validate">
                                <!-- <label for="nome">Nome</label> -->
                            </div>
                            <div class="row">

                            <div class="col-md-6" >
                                <label for="nome">Telefone</label>
                                <input type="text" id="fone" v-model="fone.numero"  maxlength="15" size="15" class="validate" />

                            </div>
                            <button  v-on:click="inserirLista()" class="btn btn-primary bnt-sm col-sd-4" style="margin-top: 30px;">+</button>

                            </div>
                            <!-- <div id="origem">
                            </div>

                            <div id="destino">
                            </div>
                            <button v-on:click="duplicarCampos()" class="btn btn-primary bnt-sm">+Número</button> -->
                            <div >
                                <h5 style="margin-top: 35px;">Telefones</h5>
                                <hr>
                                <div>
                                    <ul>
                                        <li v-for = "f in fones">
                                            Numero: {{ f.numero }} Principal: {{ f.principal }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="date" v-model="data_nascimento" id="data_nascimento" name="data_nascimento">

                            </div>

                            <button v-on:click="salvar()" class="btn btn-primary bnt-sm">Salvar</button>
                            <a href="/" class="btn btn-danger bnt-sm"> Cancelar </a>
                        <!-- </div> -->
                    <!-- </form> -->
            </div>
        </div>

</grid-vue>

        </div>

      </div>
    </main>

    <footer-vue cor="#455a64 blue-grey darken-2" logo="CRUD Cliente" descricao="contato: (32) 99114-6130" ano="2019">

      <li><a class="grey-text text-lighten-3" href="/">Página Inicial</a></li>
      <li><a class="grey-text text-lighten-3" href="/listar">Listar Clientes</a></li>

    </footer-vue>


  </span>
</template>


<script>
import NavBarVue from './NavBarVue';
import FooterVue from './FooterVue';
import GridVue from './GridVue';
import CardMenuVue from './CardMenuVue';
// import VueRouter from 'vue-router';
import FormVue from './FormularioVue';
import Route from '../routes';

export default {
    name: 'FormularioVue',
  components:{
    NavBarVue,
    FooterVue,
    GridVue,
    CardMenuVue,
    // VueRouter,
    FormVue,
    Route,
  },
    props:['cor','logo','descricao','ano'],

    data () {
        return {
            count: 0,
            nome: null,
            data_nascimento: null,
            fone: {numero: '', principal: true},
            fones:[
            ],
            error:"",
            sucesso:false,
        }
    },

    methods:{
        addTelefone(){
            this.count+=1;
            // this.fone.push({ numero: '', principal:'' });
            var t = document.createTextNode("This is a paragraph.");
            this.$refs.tel.appendChild(t);
        },
        inserirLista(){
            this.fones.push({ numero: this.fone.numero, principal:this.fone.principal })
            this.fone.numero = '';
            this.fone.principal = false;
        },
        salvarTelefone(idClient, value){
            // console.log(value)
            var data_mod = {'cliente_id': idClient, 'numero': value.numero, 'principal': value.principal}
            var data = JSON.stringify(data_mod);
            var xhr = new XMLHttpRequest();
            var url = "http://localhost:8000/api/telefones";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(data);
        },
        salvar(){
            if(this.nome === null || this.data_nascimento === null || this.fones[0] === undefined){
                this.error="Corrija os erros antes de enviar."
            }else{
                this.error ="";
            }

            var self = this;
            var usuario ={
                nome: this.nome,
                data_nascimento: this.data_nascimento
            };
            var data = JSON.stringify(usuario);
            var xhr = new XMLHttpRequest();
            var url = "http://localhost:8000/api/clientes";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function(){
                if (xhr.readyState === 4){
                    var res = JSON.parse(xhr.response);
                    var idClient = res.conteudos.id;
                    self.fones.forEach(function(val){
                        console.log(val);
                        self.salvarTelefone(idClient, val)
                    });
                    console.log(idClient);
                }
            };

            this.nome= "",
            this.data_nascimento = null,
            // this.fones=[];
            // this.fone.numero = "";
            // this.fone.principal = true;
            this.sucesso=true;
            xhr.send(data);

            // redirect.view('/');

        },
        duplicarCampos(){
            var clone = document.getElementById('origem').cloneNode(true);
            var destino = document.getElementById('destino');
            destino.appendChild (clone);
            var camposClonados = clone.getElementsByTagName('input');
            for(i=0; i<camposClonados.length;i++){
                camposClonados[i].value = '';
            }
        },
        removerCampos(id){
            var node1 = document.getElementById('destino');
            node1.removeChild(node1.childNodes[0]);
        },
    }
}
</script>

