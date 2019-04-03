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

            <div class="jumbotron jumbotron-fluid">


                <div class="container">
                    <h1 class="display-4">Listado de Cliente</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Data Cadastro</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="user in usuarios">
                            <td>{{user.nome}}</td>
                            <td>{{user.telefone}}</td>
                            <td>{{user.created_at}}</td>
                        </tr>

                        </tbody>
                    </table>
            </div>
        </div>

</grid-vue>

        </div>

      </div>
    </main>

    <footer-vue cor="#455a64 blue-grey darken-2" logo="CRUD Cliente" descricao="contato: (32) 99114-6130" ano="2019">

      <li><a class="grey-text text-lighten-3" href="#!">Clientes</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Telefones</a></li>

    </footer-vue>


  </span>
</template>


<script>
import NavBarVue from './NavBarVue';
import FooterVue from './FooterVue';
import GridVue from './GridVue';
import CardMenuVue from './CardMenuVue';
// import VueRouter from 'vue-router';


export default {
    name: 'ListaUsuario',
  components:{
    NavBarVue,
    FooterVue,
    GridVue,
    CardMenuVue,
    // VueRouter,

  },
    props:['cor','logo','descricao','ano'],

    data () {
        return {
            usuarios:[{
                nome:"",
                telefone:123,
                created_at:""
            }
            ],
        }
    },
    mounted(){
        var url="http://localhost:8000/api/clientes"
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", url, false ); // false for synchronous request
        xmlHttp.send( null );
        var l = JSON.parse(xmlHttp.responseText);
        this.usuarios = JSON.parse(xmlHttp.responseText);
    },
}
</script>

