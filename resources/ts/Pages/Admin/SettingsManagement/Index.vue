<template>
  <admin-layout title="Settings" :breadcrumb-pages="breadcrumbs">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            "
          >
            <DataTable :headers="headers" :no-action="false">
              <template v-slot:body>
                <!-- <tr v-for="item in items" :key="item"> -->
                <template v-for="item in items" :key="item">
                  <tr>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                      {{ item.label }}
                    </td>
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-nowrap
                        text-sm text-gray-500 text-center
                      "
                    >
                      <edit-button
                        class="mr-3"
                        routeLink="#"
                      />
                    </td>
                  </tr>
                </template>
              </template>
            </DataTable>
          </div>
          <!-- <p
            v-if="items.length === 0"
            class="text-sm text-gray-600 text-center py-8"
          >
            No data to display.
          </p> -->
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { computed } from "vue";
import { PencilSquareIcon } from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/vue3";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
export default {
  components: {
    AdminLayout,
    PencilSquareIcon,
    Link,
    EditButton
  },
  props: ["items"],
  setup(props) {
    /*--------------------*
     * Table Data/Init Vars
     *--------------------*/
    const items = computed(() => props.items);

    /*---------------*
     * Breadcrumbs
     *---------------*/
    const breadcrumbs = [{ name: "Settings", href: "#", current: true }];

    const headers = [
      { text: "Label", value: "Label" },
    ];

    return {
      breadcrumbs,
      // Table
      items,
      headers
    };
  },
};
</script>
