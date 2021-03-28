<template>
  <div>
    <b-button
    v-b-modal='id' style="background:transparent;border:none!important;float:left; padding:0;">
    <i class="fa fa-edit my-add-car-icon" aria-hidden="true"></i> </b-button>
    <b-modal
      hide-footer
      :id='id'
      ref='modal'
      title='Edite seu carro'
      v-if='showThisModal'
    >
      <form ref='form' id="formNewCar">
        <b-form-group
          label='Marca'
          label-for='brand'
          invalid-feedback='A Marca é obrigatória'
        >
        <b-form-input list="my-list-id" v-model='car.brand' required @focus="onChange($event)"></b-form-input>
        <datalist id="my-list-id">
          <option v-for="option in options" :key="option.id">{{ option.brand }}</option>
        </datalist>
        </b-form-group>
          <b-form-group
          label='Modelo'
          label-for='model'
          invalid-feedback='O Modelo é obrigatório'
        >
          <b-form-input
            id='model'
            v-model='car.model'
            required
          ></b-form-input>
        </b-form-group>
        <b-form-group
          label='Ano'
          label-for='year'
        >
          <b-form-input
            id='year'
            v-model='car.year'
            required
          ></b-form-input>
        </b-form-group>
      </form>
      <div class="my-btn-group">
        <button style="color: #000 !important;" v-on:click="updateCar" align='center' class="btn my-btn-2"> Salvar </button>
      </div>
      <div v-if='showErrorMsg' class="alert alert-danger error-msg" role="alert">
          <span v-html='errorMsg'></span>
      </div>
    </b-modal>
    <div v-if='loading' class="my-loader">
      <img src="../../assets/loader.gif">
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      car: {
        brand: '',
        model: '',
        year: ''
      },
      errorMsg: 'e',
      showErrorMsg: false,
      loading: false,
      id: '',
      showThisModal: true,
      options: []
    }
  },
  props: {
    showModal: Number
  },
  mounted () {
    this.id = this.showModal
    this.id = this.id.toString()
    this.getCar()
    this.getResults()
  },
  methods: {
    resetModal () {
      this.car.brand = ''
      this.car.model = ''
      this.showErrorMsg = false
      this.car.year = ''
    },
    updateCar () {
      this.loading = true
      const data = new URLSearchParams()
      data.append('brand', this.car.brand)
      data.append('model', this.car.model)
      data.append('year', this.car.year)
      const validation = this.validations()
      if (validation === 0) {
        fetch('http://localhost:8000/carros/' + this.id, {
          method: 'PUT',
          body: data
        }).then(response => response.json())
          .then(jsonBody => {
            if (jsonBody.status === 'error') {
              this.errorMsg = jsonBody.message
              this.showErrorMsg = true
              this.loading = false
            } else {
              this.shootAdded()
              this.loading = false
              this.showThisModal = false
            }
          })
      } else {
        this.loading = false
      }
    },
    shootAdded () {
      this.$emit('added')
    },
    validations () {
      let currentYear = new Date().getFullYear()
      currentYear = currentYear + 1
      if (this.car.year < 1980 || this.car.year > currentYear || isNaN(this.car.year)) {
        this.errorMsg = 'Parece que o ano que você inseriu é inválido!'
        this.showErrorMsg = true
        return 1
      }
      return 0
    },
    getCar () {
      fetch('http://localhost:8000/carros/' + this.id)
        .then((response) => response.json())
        .then((jsonBody) => {
          this.car.brand = jsonBody.data.brand
          this.car.model = jsonBody.data.model
          this.car.year = jsonBody.data.year
        })
    },
    getResults () {
      fetch('http://localhost:8000/carros/list/brands')
        .then((response) => response.json())
        .then((jsonBody) => {
          this.options = jsonBody.data
        })
    },
    onChange () {
      console.log('selecionei')
      const cat = document.getElementById('my-list-id')
      cat.style.display = 'block'
    }
  }
}
</script>

<style scoped>
.my-btn-group{
    width: 100%;
    text-align: center;
    align-content: center;
}
.my-btn-2{
    background-color: #47cf73!important;
    color: #000!important;
    margin-bottom: 1rem;
}
.my-add-car-icon{
  font-size:20px; margin-left:15px;margin-top: 1.5px;
}
.btn:active,.btn:focus{
border: none!important;
}
.btn {
border: none!important;
color: #6b6b6b !important;
}
.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus, .show > .btn-secondary.dropdown-toggle:focus {
    box-shadow: none!important;
    border: none!important;
}
.btn-secondary:focus, .btn-secondary.focus {
    box-shadow: none!important;
    border: none!important;
}
.alert {
    padding: 0.5rem 1.25rem;
}
.btn-secondary{
  color: #6b6b6b !important;
}
#my-list-id option{
  font-size: 0px;
  display: none;
}
@media only screen and (max-width: 420px) {
.my-add-car-icon {
margin-left:0!important;
}
}
</style>
