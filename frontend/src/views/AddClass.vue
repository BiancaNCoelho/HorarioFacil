<template>
  <div>
    <div class="container">
      <div class="buttons">
        <h1 class="title">Adicionar Aula</h1>
        <button class="btn-back" @click="goBack">&#60; Voltar</button>
      </div>
      <form @submit.prevent="saveClass">
        <div class="form-group">
          <label for="subject-name">Subject Name</label>
          <select v-model="subjectName" id="subject-name">
            <option value="">Selecionar Matéria</option>
            <option value="ap">A&P</option>
            <option value="logica">Lógica</option>
            <option value="fia">FIA</option>
          </select>
        </div>

        <div class="form-group">
          <label for="teacher-name">Professor</label>
          <input type="text" v-model="teacherName" id="teacher-name" />
        </div>

        <div class="form-group">
          <label for="campus">Campus</label>
          <select v-model="campus" id="campus">
            <option value="">Selecionar Campus</option>
            <option value="campus1">Campus 1</option>
            <option value="campus2">Campus 2</option>
          </select>
        </div>

        <div class="form-group">
          <label for="classroom">Sala</label>
          <input type="text" v-model="classroom" id="classroom" />
        </div>

        <div class="form-group">
          <label for="start-time">Tempo de início</label>
          <div class="time-select">
            <select v-model="startHour" id="start-hour">
              <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
            </select>
            <select v-model="startMinute" id="start-minute">
              <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="end-time">Tempo de fim</label>
          <div class="time-select">
            <select v-model="endHour" id="end-hour">
              <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
            </select>
            <select v-model="endMinute" id="end-minute">
              <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="weekday">Dia</label>
          <select v-model="weekday" id="weekday">
            <option value="monday">Segunda-feira</option>
            <option value="tuesday">Terça-feira</option>
            <option value="wednesday">Quarta-feira</option>
            <option value="thursday">Quinta-feira</option>
            <option value="friday">Sexta-feira</option>
            <option value="saturday">Sábado</option>
          </select>
        </div>

        <div class="buttons">
          <button type="submit" class="btn-back">Adicionar Aula</button>
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
      subjectName: '',
      teacherName: '',
      campus: '',
      classroom: '',
      startHour: '',
      startMinute: '',
      endHour: '',
      endMinute: '',
      weekday: '',
      hours: Array.from({ length: 15 }, (_, i) => i + 8).map(hour => (hour < 10 ? '0' + hour : hour)),
      minutes: Array.from({ length: 60 }, (_, i) => (i < 10 ? '0' + i : i))
    };
  },
  methods: {
    goBack() {
      this.$router.push('/grade');
    },
    saveClass() {
      alert('Aula adicionada com sucesso!');
    }
  }
};
</script>

<style scoped>
body {
  font-family: Arial, sans-serif;
  font-size: 14px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.buttons {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.buttons h1.title {
  margin: 0 0 0 15px;
  font-weight: bold;
  font-size: 16px;
}

.btn-back {
  padding: 10px 20px;
  font-size: 14px;
  border: 1px solid #000;
  background-color: white;
  cursor: pointer;
  border-radius: 4px; /* Cantos levemente arredondados */
  transition: background-color 0.3s ease;
}

.btn-back:hover {
  background-color: lightgray; /* Cor de fundo ao passar o mouse */
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  font-size: 14px;
}

input,
select {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  border: 1px solid #000;
  box-sizing: border-box;
}

.time-select {
  display: flex;
  gap: 10px;
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
