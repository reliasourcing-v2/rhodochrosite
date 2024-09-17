<template>
  <admin-layout title="Dashboard">
    <div class="flex gap-6 px-6 py-10">
      <div class="w-9/12">
          <div class="w-full h-[260px] p-6 border border-gray-300 rounded-lg mb-2">
              <div class="flex items-center justify-between mb-6">
                  <p class="text-sm text-gray-900">Sales over time</p>
                  <Bars3CenterLeftIcon class="w-5 h-5 text-gray-500"/>
              </div>
              <div class="w-full h-[128px] mb-6"></div>
              <div class="flex justify-end gap-4">
                  <div class="flex gap-2 items-center">
                      <div class="w-4 h-4 rounded bg-gray-500"></div>
                      <p class="text-gray-900 text-xs">Aug 25, 2022</p>
                  </div>
                  <div class="flex gap-2 items-center">
                      <div class="w-4 h-4 rounded bg-primary-500"></div>
                      <p class="text-gray-900 text-xs">Aug 26, 2022</p>
                  </div>
              </div>
          </div>
          <div class="w-full h-[260px] p-6 border border-gray-300 rounded-lg mb-6">
              <div class="flex items-center justify-between mb-6">
                  <p class="text-sm text-gray-900">Customers over time</p>
                  <Bars3CenterLeftIcon class="w-5 h-5 text-gray-500"/>
              </div>
              <div class="w-full h-[128px] mb-6"></div>
              <div class="flex justify-end gap-4">
                  <div class="flex gap-2 items-center">
                      <div class="w-4 h-4 rounded bg-gray-500"></div>
                      <p class="text-gray-900 text-xs">Aug 25, 2022</p>
                  </div>
                  <div class="flex gap-2 items-center">
                      <div class="w-4 h-4 rounded bg-primary-500"></div>
                      <p class="text-gray-900 text-xs">Aug 26, 2022</p>
                  </div>
              </div>
          </div>
          <div class="w-full border border-gray-300 rounded-lg">
              <div class="p-6 flex items-center justify-between">
                  <p class="text-sm text-gray-900">Top Products</p>
                  <Bars3CenterLeftIcon class="w-5 h-5 text-gray-500"/>
              </div>
              <div>
                  <DataTable
                      :headers="headers"
                      :no-action="true"
                      :is-admin="true"
                  >
                      <template v-slot:body>
                          <template v-for="i in products" :key="i">
                              <tr class="text-left">
                                  <td class="py-[22px] pl-6 text-sm border-b pr-4">
                                      <div class="flex gap-3">
                                          <img class="w-10 h-10 rounded-full" :src="i.productImage" alt="">
                                          <div class="flex flex-col">
                                              <p class="text-sm text-gray-900">{{i.productName}}</p>
                                              <p class="text-sm text-gray-500">{{i.productCode}}</p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="py-[22px] text-sm border-b">
                                      <div class="flex flex-col">
                                          <p class="text-sm text-gray-900">{{i.category}}</p>
                                          <p class="text-sm text-gray-500">{{i.subCategory}}</p>
                                      </div>
                                  </td>
                                  <td class="py-[22px] text-sm border-b text-gray-900">{{i.itemsSold}}</td>
                              </tr>
                          </template>
                      </template>
                  </DataTable>
              </div>
          </div>
      </div>
      <div class="w-3/12 h-screen">
          <div class="w-full py-4 px-6 border border-gray-300 rounded-lg flex items-center gap-6 mb-2">
              <div>
                  <img class="w-8 h-8" src="/icons/ic-nav-items.svg" alt="">
              </div>
              <div class="flex flex-col">
                  <p class="text-sm text-gray-500">Sales</p>
                  <h1 class="font-black text-3xl">P260M</h1>
              </div>
          </div>
          <div class="w-full py-4 px-6 border border-gray-300 rounded-lg flex items-center gap-6 mb-2">
              <div>
                  <img class="w-8 h-8" src="/icons/ic-nav-items.svg" alt="">
              </div>
              <div class="flex flex-col">
                  <p class="text-sm text-gray-500">Order</p>
                  <h1 class="font-black text-3xl">322K</h1>
              </div>
          </div>
          <div class="w-full py-4 px-6 border border-gray-300 rounded-lg flex items-center gap-6 mb-6">
              <div>
                  <img class="w-8 h-8" src="/icons/ic-nav-items.svg" alt="">
              </div>
              <div class="flex flex-col">
                  <p class="text-sm text-gray-500">Item Sold</p>
                  <h1 class="font-black text-3xl">544K</h1>
              </div>
          </div>
          <div class="w-full p-6 border border-gray-300 rounded-lg gap-6 mb-6">
              <p class="text-sm text-center mb-6">Gender Analytics</p>
              <div class="w-[120px] h-[120px] m-auto mb-6"></div>
              <div class="flex flex-col gap-2">
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-primary-500"></div>
                          <p class="text-gray-900 text-xs">Male</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">3000</p>
                          <p class="text-xs">50%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#CA71EF]"></div>
                          <p class="text-gray-900 text-xs">Female</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,500</p>
                          <p class="text-xs">25%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#ECCDF9]"></div>
                          <p class="text-gray-900 text-xs">Others</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,500</p>
                          <p class="text-xs">25%</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="w-full p-6 border border-gray-300 rounded-lg gap-6">
              <p class="text-sm text-center mb-6">Age Analytics</p>
              <div class="w-[120px] h-[120px] m-auto mb-6"></div>
              <div class="flex flex-col gap-2">
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-primary-500"></div>
                          <p class="text-gray-900 text-xs">0-17</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,200</p>
                          <p class="text-xs">20%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#B943E9]"></div>
                          <p class="text-gray-900 text-xs">18-24</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,200</p>
                          <p class="text-xs">20%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#CA71EF]"></div>
                          <p class="text-gray-900 text-xs">25-39</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,200</p>
                          <p class="text-xs">20%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#DB9FF4]"></div>
                          <p class="text-gray-900 text-xs">40-59</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,200</p>
                          <p class="text-xs">20%</p>
                      </div>
                  </div>
                  <div class="flex justify-between">
                      <div class="flex gap-2 items-center">
                          <div class="w-4 h-4 rounded bg-[#ECCDF9]"></div>
                          <p class="text-gray-900 text-xs">60+</p>
                      </div>
                      <div class="flex gap-4">
                          <p class="text-xs">1,200</p>
                          <p class="text-xs">20%</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </admin-layout>
