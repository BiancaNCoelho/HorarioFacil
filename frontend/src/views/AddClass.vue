<template>
  <div>
    <div class="container">
      <!-- Cabeçalho com título e botão de voltar -->
      <div class="buttons">
        <h1 class="add-class"><strong>Adicionar Aula</strong></h1>
        <button class="btn-back" @click="goBack">&#60; Voltar</button>
      </div>
      <!-- Formulário para adicionar uma aula -->
      <form @submit.prevent="saveClass">
        <!-- Campo de seleção de matéria -->
        <div class="form-group">
          <label for="subject-name">Disciplina</label>
          <select v-model="subjectName" id="subject-name">
            <option value="">Selecionar Disciplina</option>
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
            <option value="campus1">Campus Anglo</option>
            <option value="campus2">Campus Capão do Leão</option>
            <option value="campus3">Centro de Artes</option>
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
    // Método para salvar a aula com validações
    saveClass() {
  // Verificação de Subject Name
  if (!this.subjectName || this.subjectName === "Selecionar Matéria") {
    alert("Por favor, selecione uma matéria.");
    return;
  }

  // Verificação do nome do Professor
  if (!/^[A-Za-zÀ-ÖØ-öø-ÿ\s]{2,}$/.test(this.teacherName)) {
    alert("O nome do professor deve conter apenas letras (incluindo acentuação) e espaços, com pelo menos duas letras.");
    return;
  }

  // Verificação do Campus
  if (!this.campus || this.campus === "Selecionar Campus") {
    alert("Por favor, selecione um campus.");
    return;
  }

  // Verificação da Sala
  if (!/^[0-9]+$/.test(this.classroom)) {
    alert("O número da sala deve conter apenas números e ter pelo menos um dígito.");
    return;
  }

  // Verificação da seleção de horas e minutos para Tempo de Início e Tempo de Fim
  if (!this.startHour || !this.startMinute) {
    alert("Por favor, selecione a hora e os minutos para o Tempo de Início.");
    return;
  }

  if (!this.endHour || !this.endMinute) {
    alert("Por favor, selecione a hora e os minutos para o Tempo de Fim.");
    return;
  }

  const startTime = parseInt(this.startHour) * 60 + parseInt(this.startMinute);
  const endTime = parseInt(this.endHour) * 60 + parseInt(this.endMinute);

  if (startTime === endTime) {
    alert("Tempo de início e Tempo de fim não podem ser iguais.");
    return;
  }

  if (parseInt(this.startHour) === parseInt(this.endHour) && parseInt(this.endMinute) <= parseInt(this.startMinute)) {
    alert("Os minutos de Tempo de fim devem ser maiores que os minutos de Tempo de início.");
    return;
  }

  if (parseInt(this.startHour) > parseInt(this.endHour)) {
    alert("A hora de Tempo de início não pode ser maior que a hora de Tempo de fim.");
    return;
  }

  // Verificação do Dia da Semana
  if (!this.weekday) {
    alert("Por favor, selecione um dia da semana.");
    return;
  }

  // Se todas as verificações forem satisfeitas
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

.add-class {
  font-size: 20px;
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