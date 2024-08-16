<template>
  <div class="about">
  </div>
  <section class="header">
    <b-navbar>
        <template #brand>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <img
                    src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                    alt="Lightweight UI components for Vue.js based on Bulma"
                >
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
              Home
            </b-navbar-item>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                Documentação
            </b-navbar-item>
            <b-navbar-dropdown label="Info">
                <b-navbar-item tag="router-link" :to="{ path: '/about'}">
                    Sobre
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contato
                </b-navbar-item>
            </b-navbar-dropdown>
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
    </section>

    <section class="footer">
      <footer class="footer">
        <div class="content has-text-centered">
         <p>
           <strong>Horário Fácil</strong> por Nomes.
          </p>
          </div>
      </footer>
    </section>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>