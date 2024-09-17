<template>
    <modal 
        :id="id" 
        :show="show" 
        :max-width="maxWidth" 
        :closeable="closeable" 
        @close="$emit('close')"
    >
        <div class="p-8 rounded-[2rem] bg-white relative">
            <XMarkIcon @click="$emit('close')" class="w-5 h-5 text-red-600 cursor-pointer absolute top-4 right-4" />
            <div class="mb-8">
                <p class="text-3xl font-bold mb-4">Hire top talent!</p>
                <p>For much less than you expect.</p>
            </div>
            <div class="space-y-8 filter-wrapper">
                <div>
                    <v-selector
                        :options="rolesObject"
                        label="Role"
                        placeholder="Select role here"
                        id="role"
                        name="role"
                        required
                        v-model="form.role"
                    />
                </div>
                <div>
                    <v-selector
                        :options="experienceObject"
                        label="Experience Level"
                        placeholder="Select experience level here"
                        id="experience"
                        name="experience"
                        required
                        v-model="form.experience"
                    />
                </div>
                <div>
                    <v-selector
                        :options="countryObject"
                        label="Your Location"
                        placeholder="Select your location here"
                        id="country"
                        name="country"
                        required
                        v-model="form.country"
                    />
                </div>
                <v-button 
                    :disabled="!form.role || !form.experience || !form.country"
                    @click="handleSubmit"
                    custom-class="px-6 !text-base w-full" 
                    size="md" 
                    design-color="text-white"
                >
                    Proceed
                </v-button>
            </div>
        </div>
    </modal>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";
import Modal from '@/Components/Modals/Modal.vue';
import { XMarkIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    items: {
        type: Object,
        default: () => ({})
    },
    id: {
        type: String,
    },
    title: {
        type: String,
        default: null
    },
    description: {
        type: String,
        default: null
    },
    show: {
        default: false
    },
    maxWidth: {
        default: 'lg'
    },
    closeable: {
        default: true
    },
})

const form = useForm({
    // Bind the form data to the form object
    role: '',
    experience: '',
    country: '',
});

const rolesObject = [...new Set(props.items.map(obj => obj.role))].map(role => ({ id: role, value: role }));
const experienceObject = [...new Set(props.items.map(obj => obj.experience))].map(experience => ({ id: experience, value: experience }));
const countryObject = [...new Set(props.items.map(obj => obj.country))].map(country => ({ id: country, value: country }));


const filterList = () => {
// Perform filtering here
    const filtered = props.items.filter(
        item => item.role.includes(form.role) &&
                item.country.includes(form.country) &&
                item.experience.includes(form.experience)
    );
    // Set the form data to the filtered data
    form.role = filtered[0].role;
    form.experience = filtered[0].experience;
    form.country = filtered[0].country;
};

const handleSubmit = () => {
  form.get(route('web.pages.calculator-view'), {});
};
</script>
