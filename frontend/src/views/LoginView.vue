<template>
  <div class="loginview">
    <section class="login-card">
      <div class="card">
        <div class="card-content">
          <div class="content">

            <!-- Card Title -->
            <h1 class="title">Login</h1>

            <!-- Email field-->
            <b-field label="Email" horizontal>
              <b-input v-model="email" placeholder="Email" maxlength="50" required class="input-field"></b-input>
            </b-field>

            <!-- Password field-->
            <b-field label="Senha" horizontal>
              <b-input type="password" v-model="password" password-reveal class="password-input input-field" placeholder="Senha"
                required></b-input>
            </b-field>

            <b-button type="is-primary" @click="login">
              Login
            </b-button>

          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';

axios.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password
        });
        localStorage.setItem('token', response.data.token);
        // Redireciona para a página principal após o login
        this.$router.push({ name: 'home' });
      } catch (error) {
        console.error('Login failed:', error);
        if (error.response) {
          console.error('Error response data:', error.response.data);
        }
      }
    }
  }
};
</script>

<style lang="css" scoped>
.card {
  width: 400px; /* Change the width to your desired value */
  height: 340px; /* Change the height to your desired value */
  margin: 0 auto; /* Add this line to center the card horizontally */
  display: flex; /* Add this line to center the card vertically */
  flex-direction: column; /* Add this line to stack children vertically */
  justify-content: center; /* Add this line to center the card vertically */
  align-items: center; /* Add this line to center the card vertically */
}

.button {
  margin-top: 10px;
  margin-bottom: 5px;
  /* Add this line to add space between the input fields and the button */
  justify-content: center;
  /* Add this line to center the button horizontally */
}

.password-input .icon.is-right .mdi-eye,
.password-input .icon.is-right .mdi-eye-off {
  color: purple;
}

.input-field {
  width: 100%;
  font-size: 1.2em;
  /* Aumenta o tamanho da fonte */
  margin-bottom: 10px;
}

</style>