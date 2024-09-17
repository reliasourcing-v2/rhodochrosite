import { usePage } from '@inertiajs/vue3';
import InertiaProps from '@/Contracts/InertiaProps.ts';

export default function usePermission() {
    const can = (...parameters: string[]) => {
        return usePage<InertiaProps>().props.session_permissions 
            ? usePage<InertiaProps>().props.session_permissions.some((permission) =>
                parameters.includes(permission)
            )
            : false;
    };

    return { can };
}
