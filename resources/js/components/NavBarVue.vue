<template>
  <nav :class="cor || 'black'">
    <div class="nav-wrapper container">
      <a :href="url || '#'" class="brand-logo">{{logo || 'Crud-Cliente'}}</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/">Home</a></li>
        <li><a href="/cadastrar">Cadastrar Cliente</a></li>
        <li><a href="/listar">Listar Clientes</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavBarVue',
  props:['logo','url','cor'],
  data () {
    return {

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
