const pluck = (arr: any, key: any) => arr.map(( i:any) => i[key].name).join(', ');

const getUrlParams = () => {
    const urlParams = new URLSearchParams(window.location.search);
    return Object.fromEntries(urlParams.entries());
}
 
export { pluck, getUrlParams }
