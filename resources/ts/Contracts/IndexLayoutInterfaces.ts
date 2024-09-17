import { FunctionalComponent } from "vue";

interface FilterFormat {
    tab: string;
    query: string;
    date: string;
    [key: string]: any;
}

interface TabFormat {
    name: string;
    value: string | null;
    count: number;
    href?: string;
    icon?: string | FunctionalComponent;
    [key: string]: any;
}

interface HeaderFormat {
    text: string;
    customClass?: string;
    withInfo?: boolean;
    width?: string;
}

interface PageFormat {
    href: string;
    name: string;
}

interface OptionFormat {
    id: string | number;
    value: string;
    label?: string;
    [key: string]: any;
}

export { FilterFormat, TabFormat, HeaderFormat, PageFormat, OptionFormat };
