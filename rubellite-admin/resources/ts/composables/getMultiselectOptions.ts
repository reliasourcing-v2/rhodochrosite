import { OptionFormat } from "@/Contracts/General"

export default function getMultiselectOptions(options:OptionFormat[]) {
    const obj = {}
    options.forEach(item => {
        obj[item.id] = item.value
    })
    return obj
}