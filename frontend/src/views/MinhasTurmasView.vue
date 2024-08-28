<template>
    <div>
        <template>
            <div>
                <div class="grid">
                    <div v-for="turma in turmas" :key="turma.id" class="grid-item">
                        <h2>{{ turma.nome }}</h2>
                        <button @click="verAulas(turma.id)">Ver Aulas</button>
                        <button @click="adicionarAula(turma.id)">Adicionar Aula</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            turmas: []
        };
    },
    mounted() {
        this.fetchTurmas();
    },
    methods: {
        fetchTurmas() {
            axios.get('/api/turma')
                .then(response => {
                    this.turmas = response.data;
                    console.log(this.turmas)
                })
                .catch(error => {
                    console.error('Erro ao buscar turmas:', error);
                });
        },
        verAulas(turmaId) {
            this.$router.push({ name: 'aulas', params: { id: turmaId } });
        },
        adicionarAula(turmaId) {
            this.$router.push({ name: 'add', params: { id: turmaId } });
        }
    }
};
</script>

<style>
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    grid-gap: 20px;
}

.grid-item {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.grid-item h2 {
    margin-bottom: 10px;
}

.grid-item button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

.grid-item button:hover {
    background-color: #0056b3;
}
</style>