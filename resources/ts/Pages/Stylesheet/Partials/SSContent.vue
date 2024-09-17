<template>

  <div class="flex flex-row min-h-screen w-full">
    <div class="flex flex-col w-full md:w-64 text-gray-700 bg-white flex-shrink-0 border-r">
      <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
        <a href=""
          class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">
          <img src="/images/logo.png" />
        </a>
      </div>
      <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
        <a v-for="ssNav in ssNavs" :key="ssNav.id" :class="{ 'bg-gray-200': activetab === ssNav.id }"
          @click="activetab = ssNav.id"
          class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
          href="#">
          {{ ssNav.name }}
        </a>
      </nav>
    </div>

    <div class="container">
      <div class="flex flex-col px-8 py-4 border-b">
        &nbsp;
      </div>
      <div class="flex flex-col px-8 mt-8">
        <div v-if="activetab ==='1'">
          <h3 class="font-bold mb-8">Colors</h3>
          <SSColors></SSColors>
        </div>
        <div v-if="activetab ==='2'">
          <h3 class="font-bold mb-8">Typography</h3>
          <SSTypography></SSTypography>
        </div>
        <div v-if="activetab ==='3'">
          <h3 class="font-bold mb-8">Forms</h3>
          <SSForms></SSForms>
        </div>
        <div v-if="activetab ==='4'">
          <h3 class="font-bold mb-8">Buttons</h3>
          <SSButtons></SSButtons>
        </div>
        <div v-if="activetab ==='5'">
          <h3 class="font-bold mb-8">Cards</h3>
          <SSCards></SSCards>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import SSColors from '../Pages/ssColors.vue';
import SSTypography from '../Pages/ssTypography.vue';
import SSForms from '../Pages/ssForms.vue';
import SSButtons from '../Pages/ssButtons.vue';
import SSCards from '../Pages/ssCards.vue';

  export default {
    components: {
        SSColors,
        SSTypography,
        SSForms,
        SSButtons,
        SSCards
    },

    data: () => ({
        activetab: '1',
        ssNavs: [
            { id: '1', name: 'Colors'},
            { id: '2', name: 'Typography'},
            { id: '3', name: 'Forms'},
            { id: '4', name: 'Buttons'},
            { id: '5', name: 'Cards'},
        ]
    })
  }
</script>