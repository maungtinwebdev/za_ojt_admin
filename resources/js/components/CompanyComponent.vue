<template>
    <div class="container">
        <div class="row justify-content-end mb-2">
            <div class="col-4">
                <button @click="add()" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i>Create</button>
            </div>
            <div class="col-4">

                <h3>Total: {{ companies.length }}</h3>

            </div>

        </div>
        <div class="row d-flex flex-wrap">
            <div class="col-4">
                <div>
                    <!-- left-side -->
                    <div class="card position-sticky">
                        <h4 class="card-header">{{isEditMode? "EDIT": "CREATE"}}</h4>
                        <div class="card-body">
                            <form @submit="store()">
                                <label class="input-group" for="">Name:</label>
                                <input v-model="company.name" type="text" class="form-control" required>

                                <label for="" class="input-group">Email:</label>
                                <input v-model="company.email" type="text" class="form-control" required>

                                <label for="" class="input-group">Website Address:</label>
                                <input v-model="company.website" type="text" class="form-control" required>

                                <button type="submit" class="btn my-3 btn-primary"><i class="fas fa-save me-2"></i>{{isEditMode? "Update":"Save"}}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div>
                    <!-- right-side -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="c in companies" :key="c.id">
                                <td>{{c.id}}</td>
                                <td>{{c.name}}</td>
                                <td>{{c.email}}</td>
                                <td>{{c.website}}</td>
                                <td>
                                    <button @click="edit(c)" class="btn btn-success btn-sm" style="font-size: 7px;"><i class="fas fa-edit me-1"></i>Edit</button>
                                    <form @submit.prevent="del(c.id)">
                                        <button class="btn btn-danger btn-sm" style="font-size: 7px;"><i class="fas fa-trash-alt me-1"></i>Del</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <ul>
                    <li>
                        <h3>Total Employee => {{ employees.length }}</h3><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Company ID</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody v-for="e in employees" :key="e.id">
                                <tr >
                                    <!-- <td>{{ p.employees }}</td> -->
                                    <td>{{ e.name }}</td>
                                    <td>{{ e.company_id }}</td>
                                    <td>{{ e.email }}</td>
                                    <td>{{ e.phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
                <br> <hr>
            </div>
        </div>


    </div>
</template>
<script>
export default {
    name:"CompanyComponent",

    data(){
        return {
            search:"",
            isEditMode:false,
            companies:{},
            employees:{},
            company: {
                name:"",
                email:"",
                logo:"",
                website:""
            }
        }
    },
    methods:{
        employeesOfCompany(companyId) {
          return this.employees.filter(employee => employee.company_id === companyId);
        },
        add() {
            this.isEditMode = false;
            this.company = {
                name:"",
                email:"",
                website:""
            }
        },
        view() {
            axios.get('http://localhost:8000/api/company')
            .then(res=>{
                this.companies = res.data;
            });
            axios.get('http://localhost:8000/api/employee')
            .then(res1=>{
                this.employees = res1.data;
                this.employees1 = c.res1.data;
            });
        },

        store() {
            axios.post('http://localhost:8000/api/company', this.company)
            // .then(res=>{
            //     // this.view();
            //     console.log('this.company');

            // });
            // return this.view();
        },

        edit(c) {
            this.isEditMode = true;
            this.company.id = c.id;
            this.company.name = c.name;
            this.company.email = c.email;
            this.company.website = c.website;
        },

        update() {
            axios.put(`http://localhost:8000/api/company/${this.company.id}`, this.company)
            .then(res=>{
                this.view();
                this.company.id = "";
                this.company.name = "";
                this.company.email = "";
                this.company.website = "";

            })
        },

       del(id) {
            // if(!confirm('Are you sure to Delte?')) {
            //     return;
            // }
            axios.delete(`http://localhost:8000/api/company/${id}`)
            .then(res=>{
                this.company = res.data;
                // this.view();
            });
            return this.view();
        }
    },
    computed: {
        groupedEmployees() {
            const grouped = {};
                 this.companies.forEach(company => {
                grouped[company.id] = this.employees.filter(employee => employee.company_id === company.id);
            });
      return grouped;
    }

    //   filteredData() {
    //     return this.products
    //       .filter(
    //         (entry) => this.products.length
    //           ? Object.keys(this.products[0])
    //               .some(key => ('' + entry[key]).toLowerCase().includes(this.search))
    //           : true
    //       );
    //   }
    },
    created(){
        this.view();
        this.store();
        this.update();
        this.del();
    }
}
</script>
<style>

</style>
