<template>
    <button type="button" class="btn btn-primary m-5" data-bs-toggle="modal" data-bs-target="#createFacultyModal">
        Create New
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createFacultyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="max-height:550px; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="submitData" class="my-3">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile Picture:</label>
                            <input type="file" @change="handleFileChange" class="form-control" accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name:</label>
                            <input type="text" v-model="fname" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name:</label>
                            <input type="text" v-model="lname" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label for="mname" class="form-label">Middle Name:</label>
                            <input type="text" v-model="mname" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" v-model="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password:</label>
                            <input type="password" v-model="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth:</label>
                            <input type="date" v-model="dob" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <select v-model="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <textarea v-model="address" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input type="tel" v-model="phone" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="yearLevel" class="form-label">Year Level:</label>
                            <select v-model="yearLevel" class="form-control">
                                <option value="1">First Year</option>
                                <option value="2">Second Year</option>
                                <option value="3">Third Year</option>
                                <option value="4">Fourth Year</option>
                            </select>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="card mx-4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px">
        <div class="card-body">
            <div v-if="responseData && responseData.length" class="table-responsive"
                style="max-height: 450px; overflow-y: auto">


                <table class="list table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Faculty ID</th>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in responseData" :key="data.StudentID">
                            <td>{{ data.StudentID }}</td>
                            <td>
                                <img :src="'/src/assets/uploads/' + data.Profile" style="height:35px; width:35px;">

                            </td>
                            <td>{{ data.FirstName }}</td>
                            <td>{{ data.LastName }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    v-bind:data-bs-target="`#exampleModal${data.StudentID}`" @click="setData(data)">
                                    update
                                </button>

                                <div class="modal fade" v-bind:id="`exampleModal${data.StudentID}`" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="max-height:550px; overflow-y:auto;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Update Item {{ data.StudentID }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form @submit.prevent="updateData(data.StudentID)" class="my-3">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="profile" class="form-label">Profile Picture:</label>
                                                        <input type="file" @change="handleFileChange" class="form-control"
                                                            accept="image/*" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fname" class="form-label">First Name:</label>
                                                        <input type="text" v-model="dataToUpdate.fname" class="form-control"
                                                            required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lname" class="form-label">Last Name:</label>
                                                        <input type="text" v-model="dataToUpdate.lname" class="form-control"
                                                            required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mname" class="form-label">Middle Name:</label>
                                                        <input type="text" v-model="dataToUpdate.mname"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" v-model="dataToUpdate.email"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">password:</label>
                                                        <input type="password" v-model="dataToUpdate.password"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dob" class="form-label">Date of Birth:</label>
                                                        <input type="date" v-model="dataToUpdate.dob"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender:</label>
                                                        <select v-model="dataToUpdate.gender" class="form-control">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <textarea v-model="dataToUpdate.address"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone Number:</label>
                                                        <input type="tel" v-model="dataToUpdate.phone"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="yearLevel" class="form-label">Year Level:</label>
                                                        <select v-model="dataToUpdate.yearLevel" class="form-control">
                                                            <option value="1">First Year</option>
                                                            <option value="2">Second Year</option>
                                                            <option value="3">Third Year</option>
                                                            <option value="4">Fourth Year</option>
                                                        </select>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Save changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    v-bind:data-bs-target="`#delStudentModal${data.StudentID}`">
                                    Delete
                                </button>

                                <div class="modal fade" v-bind:id="`delStudentModal${data.StudentID}`" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Delete Item {{ data.StudentID }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form @submit.prevent="deleteData(data.StudentID)" class="my-3">
                                                <div class="modal-body">
                                                    Are you sure you want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';

const responseMessage = ref('');
const responseData = ref('');


const fname = ref('');
const lname = ref('');
const profile = ref(null);
const mname = ref('');
const email = ref('');
const password = ref('');
const dob = ref('');
const gender = ref('');
const address = ref('');
const phone = ref('');
const yearLevel = ref('');

const handleFileChange = (event) => {
    profile.value = event.target.files[0];
};

const submitData = async () => {
    const dataToSend = new FormData();
    dataToSend.append('profile', profile.value);
    dataToSend.append('fname', fname.value);
    dataToSend.append('lname', lname.value);
    dataToSend.append('mname', mname.value);
    dataToSend.append('email', email.value);
    dataToSend.append('password', password.value);
    dataToSend.append('dob', dob.value);
    dataToSend.append('gender', gender.value);
    dataToSend.append('address', address.value);
    dataToSend.append('phone', phone.value);
    dataToSend.append('yearLevel', yearLevel.value);

    try {
        const response = await fetch('http://localhost/management/backend/Router/studentRoute.php?action=create', {
            method: 'POST',
            body: dataToSend,
        });

        const data = await response.json();
        responseMessage.value = data;
        fetchdata();

        fname.value = '';
        lname.value = '';
        profile.value = null;
        mname.value = '';
        email.value = '';
        password.value = '';
        dob.value = '';
        gender.value = '';
        address.value = '';
        phone.value = '';
        yearLevel.value = '';
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
    $('#createFacultyModal').modal('hide');
};


// update
const dataToUpdate = ref({
    id: null,
    fname: '',
    lname: '',
    mname: '',
    email: '',
    password: '',
    dob: '',
    gender: '',
    address: '',
    phone: '',
    yearLevel: '',
});
const setData = (data) => {
    console.log("naa man: "+data.fname);
    dataToUpdate.value.fname = data.FirstName;
    dataToUpdate.value.lname = data.LastName;
    dataToUpdate.value.mname = data.MiddleName;
    dataToUpdate.value.email = data.Email;
    dataToUpdate.value.password = data.Password;
    dataToUpdate.value.dob = data.DateOfBirth;
    dataToUpdate.value.gender = data.Gender;
    dataToUpdate.value.address = data.Address;
    dataToUpdate.value.phone = data.PhoneNumber;
    dataToUpdate.value.yearLevel = data.YearLevelID;
};

const updateData = async (id) => {

    const dataUpdate = new FormData();
    dataUpdate.append('id', id);
    dataUpdate.append('profile', profile.value);
    dataUpdate.append('fname', dataToUpdate.value.fname);
    dataUpdate.append('lname', dataToUpdate.value.lname);
    dataUpdate.append('mname', dataToUpdate.value.mname);
    dataUpdate.append('email', dataToUpdate.value.email);
    dataUpdate.append('password', dataToUpdate.value.password);
    dataUpdate.append('dob', dataToUpdate.value.dob);
    dataUpdate.append('gender', dataToUpdate.value.gender);
    dataUpdate.append('address', dataToUpdate.value.address);
    dataUpdate.append('phone', dataToUpdate.value.phone);
    dataUpdate.append('yearLevel', dataToUpdate.value.yearLevel);


    try {
        const response = await fetch('http://localhost/management/backend/Router/studentRoute.php?action=update', {
            method: 'POST',
            body: dataUpdate,
        });
        const data = await response.json();
        responseMessage.value = data;
        fetchdata();
        $(`#exampleModal${id}`).modal('hide');
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const deleteData = async (id) => {
    try {
        const response = await fetch('http://localhost/management/backend/Router/studentRoute.php?action=delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(id),
        });
        const data = await response.json();
        responseMessage.value = data;
        fetchdata();
        $(`#delStudentModal${id}`).modal('hide');
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const fetchdata = async () => {
    try {
        const response = await fetch('http://localhost/management/backend/Router/studentRoute.php?action=getAll');
        const data = await response.json();
        responseData.value = data;
        console.log(responseData.value);
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const datatable = async () => {
    $(".list").DataTable();
};

onMounted(async () => {
    await fetchdata().then(() => {
        return datatable();
    });
});

</script>

