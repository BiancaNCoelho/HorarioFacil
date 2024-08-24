<template>
  <div>
    <div class="container">
      <!-- Cabeçalho com título e botão de voltar -->
      <div class="buttons">
        <h1 class="title">Adicionar Aula</h1>
        <button class="btn-back" @click="goBack">&#60; Voltar</button>
      </div>
      <!-- Formulário para adicionar uma aula -->
      <form @submit.prevent="saveClass">
        <!-- Campo de seleção de matéria -->
        <div class="form-group">
          <label for="subject-name">Subject Name</label>
          <select v-model="subjectName" id="subject-name">
            <option value="">Selecionar Matéria</option>
            <option value="ap">A&P</option>
            <option value="logica">Lógica</option>
            <option value="fia">FIA</option>
          </select>
        </div>

        <!-- Campo de entrada para o nome do professor -->
        <div class="form-group">
          <label for="teacher-name">Professor</label>
          <input type="text" v-model="teacherName" id="teacher-name" />
        </div>

        <!-- Campo de seleção para o campus -->
        <div class="form-group">
          <label for="campus">Campus</label>
          <select v-model="campus" id="campus">
            <option value="">Selecionar Campus</option>
            <option value="campus1">Campus 1</option>
            <option value="campus2">Campus 2</option>
          </select>
        </div>

        <!-- Campo de entrada para a sala -->
        <div class="form-group">
          <label for="classroom">Sala</label>
          <input type="text" v-model="classroom" id="classroom" />
        </div>

        <!-- Campos para selecionar o horário de início -->
        <div class="form-group">
          <label for="start-time">Tempo de início</label>
          <div class="time-select">
            <select v-model="startHour" id="start-hour">
              <!-- Gera opções de horas (de 8 a 22) -->
              <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
            </select>
            <select v-model="startMinute" id="start-minute">
              <!-- Gera opções de minutos (de 0 a 59) -->
              <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
            </select>
          </div>
        </div>

        <!-- Campos para selecionar o horário de término -->
        <div class="form-group">
          <label for="end-time">Tempo de fim</label>
          <div class="time-select">
            <select v-model="endHour" id="end-hour">
              <!-- Gera opções de horas (de 8 a 22) -->
              <option v-for="hour in hours" :key="hour" :value="hour">{{ hour }}</option>
            </select>
            <select v-model="endMinute" id="end-minute">
              <!-- Gera opções de minutos (de 0 a 59) -->
              <option v-for="minute in minutes" :key="minute" :value="minute">{{ minute }}</option>
            </select>
          </div>
        </div>

        <!-- Campo de seleção do dia da semana -->
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

        <!-- Botão para enviar o formulário -->
        <div class="buttons">
          <button type="submit" class="btn-back">Adicionar Aula</button>
        </div>
      </form>
    </div>

    <!-- Rodapé com links para notificações e configurações -->
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
      // Dados do formulário para armazenar os valores selecionados ou digitados pelo usuário
      subjectName: '',
      teacherName: '',
      campus: '',
      classroom: '',
      startHour: '',
      startMinute: '',
      endHour: '',
      endMinute: '',
      weekday: '',
      // Array de horas (de 8 a 22) gerado dinamicamente para os campos de seleção
      hours: Array.from({ length: 15 }, (_, i) => i + 8).map(hour => (hour < 10 ? '0' + hour : hour)),
      // Array de minutos (de 0 a 59) gerado dinamicamente para os campos de seleção
      minutes: Array.from({ length: 60 }, (_, i) => (i < 10 ? '0' + i : i))
    };
  },
  methods: {
    // Método para navegar de volta à página de grade de aulas
    goBack() {
      this.$router.push('/grade');
    },
    // Método para salvar a aula, atualmente apenas mostra um alerta de sucesso
    saveClass() {
      alert('Aula adicionada com sucesso!');
    }
  }
};
</script>

<style scoped>
/* Estilos gerais para o corpo */
body {
  font-family: Arial, sans-serif;
  font-size: 14px;
}

/* Estilos para o container principal */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

/* Estilos para o cabeçalho e botões */
.buttons {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

/* Estilo para o título do formulário */
.buttons h1.title {
  margin: 0 0 0 15px;
  font-weight: bold;
  font-size: 16px;
}

/* Estilos para o botão de voltar */
.btn-back {
  padding: 10px 20px;
  font-size: 14px;
  border: 1px solid #000;
  background-color: white;
  cursor: pointer;
  border-radius: 4px; /* Cantos levemente arredondados */
  transition: background-color 0.3s ease;
}

/* Estilos para o botão de voltar ao passar o mouse */
.btn-back:hover {
  background-color: lightgray; /* Cor de fundo ao passar o mouse */
}

/* Estilos para os grupos de formulário */
.form-group {
  margin-bottom: 20px;
}

/* Estilos para os rótulos dos campos */
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  font-size: 14px;
}

/* Estilos para os campos de entrada e seleção */
input,
select {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  border: 1px solid #000;
  box-sizing: border-box;
}

/* Estilos para os campos de seleção de tempo */
.time-select {
  display: flex;
  gap: 10px;
}

/* Estilos para o rodapé */
footer {
  border-top: 1px solid #000;
  padding: 10px;
  text-align: center;
  margin-top: 40px;
}

/* Estilos para os links no rodapé */
footer a {
  margin: 0 10px;
  color: black;
  text-decoration: none;
  font-weight: bold;
}

/* Estilos para os links no rodapé ao passar o mouse */
footer a:hover {
  color: orange;
}
</style>