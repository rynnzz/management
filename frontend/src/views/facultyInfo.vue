<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="../assets/cpc.png" style="height: 50px; width:50px;" class="mx-2">
        <a class="navbar-brand" href="#">Cordova Public College</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                </li>
            </ul>
        </div>
        <div>
            <a class="btn btn-outline-primary mx-3" @click="logout"><span>Log out</span></a>
        </div>
    </nav>
    <div>
        <div style="margin-inline: 10%; margin-top: 2%;">
            <div v-for="data in responseData" :key="data.FacultyID">
                <div class="modal-content" v-if="data.FacultyID == id">

                    <form class="my-3 ">
                        <div class="modal-body  d-flex justify-content-center ">
                            <section class="col-5 mx-2">
                                <div class="mb-3">
                                    <input type="image"
                                        :src="'/@fs/xammp/htdocs/management/frontend/src/assets/uploads/' + data.Profile"
                                        alt="" style=" height: 150px; width: 150px;">
                                </div>
                                <div class="mb-3">
                                    <label for="fname" class="form-label"><b>First Name:</b> {{ data.FirstName }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label"><b>Last Name:</b> {{ data.LastName }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="mname" class="form-label"><b>Department:</b> {{ data.DepartmentID === 0 ? 'BEED' : data.DepartmentID === 1 ? 'BSIT' : data.DepartmentID === 2 ? 'BSHM' : 'Unknown Department' }}
</label>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email:</b> {{ data.Email }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label"><b>Date of Birth:</b> {{ data.DateOfBirth }}</label>
                                </div>
                            </section>
                            <section class="col-5 mx-2" style="margin-top: 185px;">

                                <div class="mb-3">
                                    <label for="gender" class="form-label"><b>Position:</b> {{ data.Position }}</label>

                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label"><b>Address:</b> {{ data.Address }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><b>Phone Number:</b> {{ data.PhoneNumber
                                    }}</label>
                                </div>
                                
                            </section>
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                :data-bs-target="`#editFacultyModal${data.FacultyID}`" @click="setData(data)">
                                    Edit Your Profile
                                </button>


                            <div class="modal fade" :id="`editFacultyModal${data.FacultyID}`" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="max-height:550px; overflow-y: auto;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Faculty {{
                                                data.FacultyID }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form @submit.prevent="editData(data.FacultyID)" class="my-3">
                                            <div class="modal-body " style="text-align: left;">
                                                <div class="mb-3 ">
                                                    <label for="profile" class="form-label ">Profile Picture:</label>
                                                    <input type="file" @change="handleFileChange" class="form-control"
                                                        accept="image/*" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fname" class="form-label">First Name:</label>
                                                    <input type="text" v-model="fnameEdit" class="form-control" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lname" class="form-label">Last Name:</label>
                                                    <input type="text" v-model="lnameEdit" class="form-control" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email:</label>
                                                    <input type="email" v-model="emailEdit" class="form-control" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">password:</label>
                                                    <input type="password" v-model="passwordEdit" class="form-control"
                                                        required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dob" class="form-label">Date of Birth:</label>
                                                    <input type="date" v-model="dobEdit" class="form-control" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="department" class="form-label">Department ID:</label>
                                                    <select v-model="departIdEdit" class="form-control" required>
                                                        <option value="" disabled>Select Department</option>
                                                        <option value="0">BEED</option>
                                                        <option value="1">BSIT</option>
                                                        <option value="2">BSHM</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="position" class="form-label">Position:</label>
                                                    <input type="text" v-model="posEdit" class="form-control" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address:</label>
                                                    <input type="text" v-model="addressEdit" class="form-control"
                                                        required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number:</label>
                                                    <input type="tel" v-model="cpNumberEdit" class="form-control"
                                                        required />
                                                </div>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { clear } from '../store/remove'
const responseMessage=ref('');
const responseData = ref('');

const id = ref('');


const fetchdata = async () => {
    try {
        const response = await fetch('http://localhost/management/backend/Router/facultyRoute.php?action=getAll');
        const data = await response.json();
        responseData.value = data;
        console.log(responseData.value);
        id.value=localStorage.getItem('Id');
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const logout = () => {
    clear();
};
const profile = ref(null);
const handleFileChange = (event) => {
    profile.value = event.target.files[0];
};

const fnameEdit = ref('');
const lnameEdit = ref('');
const emailEdit = ref('');
const passwordEdit = ref('');
const dobEdit = ref('');
const departIdEdit = ref('');
const posEdit = ref('');
const addressEdit = ref('');
const cpNumberEdit = ref('');

const setData = (data) => {
    console.log("edit: " + data);

    fnameEdit.value = data.FirstName;
    lnameEdit.value = data.LastName;
    emailEdit.value = data.Email;
    passwordEdit.value = data.Password;
    dobEdit.value = data.DateOfBirth;
    departIdEdit.value = data.DepartmentID;
    posEdit.value = data.Position;
    addressEdit.value = data.Address;
    cpNumberEdit.value = data.PhoneNumber;
};

const editData = async (id) => {
    console.log("id:" + id);
    const dataUpdate = new FormData();
    dataUpdate.append('id', id);
    dataUpdate.append('profile', profile.value);
    dataUpdate.append('fnameEdit', fnameEdit.value);
    dataUpdate.append('lnameEdit', lnameEdit.value);
    dataUpdate.append('emailEdit', emailEdit.value);
    dataUpdate.append('passwordEdit', passwordEdit.value);
    dataUpdate.append('dobEdit', dobEdit.value);
    dataUpdate.append('departIdEdit', departIdEdit.value);
    dataUpdate.append('posEdit', posEdit.value);
    dataUpdate.append('addressEdit', addressEdit.value);
    dataUpdate.append('cpNumberEdit', cpNumberEdit.value);

    try {
        const response = await fetch('http://localhost/management/backend/Router/facultyRoute.php?action=update', {
            method: 'POST',
            body: dataUpdate,
        });
        const data = await response.json();
        responseMessage.value = data;
        fetchdata();

        $(`#editFacultyModal${id}`).modal('hide');
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};


onMounted(async () => {
    await fetchdata();
});

</script>

