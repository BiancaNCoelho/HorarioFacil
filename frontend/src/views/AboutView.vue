<template>
  <div class="aboutview">
    <router-view :key="$route.fullPath"></router-view>
    
    <!-- Primeiro quadrante (carrossel) -->
    <section class="quadro1">
      <b-carousel :indicator-inside="false">
        <b-carousel-item v-for="(item, i) in 6" :key="i">
          <b-image class="image" :src="getImgUrl(i)"></b-image>
          <div class="carousel-caption">
            <h3><strong>{{ getCaption(i) }}</strong></h3>
          </div>
        </b-carousel-item>
    </b-carousel>
    </section>

    <!-- Segundo quadrante (texto) -->
    <section class="quadro2">
      <h2 class="sobre-texto-titulo"><strong>Sobre a Aplicação</strong></h2>
      <h1 class="sobre-texto">
        &nbsp;&nbsp;&nbsp;&nbsp;Essa aplicação web foi feita pelos alunos <strong>Alejandro Tomas Reyes Alberoni</strong>, <strong>Bianca Nunes Coelho</strong>,
        <strong>Luis Eduardo Rasch</strong>, <strong>Rafael Belém Teixeira</strong> e <strong>Raissa Nunes Coelho</strong>, como trabalho final da disciplina
        Tópicos Especiais em Computação, ministrada pela professora <strong>Patrícia Augustin Jaques</strong>, no curso de 
        Ciência da Computação da Universidade Federal de Pelotas.
      </h1>
      <p class="sobre-texto">
        &nbsp;&nbsp;&nbsp;&nbsp;O projeto foi inspirado pela necessidade crescente de um sistema de gerenciamento de horários que fosse não apenas funcional, 
        mas também responsivo a mudanças em tempo real. A aplicação foi desenvolvida com o intuito de facilitar a vida dos alunos, e
        professores, da UFPel, tornando o processo de montagem e verificação de horários mais rápido e eficiente.
      </p>
    </section>

    <!-- Terceiro quadrante (texto) -->
    <section class="quadro3">
      <h2 class="sobre-texto-titulo"><strong>Principais Funcionalidades</strong></h2>
      <h1 class="sobre-texto">
        <strong>Grade Horária Dinâmica:</strong> Uma interface onde os usuários podem ver sua programação atualizada em tempo real, com opções de visualização semanal e mensal.
        <br><strong>Alertas Automáticos:</strong> Notificações em tempo real sobre mudanças de local ou cancelamento de aulas, garantindo que os usuários estejam sempre informados.
        <br><strong>Histórico de Alterações:</strong> Registro completo de todas as modificações feitas na grade horária, permitindo rastrear mudanças passadas.
        <br><strong>Configuração de Preferências:</strong> Opções para personalizar a forma como os alertas são recebidos, seja por e-mail, notificações push, ou mensagens de texto.
      </h1>
    </section>

    <!-- Quarto quadrante (imagem? carrossel?) -->
    <section class="quadro4">
      <h1 class="sobre-texto-placeholder">Img Place Holder</h1>
    </section>

    <!-- Mais setores (contato/suporte) -->
  </div>
</template>

<script>
  /** Receber URLs das imagens do carrossel */
export default {
  methods: {
      getImgUrl(value) {
        const urls = [
        'https://thumbs.dreamstime.com/b/homem-cinzento-do-placeholder-da-foto-pessoa-genérica-silhueta-cinzenta-em-um-fundo-branco-144511705.jpg',
        'https://i.postimg.cc/xdCTmqxP/BIANCA.png',
        'https://i.postimg.cc/VNVsW12P/imagem-2024-08-17-173107003.png',
        'https://thumbs.dreamstime.com/b/homem-cinzento-do-placeholder-da-foto-pessoa-genérica-silhueta-cinzenta-em-um-fundo-branco-144511705.jpg',
        'https://i.postimg.cc/LXGX2RV3/imagem-2024-08-17-173045530.png',
        'https://i.postimg.cc/gj3GnCDP/patricia.jpg'
        ];
        return urls[value] || '';
    },
    
    /** Legendas do carrossel */
    getCaption(value) {
      const captions = [
        'Alejandro Tomas Reyes Alberoni',
        'Bianca Nunes Coelho',
        'Luis Eduardo Rasch',
        'Rafael Belém Teixeira',
        'Raissa Nunes Coelho',
        'Professora Patrícia Augustin Jaques'
      ];
      return captions[value] || '';
    }
  }
}
</script>

<style src="../assets/about.css"></style>