</template>

<script lang="ts" setup>

import { router } from "@inertiajs/vue3";
import Breadcrumbs from "@/Components/Partials/Breadcrumbs.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import {
  Bars3CenterLeftIcon,
  XMarkIcon,
} from "@heroicons/vue/24/outline";
import {
  ChevronRightIcon,
  EllipsisVerticalIcon,
  Square2StackIcon,
  PencilSquareIcon,
  MagnifyingGlassIcon,
  ChevronUpDownIcon,
  TrashIcon,
  UserPlusIcon,
} from "@heroicons/vue/24/solid";

    const headers = [
        { text: 'Product', value: 'product' },
        { text: 'Category', value: 'category' },
        { text: 'Items Sold', value: 'itemsSold' },
    ]

    const products = [
        {
            productImage: "https://picsum.photos/100/27",
            productName: "OTG jinramyun spicy big cup 110g",
            productCode: "151251551",
            category: "Noodle/Grain",
            subCategory: "Instant Ramen Cup",
            itemsSold: "64 items Sold",
        },
        {
            productImage: "https://picsum.photos/100/27",
            productName: "OTG jinramyun spicy big cup 110g",
            productCode: "151251551",
            category: "Noodle/Grain",
            subCategory: "Instant Ramen Cup",
            itemsSold: "32 items Sold",
        },
        {
            productImage: "https://picsum.photos/100/27",
            productName: "OTG jinramyun spicy big cup 110g",
            productCode: "151251551",
            category: "Noodle/Grain",
            subCategory: "Instant Ramen Cup",
            itemsSold: "16 items Sold",
        },
        {
            productImage: "https://picsum.photos/100/27",
            productName: "OTG jinramyun spicy big cup 110g",
            productCode: "151251551",
            category: "Noodle/Grain",
            subCategory: "Instant Ramen Cup",
            itemsSold: "8 items Sold",
        },
        {
            productImage: "https://picsum.photos/100/27",
            productName: "OTG jinramyun spicy big cup 110g",
            productCode: "151251551",
            category: "Noodle/Grain",
            subCategory: "Instant Ramen Cup",
            itemsSold: "4 items Sold",
        },
    ]

const logout = () => {
    router.post(route("logout"));
}
</script>
