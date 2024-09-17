<template>
  <admin-layout
    title="View Notification"
    :show-back="true"
    :back-url="route('admin.notification.index')"
  >
    <div class="mb-6">
      <div class="mt-4 px-8">
        <div class="grid grid-cols-3 gap-4">
          <div class="col-span-2">
            <div class="space-y-4">
              <div class="border border-lco-dark-200 rounded-lg p-4">
                <h4 class="font-bold mb-4">{{ notification.data.title }}</h4>
                <div class="py-2">
                  <p class="text-sm">
                    {{ notification.data.message }}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-1">
            <div class="space-y-4">
              <div class="border border-lco-dark-200 rounded-lg p-4">
                <h4 class="font-bold mb-4">Information</h4>
                <table class="w-full table-fixed">
                  <tbody>
                    <tr>
                      <td class="text-sm py-2">Date</td>
                      <td class="text-sm py-2">
                        {{ notification.created_at }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { PaperClipIcon } from "@heroicons/vue/24/outline";

export default {
  components: {
    AdminLayout,
    Link,
    PaperClipIcon,
  },
  props: ["notification"],
  setup(props) {
    const notification = ref(props.notification);

    return {
      notification,
    };
  },
};
</script>
