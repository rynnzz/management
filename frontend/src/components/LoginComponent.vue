<template>
   
    <div class="container" id="container">
        
        <div class="form-container sign-in">
            <form  @submit.prevent="login">
                <h1>Sign In</h1>
                
                <input type="text"  v-model="username" placeholder="Email" required>
                <input type="password" v-model="password" placeholder="Password" required>
                <a data-bs-toggle="modal" data-bs-target="#changepass">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
       
    </div>
    <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="max-height:550px; overflow-y: auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                </div>
                <form @submit.prevent="submitData" class="my-3">
                    <div class="modal-body">
                      
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" v-model="Changeemail" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Enter new password:</label>
                            <input type="password" v-model="Changepassword" class="form-control" />
                        </div>
                       


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: white; padding: 10px 5px; border-radius: 5px; margin-inline: 2px;">
                                Close
                            </button>
                            <button type="submit" class="text-white" style="background-color:  #512da8; border: none; border-radius: 5px; padding: 10px 5px;">
                                Save changes
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

</template>
<script setup>
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

</style>