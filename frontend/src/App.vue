<template>
  <div id="app">

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
        <b-navbar-item tag="router-link" :to="{ name: 'Home' }">
          Home
        </b-navbar-item>
        <b-navbar-item tag="router-link" :to="{ name: 'about' }">
          Sobre
        </b-navbar-item>
      </template>
      <template #end>
        <b-navbar-item tag="div">
          <div class="buttons">
            <a class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a class="button is-light">
              Log in
            </a>
          </div>
        </b-navbar-item>
      </template>
    </b-navbar>
    <router-view :key="$route.fullPath"></router-view>

  
    <section class="footer">
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
};
</script>

<style lang="scss" scooped>

</style>