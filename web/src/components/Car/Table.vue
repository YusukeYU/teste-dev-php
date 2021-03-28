<template>
  <div>
    <table class="table table-dark">
      <thead>
          <tr class="my-title-table">
            <th class="my-title-th">CARROS</th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th class="my-th-fa-add-icon">
              <div class="background-icon">
                 <AddForm @added="addedCar">  </AddForm>
              </div>
            </th>
          </tr>
        <tr class="my-title-second-table">
          <th style="padding-left:30px;">#</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="car in data" :key="car.id">
          <td style="padding-left:30px;">{{ car.id }}</td>
          <td>{{ car.brand }}</td>
          <td>{{ car.model }}</td>
          <td>{{ car.year }}</td>
          <td> <i style="font-size:20px;float:left!important;" class="fa fa-trash" aria-hidden="true" v-on:click='deleteCar(car.id)'> </i>
               <EditForm @added="addedCar" v-bind:showModal=car.id></EditForm>
          </td>
        </tr>
      </tbody>
    </table>
    <div v-if='loading' class="my-loader">
      <img src="../../assets/loader.gif">
    </div>

  </div>
</template>

<script>
import AddForm from '@/components/Car/AddForm.vue'
import EditForm from '@/components/Car/EditForm.vue'
export default {
  components: {
    AddForm,
    EditForm
  },
  data () {
    return {
      data: [],
      loading: false,
      showEditForm: false
    }
  },
  methods: {
    getResults () {
      this.loading = true
      fetch('http://localhost:8000/carros')
        .then((response) => response.json())
        .then((jsonBody) => {
          this.data = jsonBody.data
          this.loading = false
        })
    },
    addedCar () {
      this.getResults()
    },
    deleteCar (id) {
      this.loading = true
      fetch('http://localhost:8000/carros/' + id, {
        method: 'DELETE'
      }).then((response) => this.getResults())
    }
  },
  created () {
    this.getResults()
  }
}
</script>

<style scoped>
.my-title-table{
  background-color: #418a95;
  height: 70px;
}
.my-title-th{
  padding-left: 30px;
  color: #f6f3f7;
  font-weight: bold;
  vertical-align: middle!important;
}
.table-dark{
  background-color:#1e1f26!important;
}
.my-title-second-table{
   background-color:#63acb7!important;
   font-size: 13px;
}
.table-dark th, .table-dark td, .table-dark thead th{
  border: none!important;
}
.my-title-second-table th {
  padding-top:5px;
  padding-bottom:5px;
}
.table-dark tbody td {
 font-weight: bold!important;
}
.table-dark tbody{
  background-color:#d4d1d5!important;
  color:#6b6b6b!important;
}
.my-th-fa-add-icon{
  vertical-align: middle!important;
  text-align: right;
  padding: 0;
  float: right;
}
.background-icon{
  background-color: #3a7c86;
  padding: 20px 25px;
  text-align: center;
}
.background-icon:hover{
  cursor: pointer;
}
tbody i{
cursor: pointer;
}
tbody i {
vertical-align: top;
}

@media only screen and (max-width: 420px) {
.background-icon {
    padding: 15px 0;
}
.table-dark {
display: block;
width: 100%;
overflow-x: auto;
}
.my-add-car-icon {
margin-left:0!important;
}
}
</style>
