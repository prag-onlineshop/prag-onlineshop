<template>
<div>
   <div class="container">
      <h2>Coupon List</h2>
      <div align="right" class="m-2">
         <a class="btn btn-success" @click="newModal">Create New Coupon</a>
      </div>
      <table class="table table-bordered" id="laravel_datatable">
         <thead>
            <tr class="text-white bg-primary">
               <th scope="col"></th>
               <th scope="col">Name</th>
               <th scope="col">Code</th>
               <th scope="col">Type</th>
               <th scope="col">Amount</th>
               <th scope="col">Time Created</th>
               <th scope="col">Time Updated</th>
               <th>Actions</th>
            </tr>
            <tr v-for="(coupon, couponNum) in coupons.data" :key="coupon.id">
                <td>{{ couponNum+1 }}</td>
                <td>{{ coupon.name | upText }}</td>
                <td>{{ coupon.code }}</td>
                <td>{{ coupon.type }}</td>
                <td>{{ coupon.amount }}</td>
                <td>{{ coupon.created_at | myDate}}</td>
                <td>{{ coupon.updated_at | myDate}}</td>
                <td>
                    <a href="#" @click="editModal(coupon)">
                        <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(coupon.id)">
                        <i class="fa fa-trash red"></i>
                    </a>
                </td>
            </tr>
         </thead>
      </table>
      <pagination :data="coupons" @pagination-change-page="getResults"></pagination>
   </div>

    <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="exampleModalLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="exampleModalLabel">Update User's Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                    placeholder="Name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.code" type="text" name="code"
                                    placeholder="Code"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                                <has-error :form="form" field="code"></has-error>
                            </div>

                            <div class="form-group">
                                <select v-model="form.type" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option value="">Select Types of Payment</option>
                                    <option value="flat">Flat</option>
                                    <option value="percent">Percent</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.amount" type="text" name=" "
                                    placeholder="Amount"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
                                <has-error :form="form" field="amount"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                coupons : {},
                form: new Form({
                    id: '',
                    name : '',
                    code: '',
                    type: '',
                    amount: ''
                })
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('coupon?page=' + page)
                    .then(response => {
                        this.coupons = response.data;
                    });
            },
            editModal(coupon){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(coupon);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    //Send request to the server
                    if (result.value) {
                        this.form.delete('coupon/'+id).then(()=>{
                            swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            Fire.$emit('AfterCreate');
                        }).catch(()=>{
                            swal("Failed!", "Then was something wrong.", "warning");
                        })
                    }
                    
                })
            },
            loadUsers(){
                axios.get("coupon").then(({ data }) => (this.coupons = data));
            },
            createUser(){
                this.$Progress.start();

                this.form.post('add-coupon')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')

                    toast({
                        type: 'success',
                        title: 'User Created in successfully'
                        })

                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            updateUser(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form.put('coupon/'+this.form.id)
                .then(()=>{
                    //success
                    $('#addNew').modal('hide');
                    swal(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                })
                .catch(()=>{
                   this.$Progress.fail();
                });
            },
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterCreate',()=> {
                this.loadUsers();
            });
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>