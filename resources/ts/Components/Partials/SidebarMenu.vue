<template>
    <div 
    class="fixed z-50 h-screen max-h-screen bg-white border-r border-gray-100 overflow-auto transition-all scroll-mr-1 snap-start"
    :class="[
        expanded ? 'w-60' : '',
        expanded ? '' : mouseenter ? 'w-60' : 'w-[100px]'
    ]">
        <div class="p-8">
            <div class="flex items-center space-x-3">
                <img 
                class="flex-shrink-0"
                src="/icons/logo.png" 
                alt="logo">
                <!-- <transition
                enter-active-class="transition duration-300 ease-out delay-300"
                enter-from-class="transform opacity-0"
                enter-to-class="transform opacity-100"
                leave-active-class="transition duration-300 ease-out"
                leave-from-class="transform opacity-100"
                leave-to-class="transform opacity-0"
                >
                    <div class="w-full" v-if="expanded ? true : mouseenter">
                        <p class="text-sm font-semibold text-primary-600 whitespace-nowrap">One Roadway</p>
                        <p class="text-sm font-semibold text-gray-400 whitespace-nowrap">Trucking Services, Inc.</p>
                    </div>
                </transition> -->
            </div>
        </div>

        <div class="p-4 space-y-8">
            <div 
            class="space-y-1"
            v-for="item in navigation" :key="item.name">
                <transition
                enter-active-class="transition duration-300 ease-out delay-300"
                enter-from-class="transform opacity-0"
                enter-to-class="transform opacity-100"
                leave-active-class="transition duration-300 ease-out"
                leave-from-class="transform opacity-100"
                leave-to-class="transform opacity-0"
                >
                    <p
                    v-if="expanded ? true : mouseenter"
                    class="ml-4 text-xs font-semibold uppercase text-gray-600 mb-2 whitespace-nowrap"
                    >
                        {{ item.name }}
                    </p>
                </transition>
                <div v-for="menu in item.children">
                    <template v-if="!menu.children">
                        <a
                        :href="menu.href"
                        class="flex items-center w-full py-3 px-4 rounded-lg transition hover:bg-primary-50"
                        :class="[
                            isCurrentUrl(menu.parentUrl)
                                ? 'bg-primary-50 text-primary-500'
                                : 'text-gray-400',
                        ]">
                            <component
                                :is="menu.icon"
                                aria-hidden="true"
                                class="w-5 h-5 flex-shrink-0"
                            />
                            <transition
                            enter-active-class="transition duration-300 ease-out delay-300"
                            enter-from-class="transform opacity-0"
                            enter-to-class="transform opacity-100"
                            leave-active-class="transition duration-300 ease-out"
                            leave-from-class="transform opacity-100"
                            leave-to-class="transform opacity-0"
                            >
                                <span 
                                v-if="expanded ? true : mouseenter"
                                class="text-sm ml-3 whitespace-nowrap" 
                                >
                                    {{ menu.name }}
                                </span>
                            </transition>
                        </a>
                    </template>

                    <template v-else>
                        <Disclosure
                        as="div"
                        :defaultOpen="true"
                        class="space-y-1">
                            <DisclosureButton
                            :class="[
                                'flex items-center py-3 px-4 w-full rounded-lg',
                                isCurrentUrl(menu.href)
                                ? 'bg-primary-50 text-primary-500'
                                : 'text-gray-400',
                            ]">
                                <component
                                    :is="menu.icon"
                                    aria-hidden="true"
                                    class="w-5 h-5 flex-shrink-0 mr-3"
                                />
                                <transition
                                enter-active-class="transition duration-300 ease-out delay-300"
                                enter-from-class="transform opacity-0"
                                enter-to-class="transform opacity-100"
                                leave-active-class="transition duration-300 ease-out"
                                leave-from-class="transform opacity-100"
                                leave-to-class="transform opacity-0"
                                >
                                    <span class="text-sm" v-if="expanded ? true : mouseenter">
                                        {{ menu.name }}
                                    </span>
                                </transition>
                                <ChevronDownIcon 
                                class="w-5 h-5 ml-auto"/>
                            </DisclosureButton>
                            <DisclosurePanel class="space-y-1">
                                <div v-for="submenu in menu.children">
                                    <transition
                                        enter-active-class="transition duration-300 ease-out delay-300"
                                        enter-from-class="transform opacity-0"
                                        enter-to-class="transform opacity-100"
                                        leave-active-class="transition duration-300 ease-out"
                                        leave-from-class="transform opacity-100"
                                        leave-to-class="transform opacity-0"
                                    >
                                        <a
                                        v-if="expanded ? true : mouseenter"
                                        :href="submenu.href"
                                        class="flex w-full py-3 pl-12 pr-4 text-sm text-gray-400"
                                        :class="[
                                            isCurrentUrl(submenu.parentUrl)
                                                ? 'bg-primary-50 text-primary-500'
                                                : 'text-gray-400',
                                            'group flex items-center py-3 text-sm rounded-lg pl-12',
                                        ]">
                                            {{ submenu.name }}
                                            <span 
                                            v-if="submenu.count != null"
                                            class="ml-auto text-xs text-white bg-primary-500 rounded-3xl font-semibold px-2 py-0.5">
                                                {{ submenu.count }}
                                            </span>
                                        </a>
                                    </transition>
                                </div>
                            </DisclosurePanel>
                        </Disclosure>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";

