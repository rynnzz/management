<template>
 <div class="dark-background">
   <div class="container mt-4">
    <div class="card bg-secondary text-light p-md-2">
        <div class="card-body">
            <div class="container" id="container">
                <div class="form-container sign-in">
                    <form @submit.prevent="login">
                        <h1 class="mb-4 text-center">LOGIN</h1>

                        <div class="mb-3">
                            <label for="username" class="form-label">Email:</label>
                            <div class="input-group">
                    <span class="input-group-text">
                      <font-awesome-icon :icon="faEnvelope" />
                    </span>
                    <input type="text" v-model="username" class="form-control" placeholder="Email" required />
                  </div>                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                    <span class="input-group-text">
                      <font-awesome-icon :icon="faLock" />
                    </span>
                    <input type="password" v-model="password" class="form-control" placeholder="Password" required />
                  </div>                        
                  <div>
                        <div class="align-center d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mt-3 px-5">Log In</button>
                        </div>
                        </div>
                        </div>
                        <div class="cursor text-center">
                        <a data-bs-toggle="modal" data-bs-target="#changepass"><u>Forgot Your Password?</u></a>
                    </div>
                    </form>
                </div>
              </div>
           </div>
    </div>

    <div class="modal fade mt-5" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal-bg text-white" style="max-height:550px; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                </div>
                <form @submit.prevent="submitData" class="my-3">
                <div class="modal-body">

                <div class="mb-3">
                <label for="Changeemail" class="form-label">Email:</label>
                <div class="input-group">
              <span class="input-group-text">
            <font-awesome-icon :icon="faEnvelope" />
           </span>
          <input type="email" v-model="Changeemail" class="form-control" placeholder="Email" />
          </div>                      
          </div>
                        <div class="mb-3">
                            <label for="Changepassword" class="form-label">Enter new password:</label>
                            <div class="input-group" >
                    <span class="input-group-text">
                   <font-awesome-icon :icon="faLock" />
                   </span>
                   <input type="password" v-model="Changepassword" class="form-control" placeholder="Enter new password" />
                   </div>                        
                   </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</template>
<script setup>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faEnvelope, faLock } from '@fortawesome/free-solid-svg-icons';

import { ref, onMounted } from 'vue';
import { RouterLink } from 'vue-router'

const responseMessage = ref('');
const username = ref('');
const password = ref('');

const login = async () => {
    try {
        const datas = {
            Email: username.value,
            Password: password.value
        };

        const response = await fetch('http://localhost/management/backend/Router/authfacultyRoute.php?action=auth', {
            method: 'POST',
            body: JSON.stringify(datas),
        });

        const data = await response.json();
        console.log(data);

        if (data.authenticated) {
            localStorage.setItem('isUser', data.isUser);
            localStorage.setItem('Id', data.id);
            if (data.role != null) {
                localStorage.setItem('role', data.role);
            }

            location.reload();

            username.value = '';
            password.value = '';
        } else {
            responseMessage.value = 'Login failed: ' + data.message;
        }
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};

const Changeemail=ref('');
const Changepassword=ref('');
const submitData = async () => {
    try {
        const datas = {
            Email: Changeemail.value,
            Password: Changepassword.value
        };
   console.log(datas);
        const response = await fetch('http://localhost/management/backend/Router/authfacultyRoute.php?action=changepass', {
            method: 'POST',
            body: JSON.stringify(datas),
        });
        const data = await response.json();
        console.log(data);

            Changeemail.value = '';
            Changepassword.value = '';
       
    } catch (error) {
        responseMessage.value = 'Error: ' + error.message;
    }
};
onMounted(async () => {
    console.log('Component mounted');
});
</script>
<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
.dark-background {
   background-color: #1e1e1e; /* Dark background color, you can adjust the color code */
   min-height: 100vh;
   display: flex;
   justify-content: center;
   align-items: center;
}
.cursor{
    cursor: pointer;
}

.card {
  max-width: 400px; /* Adjusted max-width */
  margin: auto; /* Center the card */
}

.custom-modal-bg {
  background-color: #6c757d; 
}

</style>