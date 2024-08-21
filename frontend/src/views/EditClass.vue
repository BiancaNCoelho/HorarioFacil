<template>
  <div>
    <div class="container">
      <div class="buttons">
        <span class="edit-class">Editar Aula</span>
        <button @click="goBack">&#60; Voltar para grade</button>
      </div>
      <form @submit.prevent="saveClass">
        <div class="form-group">
          <div class="form-row">
            <div class="form-column">
              <label for="class-name">Nome da aula</label>
              <input type="text" v-model="className" id="class-name" />
            </div>
            <div class="form-column">
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
              <label for="teacher-name">Nome do professor</label>
              <input type="text" v-model="teacherName" id="teacher-name" />
            </div>
            <div class="form-column">
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
              <label for="campus">Campus</label>
              <select v-model="campus" id="campus">
                <option value="">Selecionar Campus</option>
                <option value="campus1">Campus 1</option>
                <option value="campus2">Campus 2</option>
              </select>
            </div>
            <div class="form-column">
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
              <label for="classroom">Sala</label>
              <input type="text" v-model="classroom" id="classroom" />
            </div>
            <div class="form-column">
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

        <div class="buttons">
          <button type="submit">Salvar alterações</button>
          <button type="button" @click="deleteClass">Deletar aula</button>
          <button type="button" @click="cancel">Cancelar</button>
        </div>
      </form>
    </div>

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
      hours: Array.from({ length: 15 }, (_, i) => i + 8).map(hour => (hour < 10 ? '0' + hour : hour)),
      minutes: [...Array(60).keys()].map(i => (i < 10 ? '0' + i : i))
    };
  },
  methods: {
    goBack() {
      this.$router.push('/grade');
    },
    saveClass() {
      alert('Aula salva com sucesso!');
    },
    deleteClass() {
      if (confirm('Tem certeza de que deseja deletar esta aula?')) {
        alert('Aula deletada.');
      }
    },
    cancel() {
      if (confirm('Deseja cancelar as alterações?')) {
        this.$router.push('/');
      }
    }
  }
};
</script>

<style scoped>
body {
  font-family: Arial, sans-serif;
  font-size: 14px; /* Diminui a fonte de toda a página */
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

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

.form-group {
  margin-bottom: 20px;
}

.form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.form-column {
  flex: 1;
  display: flex;
  flex-direction: column;
  margin-right: 20px;
}

.form-column:last-child {
  margin-right: 0;
}

label {
  margin-bottom: 5px;
  font-weight: bold;
  font-size: 14px; /* Diminui a fonte das labels */
}

input,
select {
  padding: 10px;
  font-size: 14px; /* Diminui a fonte dos inputs e selects */
  width: 100%;
  box-sizing: border-box;
  border: 1px solid #000;
}

.time-select {
  display: flex;
  gap: 10px;
}

.time-select select {
  flex: 1;
}

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

.edit-class {
  font-weight: bold; /* Faz o texto em negrito */
  margin-left: 20px; /* Espaço entre o botão e o texto */
}

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
