<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover" body-classes="table-full-width table-responsive">
            <template slot="header">
              <h4 class="card-title">Striped Table with Hover</h4>
              <p class="card-category">Here is a subtitle for this table</p>
            </template>
            <l-table class="table-hover table-striped" :columns="table1.columns" :data="table1.data">
            </l-table>
          </card>

        </div>

        <div>
          <table>
            <thead>
              <tr>Name rol</tr>
              <tr>Editar</tr>
              <tr>Eliminar</tr>
            </thead>
            <tbody>
              <tr v-for=" rol, i in roles" :key="rol.id">
                <td class="border border-gray-400 px-4 py-4">
                  {{ i + 1 }}
                </td>
                <td class="border border-gray-400 px-4 py-4">
                  {{ rol.name }}
                </td>
                <td class="border border-gray-400 px-4 py-4">
                  <button>
                    <i class="fa-solid fa-edit"></i>
                  </button>
                </td>
                <td class="border border-gray-400 px-4 py-4">
                  <button>
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-12">
          <card class="card-plain">
            <template slot="header">
              <h4 class="card-title">Table on Plain Background</h4>
              <p class="card-category">Here is a subtitle for this table</p>
            </template>
            <div class="table-responsive">
              <l-table class="table-hover" :columns="table2.columns" :data="table2.data">
              </l-table>
            </div>
          </card>
        </div>

        <div class="col-12">
          <card class="strpied-tabled-with-hover" body-classes="table-full-width table-responsive">
            <template slot="header">
              <h4 class="card-title">Small table</h4>
              <p class="card-category">Here is a subtitle for this table</p>
            </template>
            <l-table class="table-hover table-striped table-sm" :columns="table1.columns" :data="table1.data">
            </l-table>
          </card>

        </div>

      </div>
    </div>
  </div>
</template>
<script>
import LTable from 'src/components/Table.vue'
import Card from 'src/components/Cards/Card.vue'
import axios from 'axios';


const tableColumns = ['Id', 'Name', 'Salary', 'Country', 'City']
const tableData = [{
  id: 1,
  name: 'Dakota Rice',
  salary: '$36.738',
  country: 'Niger',
  city: 'Oud-Turnhout'
},
{
  id: 2,
  name: 'Minerva Hooper',
  salary: '$23,789',
  country: 'Curaçao',
  city: 'Sinaai-Waas'
},
{
  id: 3,
  name: 'Sage Rodriguez',
  salary: '$56,142',
  country: 'Netherlands',
  city: 'Baileux'
},
{
  id: 4,
  name: 'Philip Chaney',
  salary: '$38,735',
  country: 'Korea, South',
  city: 'Overland Park'
},
{
  id: 5,
  name: 'Doris Greene',
  salary: '$63,542',
  country: 'Malawi',
  city: 'Feldkirchen in Kärnten'
}]
export default {
  components: {
    LTable,
    Card
  },
  data() {
    return {
      roles: [],
      table1: {
        columns: [...tableColumns],
        data: [...tableData]
      },
      table2: {
        columns: [...tableColumns],
        data: [...tableData]
      }
    }
  },

  methods: {
    async getRoles() {
      try {
        axios.get("http://127.0.0.1:8000/api/roles")
          .then((response) => {
            this.roles = response.data
            this.getCities();
          })
          .catch((error) => {
            console.error(error);
          });
      } catch (error) {
        console.log(error);
      }
    },
  }



}
</script>
<style></style>
