<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { redirectToUrl } from './store/redirectOnRefresh';
import { clear } from './store/remove'
const ReservationColor = ref('white')
const isTrue = ref(false)

const AccountList = () => {
  isTrue.value = !isTrue.value
  ReservationColor.value = isTrue.value ? 'white' : 'white'
}
const accountBackgroundColor = computed(() => isTrue.value ? 'blue' : '')
const Color = computed(() => isTrue.value ? 'white' : 'white')

const menuIsTrue = ref(true)
const menuIsFalse = ref(false)
const Paddingblock = ref('3px')
const Paddingleft = ref('5px')
const BorderRadius = ref('5px')
const Left = ref('17px')
const Display = ref('none')
const darkBlue = ref('#14243c')

const menuBtn = () => {
  toggleMenu()
}

const menuBack = () => {
  toggleMenu()
}

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
const role=ref('');
const logout = () => {
  clear();
};

redirectToUrl();

onMounted(async () => {
role.value=localStorage.getItem('role');
console.log(role.value);
});
</script>
<template>
  <div class="d-flex">
    <header class="d-flex">

    <!-- Text Sidebar-->
    <nav class="menu" v-if="menuIsTrue" style="width: 20vw;">
      <div>
        <h5 class="text-white py-2 px-3 title" style="display: flex; justify-content: space-between;">ADMINISTRATOR
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            class="bi bi-arrow-left-square-fill closebar-icon" @click="menuBtn" viewBox="0 0 16 16">
            <path
              d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
          </svg>
        </h5>
      </div>
      <div class="nav-link">
        <RouterLink to="/">Dashboard</RouterLink>
      </div>
      <div class="nav-link" @click="AccountList" :style="{ backgroundColor: accountBackgroundColor }">
        <div class="text-white" style="cursor: pointer;"><span :style="{ color: Color }"> Account Management</span>
        </div>
      </div>
      <div v-if="isTrue">

        <RouterLink to="/Student" style="text-decoration: none;" v-if="role==='students'">
          <div class="nav-link" @click="Gray(0)" :style="{ backgroundColor: ChangeToGray1 }">
            <span class="text-dark">Student</span>
          </div>
        </RouterLink>

        <RouterLink to="/Faculty" style="text-decoration: none;" v-if="role==='faculty'">
          <div class="nav-link" @click="Gray(1)" :style="{ backgroundColor: ChangeToGray2 }">
            <span class="text-dark">Faculty</span>
          </div>
        </RouterLink>

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

.logout-modal {
  display: none;
  position: fixed;
  height: 40px;
  width: 200px;
  left: 160px;
  bottom: 30px;
  transform: translateX(-50%);
  padding-top: 7px;
  background-color: white;
  color: black;
  border-radius: 5px;
  text-align: center;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  z-index: 2;
}

.back-modal {
  display: none;
  position: fixed;
  height: 40px;
  width: 100px;
  left: 100px;
  transform: translateX(-50%);
  padding-top: 7px;
  background-color: white;
  color: black;
  border-radius: 5px;
  text-align: center;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  z-index: 2;
}

.Account-icon:hover+.Account-modal,
.Home-icon:hover+.Account-modal,
.reserve-icon:hover+.Account-modal,
.tourist-icon:hover+.Account-modal,
.tourguide-icon:hover+.Account-modal,
.boat-icon:hover+.Account-modal,
.announcement-icon:hover+.Account-modal,
.maintenance-icon:hover+.Account-modal,
.notification-icon:hover+.Account-modal,
.Touristdestination-icon:hover+.Account-modal,
.Package-icon:hover+.Account-modal,
.logout-icon:hover+.Account-modal {
  display: block;
}

.back-icon:hover+.back-modal {
  display: block;
}

.logout-icon:hover+.logout-modal {
  display: block;
}

.logout-icon {
  background-color: #14243c;
  color: white;
  padding: 3px;
  border-radius: 5px;
}

.logout-icon:hover {
  color: gray;
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
  background-color: #14243c;
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

.nav-link a {
  text-decoration: none;
  list-style: none;
  color: white;
}

span:hover {
  color: lightgrey;
}</style>
