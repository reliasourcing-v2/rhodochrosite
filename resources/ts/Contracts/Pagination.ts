interface PaginationInterface {
    current_page: number
    data: Array<any>
    first_page_url: string
    from: number
    last_page: number
    last_page_url: string
    links: Array<PaginationLinkInterface>
    next_page_url: string
    path: string
    per_page: number
    prev_page_url: string
    to: number
    total: number
}

interface PaginationLinkInterface { 
    active: boolean
    label: string
    url: string|null 
}

export {
    PaginationInterface,
    PaginationLinkInterface
}