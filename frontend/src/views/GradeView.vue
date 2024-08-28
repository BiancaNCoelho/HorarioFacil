<template>
    <div class="grade-view">
        <table class="bordered" v-if="aulas.length > 0">
            <thead>
                <tr>
                    <th class="centered-header">Horário</th>
                    <th class="centered-header" v-for="day in days" :key="day">{{ day }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="timeSlot in timeSlots" :key="timeSlot">
                    <td class="centered-header">{{ timeSlot }}</td>
                    <td v-for="day in days" :key="day">
                        <div v-for="aula in filterAulas(day, timeSlot)" :key="aula.id">
                            <div class="aula-card" :class="{ canceled: aula.cancelada }">
                                <div class="aula-info">
                                    <span class="turma-id">{{ aula.nome }}</span>
                                    <span class="aula-details">Sala: {{ aula.sala }}</span>
                                    <span class="aula-details">Local: {{ aula.local || 'Não especificado' }}</span>
                                </div>
                                <span v-if="aula.cancelada" class="canceled-label">(Cancelada)</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            Carregando aulas...
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            aulas: [], // Inicializa como um array vazio
            days: ['segunda', 'terça', 'quarta', 'quinta', 'sexta'], // Dias da semana
            timeSlots: ['08:00', '10:00', '13:30', '15:10', '17:10'] // Horários das aulas
        };
    },
    methods: {
        async fetchAulas() {
            try {
                const response = await axios.get('/api/aulas');
                this.aulas = response.data;
            } catch (error) {
                console.error('Failed to fetch aulas:', error);
            }
        },
        filterAulas(day, timeSlot) {
            return this.aulas.filter(aula => aula.dia_da_semana === day && aula.horario === timeSlot);
        }
    },
    mounted() {
        this.fetchAulas();
    }
};
</script>

<style scoped>
.centered-header {
    text-align: center;
}

.grade-view {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    font-family: 'Arial', sans-serif;
}

table.bordered {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 20px;
    text-align: center;
    border: 1px solid #ccc; /* Adiciona bordas */
    vertical-align: middle; /* Centraliza verticalmente o conteúdo */
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    font-size: 16px;
    color: #333;
}

td {
    font-size: 14px;
    color: #666;
}

.aula-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 5px;
}

.aula-card.canceled {
    border-color: #f44336; /* Borda vermelha para aulas canceladas */
    background-color: #fdd;
}

.aula-info {
    text-align: center;
}

.turma-id {
    font-weight: bold;
}

.aula-details {
    display: block;
    margin: 5px 0;
}

.canceled-label {
    color: #f44336; /* Cor vermelha para indicar cancelamento */
    font-weight: bold;
}
</style>