<template>
  <div>
    <div class="container">
      <div class="buttons">
        <!-- Exibe um texto para edição de aula e um botão para voltar à grade de aulas -->
        <span class="edit-class">Editar Aula</span>
        <button @click="goBack">&#60; Voltar para grade</button>
      </div>
      <!-- Formulário para edição de aula, previne o comportamento padrão de submissão ao clicar -->
      <form @submit.prevent="saveClass">
        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Campo para entrada do nome da aula -->
              <label for="class-name">Nome da aula</label>
              <input type="text" v-model="className" id="class-name" />
            </div>
            <div class="form-column">
              <!-- Campo para selecionar o nome da matéria -->
              <label for="subject-name">Subject Name</label>
              <select v-model="subjectName" id="subject-name">
                <option value="">Selecionar Matéria</option>
                <option value="ap">A&P</option>
                <option value="logica">Lógica</option>
                <option value="fia">FIA</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Campo para entrada do nome do professor -->
              <label for="teacher-name">Nome do professor</label>
              <input type="text" v-model="teacherName" id="teacher-name" />
            </div>
            <div class="form-column">
              <!-- Seletor de tempo de início da aula com horas e minutos -->
              <label for="start-time-hour">Tempo de início</label>
              <div class="time-select">
                <select v-model="startTimeHour" id="start-time-hour">
                  <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
                </select>
                <select v-model="startTimeMinute" id="start-time-minute">
                  <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Seletor do campus onde a aula será ministrada -->
              <label for="campus">Campus</label>
              <select v-model="campus" id="campus">
                <option value="">Selecionar Campus</option>
                <option value="campus1">Campus 1</option>
                <option value="campus2">Campus 2</option>
              </select>
            </div>
            <div class="form-column">
              <!-- Seletor de tempo de fim da aula com horas e minutos -->
              <label for="end-time-hour">Tempo de fim</label>
              <div class="time-select">
                <select v-model="endTimeHour" id="end-time-hour">
                  <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
                </select>
                <select v-model="endTimeMinute" id="end-time-minute">
                  <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <!-- Campo para entrada do nome da sala onde a aula será ministrada -->
              <label for="classroom">Sala</label>
              <input type="text" v-model="classroom" id="classroom" />
            </div>
            <div class="form-column">
              <!-- Seletor do dia da semana em que a aula será ministrada -->
              <label for="weekday">Dia da semana</label>
              <select v-model="weekday" id="weekday">
                <option value="monday">Segunda-feira</option>
                <option value="tuesday">Terça-feira</option>
                <option value="wednesday">Quarta-feira</option>
                <option value="thursday">Quinta-feira</option>
                <option value="friday">Sexta-feira</option>
                <option value="saturday">Sábado</option>
              </select>
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
      className: '',
      subjectName: '',
      teacherName: '',
      startTimeHour: '',
      startTimeMinute: '',
      campus: '',
      endTimeHour: '',
      endTimeMinute: '',
      classroom: '',
      weekday: '',
      // Array de horas (8h a 22h) para popular os selects de hora
      hours: Array.from({ length: 15 }, (_, i) => i + 8).map(hour => (hour < 10 ? '0' + hour : hour)),
      // Array de minutos (0 a 59) para popular os selects de minuto
      minutes: [...Array(60).keys()].map(i => (i < 10 ? '0' + i : i))
    };
  },
  methods: {
    // Navega de volta para a página da grade de aulas
    goBack() {
      this.$router.push('/grade');
    },
    // Exibe um alerta ao salvar a aula
    saveClass() {
      alert('Aula salva com sucesso!');
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
    }
  }
};
</script>

<style scoped>
/* Estilos globais para o corpo da página */
body {
  font-family: Arial, sans-serif;
  font-size: 14px; /* Diminui a fonte de toda a página */
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
  font-size: 14px; /* Diminui a fonte das labels */
}

/* Estilos para os campos de entrada e seletores */
input,
select {
  padding: 10px;
  font-size: 14px; /* Diminui a fonte dos inputs e selects */
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
  align-items: center; /* Alinha verticalmente os itens */
  justify-content: space-between;
  margin-top: 20px;
}

.buttons button {
  padding: 10px 20px;
  font-size: 14px; /* Diminui a fonte dos botões */
  border: 1px solid #000;
  background-color: white;
  cursor: pointer;
  border-radius: 8px; /* Adiciona bordas arredondadas aos botões */
}

.buttons button:hover {
  background-color: lightgray;
}

/* Estilos para o texto "Editar Aula" */
.edit-class {
  font-weight: bold; /* Faz o texto em negrito */
  margin-left: 20px; /* Espaço entre o botão e o texto */
}

/* Estilos para o rodapé da página */
footer {
  border-top: 1px solid #000;
  padding: 10px;
  text-align: center;
  margin-top: 40px;
}

footer a {
  margin: 0 10px;
  color: black;
  text-decoration: none;
  font-weight: bold;
}

footer a:hover {
  color: orange;
}
</style>