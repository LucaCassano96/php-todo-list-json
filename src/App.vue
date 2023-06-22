<script >
import axios from 'axios';

export default{

  data(){

    return{
      toDos:[]
    }

  },

  mounted(){

    axios.get("http://localhost/eserciziBoolean/php-todo-list-json/toDoList/server/")
    .then(response => {
      this.toDos = response.data;
      console.log(this.toDos);
    })

  }
}

</script>

<template>


<ul>
  <li v-for="(toDo, index) in toDos" :key="index">{{ toDo.taskName }}</li>
</ul>

  <!-- Todo
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo. Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.

Nello svolgere l’esercizio seguite un approccio graduale. Prima assicuratevi che la vostra pagina index (front-end) riesca a comunicare correttamente con il vostro script PHP (back-end API).

Lo step successivo è quello di "testare" l'invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).

Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.

Bonus
Mostrare lo stato del task → se completato, barrare il testo
Permettere di segnare un task come completato facendo click sul testo
Permettere il toggle del task (completato/non completato)
Abilitare l’eliminazione di un task -->

  
</template>

<style scoped>

</style>
