<template>
  <div>
    <div class="container">
      <div class="buttons">
        <!-- Exibe um texto para edição de aula e um botão para voltar à grade de aulas -->
        <h1 class="edit-class"><strong>Editar Aula</strong></h1>
        <button @click="goBack">&#60; Voltar para grade</button>
      </div>
      <!-- Formulário para edição de aula, previne o comportamento padrão de submissão ao clicar -->
      <form @submit.prevent="saveClass">
        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Campo para selecionar o nome da matéria -->

            </div>
            <div class="form-column">

            </div>
          </div> <!-- Campo para entrada do nome do professor -->
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Seletor de tempo de início da aula com horas e minutos -->
            </div>
            <div class="form-column">
              <!-- Seletor do campus onde a aula será ministrada -->
              <label for="campus">Campus</label>
              <input type="text" v-model="campus" id="campus" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Seletor do dia da semana em que a aula será ministrada -->
              <label for="dia_da_semana">Dia da Semana</label>
              <select v-model="weekday" id="weekday">
                <option value="segunda">Segunda</option>
                <option value="terca">Terça</option>
                <option value="quarta">Quarta</option>
                <option value="quinta">Quinta</option>
                <option value="sexta">Sexta</option>
                <option value="sabado">Sábado</option>
              </select>
            </div>
          </div>
          <div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Campo para entrada do nome da sala onde a aula será ministrada -->
              <label for="classroom">Sala</label>
              <input type="text" v-model="classroom" id="classroom" />
            </div>
          </div>
        </div>

        <!-- Botões para salvar, deletar ou cancelar as alterações feitas -->
        <div class="buttons">
          <button type="submit">Salvar alterações</button>
          <button type="button" @click="deleteClass">Deletar aula</button>
          <button type="button" @click="cancel">Cancelar</button>
        </div>
      </form>
    </div>

    <!-- Links para notificações e configurações no rodapé da página -->
    <footer>
      <router-link to="/notificacoes">Notificações</router-link>
      <router-link to="/configuracoes">Configurações</router-link>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // Variáveis reativas para armazenar os dados do formulário
      idTurma: this.$route.params.id,
      nome: '',
      horario: '',
      sala: '',
      campus: '',
      local: '',
      dia_da_semana: '',
    };
  },
  methods: {
    // Navega de volta para a página da grade de aulas
    goBack() {
      this.$router.push('/minhasturmas');
    },
    // Exibe um alerta ao salvar a aula
    saveClass() {
      axios.post(`/api/aula/${this.idTurma}`, {
        nome: this.nome,
        hora_inicio: this.startTimeHour + ':' + this.startTimeMinute,
        campus: this.campus,
        local: this.local,
        dia_da_semana: this.dia_da_semana,
        hora_fim: this.endTimeHour + ':' + this.endTimeMinute,
        sala: this.classroom
      })
    },
    // Exibe uma confirmação antes de deletar a aula e, em caso afirmativo, exibe um alerta de deleção
    deleteClass() {
      if (confirm('Tem certeza de que deseja deletar esta aula?')) {
        alert('Aula deletada.');
      }
    },
    // Exibe uma confirmação antes de cancelar as alterações e, em caso afirmativo, navega de volta para a página inicial
    cancel() {
      if (confirm('Deseja cancelar as alterações?')) {
        this.$router.push('/');
      }
    },
  }
};
</script>

<style scoped>
/* Estilos globais para o corpo da página */
body {
  font-family: Arial, sans-serif;
  font-size: 14px;
  /* Diminui a fonte de toda a página */
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

/* Estilos para o cabeçalho da página */
header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  border-bottom: 1px solid #000;
}

header nav a {
  margin: 0 15px;
  color: black;
  text-decoration: none;
  font-weight: bold;
}

header nav a:hover {
  color: orange;
}

/* Estilos para os grupos de formulários */
.form-group {
  margin-bottom: 20px;
}

/* Estilos para as linhas de formulários */
.form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

/* Estilos para as colunas de formulários */
.form-column {
  flex: 1;
  display: flex;
  flex-direction: column;
  margin-right: 20px;
}

.form-column:last-child {
  margin-right: 0;
}

/* Estilos para os rótulos dos campos do formulário */
label {
  margin-bottom: 5px;
  font-weight: bold;
  font-size: 14px;
  /* Diminui a fonte das labels */
}

/* Estilos para os campos de entrada e seletores */
input,
select {
  padding: 10px;
  font-size: 14px;
  /* Diminui a fonte dos inputs e selects */
  width: 100%;
  box-sizing: border-box;
  border: 1px solid #000;
}

/* Estilos para o seletor de tempo (hora e minuto) */
.time-select {
  display: flex;
  gap: 10px;
}

.time-select select {
  flex: 1;
}

/* Estilos para o conjunto de botões */
.buttons {
  display: flex;
  align-items: center;
  /* Alinha verticalmente os itens */
  justify-content: space-between;
  margin-top: 20px;
}

.buttons button {
  padding: 10px 20px;
  font-size: 14px;
  /* Diminui a fonte dos botões */
  border: 1px solid #000;
  background-color: white;
  cursor: pointer;
  border-radius: 8px;
  /* Adiciona bordas arredondadas aos botões */
}

.buttons button:hover {
  background-color: lightgray;
}

/* Estilos para o texto "Editar Aula" */
.edit-class {
  font-weight: bold;
  /* Faz o texto em negrito */
  font-size: 20px;
}

/* Estilos para o rodapé da página */
footer {
  border-top: 1px solid #000;
  padding: 3vw;
  text-align: center;
  margin-top: 2vw;
}

footer a {
  margin: 0 10px;
  color: black;
  text-decoration: none;
  font-weight: bold;
}

footer a:hover {
  color: purple;
}
</style>