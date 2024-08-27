
<!-- Código separado em seções: 
      header
      footer
      -->
      
<template>
  <div id="app" class="app-container">

    <section class="header">
    <b-navbar>
      <template #brand>
        <b-navbar-item tag="router-link" :to="{ name: 'home' }">
          <img
            src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
            alt="Buefy Logo"
          >
        </b-navbar-item>
      </template>
      <template #start>
        <!-- link router para a página Home -->
        <b-navbar-item tag="router-link" :to="{ name: 'home' }" class="navbar-item-spacing">
          <strong>Home</strong>
        </b-navbar-item>

        <!-- link router para a página AddAula -->
        <b-navbar-item tag="router-link" :to="{ name: 'add' }" class="navbar-item-spacing">
          <strong>Adicionar Aula</strong>
        </b-navbar-item>

        <!-- link router para a página EditAula -->
        <b-navbar-item tag="router-link" :to="{ name: 'edit' }" class="navbar-item-spacing">
          <strong>Editar Aula</strong>
        </b-navbar-item>

        <!-- link router para a página About -->
        <b-navbar-item tag="router-link" :to="{ name: 'about' }" class="navbar-item-spacing">
          <strong>Sobre</strong>
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
    <footer v-if="showFooter" class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>Horário Fácil</strong> &copy; {{ new Date().getFullYear() }}. Todos os direitos reservados.
        </p>
        <p>
          <a href="https://github.com/BiancaNCoelho/HorarioFacil" target="_blank" class="botao-footer">GitHub do Projeto</a>
        </p>
        <p>
          <strong>Contato:</strong> <a href="mailto:contato@exemplo.com" class="botao-footer">contato@exemplo.com</a>
        </p>
      </div>
    </footer>
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
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.footer {
  color: white;
  background-color: #0d1117 !important;
  font-size: 0.9vw;
  text-align: center;
  margin-top: auto;
  width: 100%;
  padding: 5%;
}

.footer strong {
  color: white; 
}

.botao-footer, .botao-footer:hover {
  color: #007bff;
}

.botao-footer:hover {
  text-decoration: underline;
  color: #007bff;
}

.navbar-item-spacing {
  margin-left: 0.7vw;
}
</style>