import {
    ChevronDownIcon,
    RectangleGroupIcon,
    ShoppingBagIcon,
    Squares2X2Icon,
    ReceiptPercentIcon,
    MegaphoneIcon,
    BuildingStorefrontIcon,
    NewspaperIcon,
    UserIcon,
    UserGroupIcon,
    FolderIcon,
    Cog6ToothIcon,
    ChartBarIcon,
    DocumentTextIcon
} from "@heroicons/vue/24/outline";

defineProps({
    expanded: {
        type: Boolean,
        default: true
    },
    mouseenter: {
        type: Boolean,
        default: true
    }
})

interface generalNavType {
    name: string,
    href: string,
    parentUrl: Array<string> | string,
    icon?: any,
    count?: number,
    allowed?: boolean,
    children?: generalNavType[]
}

const navigation: generalNavType[] = [
    {
        name: "Content Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Pages",
                href: route("admin.cms.index"),
                parentUrl: "admin.cms.index",
                icon: NewspaperIcon,
                allowed: true,
            },
            {
                name: "Modular Pages",
                href: route("admin.pages.parent.index"),
                parentUrl: "admin.pages*",
                icon: RectangleGroupIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Article Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Article",
                href: route('admin.article-management.articles.index'),
                parentUrl: "admin.article-management.articles*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Pricing Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Pricing",
                href: route('admin.pricing-management.pricings.index'),
                parentUrl: "admin.pricing-management.pricings*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Inquiry Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "General Inquiry",
                href: route('admin.contact.inquiries.index'),
                parentUrl: "admin.contact.inquiries*",
                icon: DocumentTextIcon,
                allowed: true,
            },
            {
                name: "Subscription",
                href: route('admin.contact.subscriptions.index'),
                parentUrl: "admin.contact.subscriptions*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Application Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Application",
                href: route('admin.application.index'),
                parentUrl: "admin.application*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Computation Management",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Computation",
                href: route('admin.computation.index'),
                parentUrl: "admin.computation*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Accounts",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Admins",
                href: route("admin.accounts.admins.index"),
                parentUrl: "admin.accounts.admins.*",
                icon: UserGroupIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Others",
        href: "#",
        parentUrl: "#",
        allowed: true,
        children: [
            {
                name: "Activity Logs",
                href: route("admin.activity-logs.index"),
                parentUrl: "admin.activity-logs.*",
                icon: UserGroupIcon,
                allowed: true,
            },
        ]
    },
];

const isCurrentUrl = (url: Array<string> | string): boolean => {
    if (Array.isArray(url)) {
        let value = false;

        url.forEach((href: string) => {
            if (route().current(href)) {
                value = true;
            }
        })

        return value;
    } else {
        return route().current(url);
    }
}
</script>