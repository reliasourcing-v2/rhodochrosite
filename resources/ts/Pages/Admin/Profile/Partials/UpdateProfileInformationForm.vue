<template>
    <jet-form-section 
    class="w-full"
    @submitted="updateProfileInformation">
        <template #title> Profile Information </template>

        <template #description> Update your account's profile information and email address. </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-12" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview" />

                <JetLabel for="photo" value="Photo" />

                <div class="flex items-center space-x-3">
                    <div>
                        <!-- Current Profile Photo -->
                        <div class="mt-2" v-show="!photoPreview">
                            <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover" />
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" v-show="photoPreview">
                            <span
                                class="block rounded-full w-20 h-20"
                                :style="
                                    'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                    photoPreview +
                                    '\');'
                                "
                            >
                            </span>
                        </div>
                    </div>
                    <action-button 
                    class="mt-2 mr-2" 
                    fill="secondary" 
                    type="button" 
                    @click.prevent="selectNewPhoto"> 
                        Select A New Photo
                    </action-button>

                    <action-button 
                    class="mt-2" 
                    fill="secondary" 
                    type="button" 
                    @click.prevent="deletePhoto" 
                    v-if="user.profile_photo_path" >
                        Remove Photo
                    </action-button>

                    <JetInputError :message="form.errors.photo" class="mt-2" />
                </div>
            </div>

            <!-- First Name -->
            <div class="col-span-6">
                <text-input
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    autocomplete="first_name"
                    label="First Name"
                />
                <JetInputError :message="form.errors.first_name" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="col-span-6">
                <text-input
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    autocomplete="last_name"
                    label="Last Name"
                />
                <JetInputError :message="form.errors.last_name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6">
                <text-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    label="Email"
                />
                <JetInputError :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Mobile Number -->
            <!-- <div class="col-span-6">
                <text-input
                    placeholder="Mobile Number"
                    id="mobile_number"
                    :add_on_left="true"
                    add_on_text="+63"
                    type="tel" 
                    v-model="form.mobileNumber"
                    :maxlength="10"
                    @keypress="numberonly"
                    label="Mobile Number"
                />
                <JetInputError :message="form.errors.mobileNumber" class="mt-2" />
            </div> -->
        </template>

        <template #actions>            
            <action-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                >
                Save Changes
            </action-button>

            <action-button 
                fill="outline"
                @click="$emit('cancel')"
            >
                Cancel
            </action-button>

            <JetActionMessage :on="form.recentlySuccessful">
                Saved!
            </JetActionMessage>
        </template>
    </jet-form-section>
</template>

<script>
import JetInputError from "@/Components/Inputs/InputError.vue";
import JetActionMessage from "@/Components/Modals/JetActionMessage.vue";
import { numberonly } from '@/composables/useNumberOnly.ts';

export default {
    components: {
        JetActionMessage,
        JetInputError,
    },

    props: {
        user: { type: Object },
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: "PUT",
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                email: this.user.email,
                photo: null,
            }),

            photoPreview: null,
        };
    },

    methods: {
        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0];
            }

            this.form.post(
                route(
                    this.$page.props.user_type === "Admin"
                        ? "admin.user-profile-information.update"
                        : "user-profile-information.update"
                ),
                {
                    errorBag: "updateProfileInformation",
                    preserveScroll: true,
                    onSuccess: () => this.clearPhotoFileInput(),
                }
            );
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const photo = this.$refs.photo.files[0];

            if (!photo) return;

            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(photo);
        },

        deletePhoto() {
            this.$inertia.delete(
                route(
                    this.$page.props.user_type === "Admin"
                        ? "admin.current-user-photo.destroy"
                        : "current-user-photo.destroy"
                ),
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                }
            );
        },

        clearPhotoFileInput() {
            if (this.$refs.photo?.value) {
                this.$refs.photo.value = null;
            }
        },
    },
};
</script>
