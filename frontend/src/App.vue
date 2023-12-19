<script setup>
import { ref, computed, onMounted } from 'vue'
import { redirectToUrl } from './store/redirectOnRefresh';
import { RouterLink } from 'vue-router'
import { clear } from './store/remove'

const ReservationColor = ref('black')
const isTrue = ref(false)

const AccountList = () => {
  isTrue.value = !isTrue.value
  ReservationColor.value = isTrue.value ? 'black' : 'black'
}
const accountBackgroundColor = computed(() => isTrue.value ? '' : '')
const Color = computed(() => isTrue.value ? 'black' : 'black')

const menuIsTrue = ref(true)
const menuIsFalse = ref(false)
const Paddingblock = ref('3px')
const Paddingleft = ref('5px')
const BorderRadius = ref('5px')
const Left = ref('17px')
const Display = ref('none')



const toggleMenu = () => {
  menuIsFalse.value = !menuIsFalse.value
  menuIsTrue.value = !menuIsTrue.value
  Paddingblock.value = menuIsTrue.value ? '3px' : '0'
  Paddingleft.value = menuIsTrue.value ? '5px' : '0'
  BorderRadius.value = menuIsTrue.value ? '5px' : '0'
  Left.value = menuIsTrue.value ? '17px' : '13px'
  Display.value = menuIsTrue.value ? 'none' : 'block'
}

const ChangeToGray1 = ref('#f8f9fa')
const ChangeToGray2 = ref('#f8f9fa')
const ChangeToGray3 = ref('#f8f9fa')

const Gray = (index) => {
  const elements = [ChangeToGray1, ChangeToGray2, ChangeToGray3]

  for (let i = 0; i < elements.length; i++) {
    elements[i].value = i === index ? (elements[i].value === 'lightgray' ? '#f8f9fa' : 'lightgray') : '#f8f9fa'
  }
}
const logout = () => {
  clear();
};

redirectToUrl();

onMounted(async () => {
});
</script>
<template>
  <div class="d-flex">
    <header class="d-flex">
      <!-- Icon Sidwebar -->
      <nav class="menu" v-if="menuIsTrue" style="width: 20vw;">
        <div>
          <h5 class="py-2 px-3 title " style=" color:black;display: flex; justify-content: space-between;">ADMINISTRATOR
           
          </h5>
        </div>
        <div class="nav-link text-dark">
          <RouterLink to="/">Dashboard</RouterLink>
        </div>
        <div class="nav-link  text-dark" @click="AccountList" :style="{ backgroundColor: accountBackgroundColor }">
          <div class="text-white" style="cursor: pointer;"><span :style="{ color: Color }"> Account Management</span>
          </div>
        </div>
        <div v-if="isTrue">

          <RouterLink to="/Student" style="text-decoration: none;">
            <div class="nav-link  text-dark" @click="Gray(0)" :style="{ backgroundColor: ChangeToGray1 }">
              <span class="text-dark">Student</span>
            </div>
          </RouterLink>

          <RouterLink to="/Faculty" style="text-decoration: none;">
            <div class="nav-link" @click="Gray(1)" :style="{ backgroundColor: ChangeToGray2 }">
              <span class="text-dark">Faculty</span>
            </div>
          </RouterLink>

        </div>
        <div class="nav-link text-dark" @click="logout" >
        Logout
        </div>

      </nav>
    </header>

    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<style scoped>
.Account-modal {
  display: none;
  position: fixed;
  height: 40px;
  width: 200px;
  left: 150px;
  transform: translateX(-50%);
  padding-top: 7px;
  background-color: white;
  color: black;
  border-radius: 5px;
  text-align: center;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  z-index: 2;
}







.menu-icon {
  width: 60px;
}

.menu-icon-container {
  background-color: white;
  height: 100%;
}

.logo-icon {
  width: 30px;
  height: 30px;
  position: fixed;
  /* left: 17px;  */
  top: 6px;
}

@media (max-width: 960px) {

  .menu {
    display: none;
  }

  .menu-icon {
    width: 60px;
    padding-inline: 5px;
    background-color: white;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

  }
}

@media (max-width: 568px) {

  .menu-icon {
    display: none;

  }

}

header {
  height: 100vh;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}

main {
  flex-grow: 1;
  overflow: auto;
}

.title {
  box-shadow: rgba(1, 41, 71, 0.3) 0px 1px 2px 0px, rgba(8, 51, 85, 0.15) 0px 1px 3px 1px;
}

.closebar-icon:hover {
  color: lightgray;
}

span:hover {
  color: lightgrey;
}
</style>
