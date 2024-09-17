import { PageProps } from '@inertiajs/core';

interface UserInterface {
    //
} 

export default interface InertiaProps extends PageProps {
    user: UserInterface
    session_permissions: string[]
}