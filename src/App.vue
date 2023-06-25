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
      
    },

    doneUndone(index){
      const url = "http://localhost/eserciziBoolean/php-todo-list-json/toDoList/server/doneUndone.php";

      const headers = {
        headers: {"Content-Type": "multipart/form-data"}
      };

      const taskToDoneUndone = {
        index:index
      }

      axios.post(url, taskToDoneUndone, headers).then(response => {
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
  <li v-for="(toDo, index) in toDos" :key="index" @click="doneUndone(index) " :class="toDo.taskDone === false ? '' : 'done'" >{{ toDo.taskName }}
    <i @click="deleteTask(index)" class="fa-solid fa-circle-xmark"></i>
  </li>
  
</ul>

<form @submit.prevent="onSubmit">
 
  <input type="text" placeholder="My new task..." name="text" id="text" v-model="newTask.taskName">
  <input type="submit" value="add task">

</form>


  
</template>

<style scoped>


i{
  cursor: pointer;
  margin-left: 20px;
  padding: 10px;
  text-decoration: none;
}

.done{
  text-decoration: line-through;
}

</style>
