import "./bootstrap";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import {createApp, h, defineAsyncComponent} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

const UserLayout = defineAsyncComponent(() => import('@/Layouts/UserLayout.vue'));

const VButton = defineAsyncComponent(() => import('@/Pages/User/Components/Buttons/VButton.vue'));
const VBackButton = defineAsyncComponent(() => import('@/Pages/User/Components/Buttons/VButton.vue'));

const VCheckbox = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VCheckbox.vue'));
const VDatePicker = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VDatePicker.vue'));
const VTextInput = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VTextInput.vue'));
const VMobileNumber = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VMobileNumber.vue'));
const VFileInput = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VFileInput.vue'));
const VPasswordInput = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VPasswordInput.vue'));
const VSelector = defineAsyncComponent(() => import('@/Pages/User/Components/Inputs/VSelector.vue'));

const VConfirmationModal = defineAsyncComponent(() => import('./Pages/User/Components/Modals/VConfirmationModal.vue'));
const VDeleteModal = defineAsyncComponent(() => import('./Pages/User/Components/Modals/VDeleteModal.vue'));
const VDialogModal = defineAsyncComponent(() => import('./Pages/User/Components/Modals/VDialogModal.vue'));
const VSuccessModal = defineAsyncComponent(() => import('./Pages/User/Components/Modals/VSuccessModal.vue'));
const CalculatorModal = defineAsyncComponent(() => import('./Pages/User/Components/Modals/CalculatorModal.vue'));

// Design Components
const ServiceCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/ServiceCard.vue'));
const ValuesCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/ValuesCard.vue'));
const BenefitCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/BenefitCard.vue'));
const SpecialtyCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/SpecialtyCard.vue'));
const ArticleCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/ArticleCard.vue'));
const CareerCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/CareerCard.vue'));
const OfferCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/OfferCard.vue'));
const TeamCard = defineAsyncComponent(() => import('./Pages/User/Components/Cards/TeamCard.vue'));
const ImageText = defineAsyncComponent(() => import('./Pages/User/Components/Sections/ImageText.vue'));
const ContactForm = defineAsyncComponent(() => import('./Pages/User/Components/Sections/ContactForm.vue'));
const CareerForm = defineAsyncComponent(() => import('./Pages/User/Components/Sections/CareerForm.vue'));

//Section Components
import GeneralBanner from "./Pages/User/Components/Sections/GeneralBanner.vue";
const OffsetBanner = defineAsyncComponent(() => import('./Pages/User/Components/Sections/OffsetBanner.vue'));
const GenericBlock = defineAsyncComponent(() => import('./Pages/User/Components/Sections/GenericBlock.vue'));
const OfferBlock = defineAsyncComponent(() => import('./Pages/User/Components/Sections/OfferBlock.vue'));
const SpecialtyBlock = defineAsyncComponent(() => import('./Pages/User/Components/Sections/SpecialtyBlock.vue'));
const ContactFrame = defineAsyncComponent(() => import('./Pages/User/Components/Sections/ContactFrame.vue'));
const ImageTextFrame = defineAsyncComponent(() => import('./Pages/User/Components/Sections/ImageTextFrame.vue'));
const BenefitBlock = defineAsyncComponent(() => import('./Pages/User/Components/Sections/BenefitBlock.vue'));
const TextWithMap = defineAsyncComponent(() => import('./Pages/User/Components/Sections/TextWithMap.vue'));
const TeamFrame = defineAsyncComponent(() => import('./Pages/User/Components/Sections/TeamFrame.vue'));
const YoutubeEmbed = defineAsyncComponent(() => import('./Pages/User/Components/Sections/OfferBlock.vue'));
const VPagination = defineAsyncComponent(() => import('./Pages/User/Components/Partials/VPagination.vue'));

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({
                methods: { route },
                components: {
                    Head,
                    Link,
                    UserLayout,
                    VButton,
                    VBackButton,
                    VCheckbox,
                    VDatePicker,
                    VTextInput,
                    VMobileNumber,
                    VFileInput,
                    VPasswordInput,
                    VSelector,
                    VConfirmationModal,
                    VDeleteModal,
                    VDialogModal,
                    VSuccessModal,
                    CalculatorModal,
                    ServiceCard,
                    ValuesCard,
                    ImageText,
                    BenefitCard,
                    SpecialtyCard,
                    ContactForm,
                    CareerForm,
                    OfferCard,
                    ArticleCard,
                    CareerCard,
                    GeneralBanner,
                    OffsetBanner,
                    GenericBlock,
                    OfferBlock,
                    SpecialtyBlock,
                    ContactFrame,
                    ImageTextFrame,
                    BenefitBlock,
                    TextWithMap,
                    TeamCard,
                    TeamFrame,
                    YoutubeEmbed,
                    VPagination
                }
            })
            .mount(el)
    },
})