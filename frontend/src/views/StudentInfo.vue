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
            <div v-for="data in responseData" :key="data.StudentID">
                <div class="modal-content" v-if="data.StudentID == id">

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
                                    <label for="mname" class="form-label"><b>Middle Name:</b> {{ data.MiddleName }}</label>
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
                                    <label for="gender" class="form-label"><b>Gender:</b> {{ data.Gender }}</label>

                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label"><b>Address:</b> {{ data.Address }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><b>Phone Number:</b> {{ data.PhoneNumber
                                    }}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="yearLevel" class="form-label"><b>Year Level:</b> {{ data.YearLevelID }}rd
                                        Year</label>

                                </div>
                            </section>
                        </div>
                    </form>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    v-bind:data-bs-target="`#exampleModal${data.StudentID}`" @click="setData(data)">
                                    Edit Your Profile
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
                                </div>
                                </div>
                                </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { clear } from '../store/remove'


const responseMessage = ref('');
const responseData = ref('');

const id = ref('');


const fetchdata = async () => {
    try {
        const response = await fetch('http://localhost/management/backend/Router/studentRoute.php?action=getAll');
        const data = await response.json();
        responseData.value = data;
        console.log(responseData.value);
        id.value = localStorage.getItem('Id');

    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const logout = () => {
    clear();
};
const profile=ref(null);
const handleFileChange = (event) => {
    profile.value = event.target.files[0];
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
    console.log("naa man: " + data.fname);
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



onMounted(async () => {
    await fetchdata();
});

</script>

