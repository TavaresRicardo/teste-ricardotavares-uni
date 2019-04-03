<template>
    <footer :class="'page-footer '+ cor">
        <div class="container">
            <div class="row">
            <div class="container center-align col 4 s4">
                <img class="responsive-img" src="https://cdn.univicosa.com.br/img/logos/novo/univicosa_horizontal.png" alt="" >
                <!-- <img class="responsive-img" src="" alt="" > -->


            </div>

            <div class="container center-align col 5 s5">
                <ul>
                <h5 class="white-text">{{logo || 'Site'}}</h5>
                <p class="grey-text text-lighten-4">{{descricao || "Sua descrição"}}</p>

                </ul>
            </div>

            <div class="col 3 s3">
                <ul>
                <h6 class="white-text">Links:</h6>
                <slot></slot>
                </ul>
            </div>


            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © {{ano || '2019'}} Copyright {{logo || 'CRUD Cliente'}}
            </div>
        </div>
    </footer>
</template>

<script>
export default {
  name: 'FooterVue',
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
