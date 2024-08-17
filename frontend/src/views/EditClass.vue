<template>
  <div>
    <header>
      <img src="@/assets/logo.svg" alt="Logo" />
      <nav>
        <router-link to="/">Home</router-link>
        <router-link to="/grade">Grade</router-link>
        <router-link to="/adicionar-aula">Adicionar Aula</router-link>
        <a class="disabled-link" href="javascript:void(0);">Editar Aula</a>
      </nav>
    </header>

    <div class="container">
      <h1>Editar Aula</h1>
      <div class="buttons">
        <button @click="goBack">&#60; Voltar para grade</button>
      </div>
      <form @submit.prevent="saveClass">
        <div class="form-group">
          <div>
            <label for="class-name">Nome da aula</label>
            <input type="text" v-model="className" id="class-name" />
          </div>
          <div>
            <label for="subject-name">Subject Name</label>
            <select v-model="subjectName" id="subject-name">
              <option value="">Selecionar Matéria</option>
              <option value="ap">A&P</option>
              <option value="logica">Lógica</option>
              <option value="fia">FIA</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div>
            <label for="teacher-name">Nome do professor</label>
            <input type="text" v-model="teacherName" id="teacher-name" />
          </div>
          <div>
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

        <div class="form-group">
          <div>
            <label for="campus">Campus</label>
            <select v-model="campus" id="campus">
              <option value="">Selecionar Campus</option>
              <option value="campus1">Campus 1</option>
              <option value="campus2">Campus 2</option>
            </select>
          </div>
          <div>
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

        <div class="form-group">
          <div>
            <label for="classroom">Sala</label>
            <input type="text" v-model="classroom" id="classroom" />
          </div>
          <div>
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
      hours: [...Array(24).keys()].map(i => (i < 10 ? '0' + i : i)),
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
/* O estilo pode ser o mesmo que foi definido anteriormente */
</style>