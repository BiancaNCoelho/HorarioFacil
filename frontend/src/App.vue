
<!-- Código separado em seções: 
      header
      footer
      -->
      
<template>
  <div id="app">

    <section class="header">
    <b-navbar>
      <template #brand>
        <b-navbar-item tag="router-link" :to="{ name: 'Home' }">
          <img
            src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
            alt="Buefy Logo"
          >
        </b-navbar-item>
      </template>
      <template #start>
        <!-- link router para a página Home -->
        <b-navbar-item tag="router-link" :to="{ name: 'Home' }">
          Home
        </b-navbar-item>

        <!-- link router para a página About -->
        <b-navbar-item tag="router-link" :to="{ name: 'about' }">
          Sobre
        </b-navbar-item>

        <!-- Botoes Sign Up e Login -->
      </template>
      <template #end>
        <b-navbar-item tag="div">
          <div class="buttons">
            <a v-if="showButton" class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a v-if="showButton" class="button is-light">
              <RouterLink :to="{ name: 'login'}">Log in</RouterLink>
            </a>
          </div>
        </b-navbar-item>
      </template>
    </b-navbar>

    <!-- "reseta" o router -->
    <router-view :key="$route.fullPath"></router-view>
    </section>
    
    <!-- Footer -->
    <section v-if="showFooter" class="footer">

      <footer class="footer">
        <div class="content has-text-centered">
          <p>
            <strong>Horário Fácil</strong> por Nomes.
          </p>
        </div>
      </footer>
    
    </section>
 
  </div>
</template>

<script>
export default {
  name: 'App',
  computed: {
    showButton() {
      return this.$route.name !== 'login';
    },
    showFooter() {
      return this.$route.name !== 'login';
    }
  }
};
</script>

<style lang="css" scooped>

</style>
