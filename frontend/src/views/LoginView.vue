<!-- LoginView -->
<template>
  <div class="loginview">
    <section class="login-card">
      <div class="card">
        <div class="card-content">
          <div class="content">
            
            <!-- Card Title -->
            <h1 class="title">Login</h1>

            <!-- CPF field-->
            <b-field label="CPF" horizontal>
              <b-input v-model="cpf" placeholder="CPF" maxlength="11"></b-input>
            </b-field>
            
            <!-- Password field-->
            <b-field label="Senha" horizontal>
              <b-input type="password" password-reveal class="password-input" placeholder="Senha"></b-input>
            </b-field>
            
            <b-button type="is-primary">
              <!-- mudar depois -->
              <RouterLink :to="{ name: 'Home'}" style="color: white;"> Login </RouterLink>
            </b-button>
          
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'LoginView',
  data() {
    return {
      cpf: ''
    };
  },
}
</script>

<style lang="css" scoped>
.card {
  width: 400px; /* Change the width to your desired value */
  height: 340px; /* Change the height to your desired value */
  margin: 0 auto; /* Add this line to center the card horizontally */
  display: flex; /* Add this line to center the card vertically */
  justify-content: center; /* Add this line to center the card vertically */
  align-items: center; /* Add this line to center the card vertically */
}
.button {
  margin-top: 10px;
  margin-bottom: 5px; /* Add this line to add space between the input fields and the button */
  justify-content: center; /* Add this line to center the button horizontally */
}

.password-input .icon.is-right .mdi-eye,
.password-input .icon.is-right .mdi-eye-off {
  color: purple;
}
</style>
