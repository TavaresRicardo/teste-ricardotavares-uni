<template>
  <span>
    <header>
      <nav-bar-vue logo="CRUD Cliente" url="#" cor="#263238 blue-grey darken-4" />
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="12">
            <slot />
            <div class="">
                <h2>Cadastro de Clientes</h2>
                <form-vue></form-vue>
                <route-view></route-view>
                <div class="row">
                    <div class="col s12 m10">
                        <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Crud Cliente</span>
                            <p>Olá! Você está acessando um sistema contendo um CRUD.
                            de clientes podendo inserir 1 (um) ou mais telefones.
                            Acesse os links no menu lateral, ou na barra de navegação,
                            e mãos a obra.</p>
                        </div>
                        <div class="card-action">
                            <route-link to="/">Cadastrar cliente</route-link>
                            <route-link to="/clientes">Listar cliente</route-link>

                        </div>
                    </div>
                    </div>
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
import FormVue from './FormularioVue';
import Route from '../routes';

export default {
  name: 'TemplateHomeVue',
  components:{
    NavBarVue,
    FooterVue,
    GridVue,
    CardMenuVue,
    // VueRouter,
    FormVue,
    Route,
  },
  data(){
    return{

    }
  }
}

</script>
