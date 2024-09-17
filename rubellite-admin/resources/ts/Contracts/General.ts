interface Error {
    message: string;
}

interface Tab {
    name: string;
    value?: string | null;
    count?: number;
}

interface Header {
    text: string;
    value?: string;
    sort?: boolean;
    fixed?: boolean;
}

interface Breadcrumb {
    href: string;
    name: string;
}

interface OptionFormat {
    id: string | number;
    value: string;
    label?: string;
    [key: string]: any;
}

interface StatusFormat {
    text: string;
    textColor: string;
    bgColor: string;
}

interface PageFilter {
    query: string;
    date: any;
    tab: string;
    [key: string]: any;
}

interface Detail {
    title: string;
    value: string | Array<Detail> | Detail;
    [key: string]: any;
}

/**
 * @property {Function}
 * @params {unknown} errorResponse
 * @return {ErrorInterface}
 */
const setError: Function = (errorResponse: unknown): ErrorInterface => {
    return {
        message:
            errorResponse.message ??
            "Failed to proceed this action. Please refresh the page before trying again.",
    } as ErrorInterface;
};

export {
    Error,
    Tab,
    Header,
    Breadcrumb,
    OptionFormat,
    StatusFormat,
    PageFilter,
    Detail,
    setError,
};
