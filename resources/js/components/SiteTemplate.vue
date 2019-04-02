<template>
  <span>
    <header>
      <nav-bar logo="Cadastro de Cliente" url="#" cor="#263238 blue-grey darken-4" />
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="3">
            <card-menu-vue>
              <div class="row valign-wrapper">
                <grid-vue tamanho="12">

                  <h3>Menu</h3>
                </grid-vue>
              </div>
            </card-menu-vue>
            <card-menu-vue>
              <h3>Menu</h3>
            </card-menu-vue>
          </grid-vue>
          <grid-vue tamanho="9">
            <slot />
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
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'

export default {
  name: 'SiteTemplate',
  components:{
    NavBarVue,
    FooterVue,
    GridVue,
    CardMenuVue
  }
}
</script>

<style>

</style>
