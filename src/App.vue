<script >
import axios from 'axios';

export default{

  data(){

    return{
      toDos:[],
      newTask:{
        taskName: "",
        taskDone: false,
      },
    }

  },
  
  methods:{

    onSubmit(){

      const url = "http://localhost/eserciziBoolean/php-todo-list-json/toDoList/server/addTask.php";
      const headers = {
            headers: {"Content-Type": "multipart/form-data"}
      };

      axios.post(url, this.newTask, headers).then(response => {
        this.toDos = response.data
        this.newTask.taskName = ""
      })

    },

    deleteTask(index){
      
      const url = "http://localhost/eserciziBoolean/php-todo-list-json/toDoList/server/deleteTask.php";

      const headers = {
        headers: {"Content-Type": "multipart/form-data"}
      };

      const taskToDelete = {
        index:index
      }

      axios.post(url, taskToDelete, headers).then(response => {
        this.toDos = response.data
      })
      
    }

  },

  mounted(){

    axios.get("http://localhost/eserciziBoolean/php-todo-list-json/toDoList/server/index.php")
    .then(response => {
      this.toDos = response.data;
    })

  }
  
}

</script>

<template>


<ul>
  <li v-for="(toDo, index) in toDos" :key="index">{{ toDo.taskName }}
  <span @click="deleteTask(index)">X</span>
  </li>
  
</ul>

<form @submit.prevent="onSubmit">
 
  <input type="text" placeholder="My new task..." name="text" id="text" v-model="newTask.taskName">
  <input type="submit" value="add task">

</form>

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


span{
  cursor: pointer;
}

</style>
