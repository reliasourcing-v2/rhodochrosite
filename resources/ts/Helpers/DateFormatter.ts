import { DateTime } from "luxon";

const validateDate = ( dateTime: string|Date ) => {
    const date = new Date(dateTime);

    if (isNaN(date.getTime())) {
        return "invalid Date";
    }

    return date;
}

const defaultTimeStamp = ( dateTime: string|Date )  => {
    validateDate(dateTime);

    return DateTime.fromISO(dateTime).toLocaleString({
        month: 'long', day: 'numeric', year: 'numeric',  hour: 'numeric',  minute: '2-digit',
    });
}

const formatDate = ( dateTime: string|Date, format: string )  => {

    const validDate = validateDate(dateTime);

    if (validDate instanceof Date) {
        return DateTime.fromJSDate(validDate).toFormat(format);
    } else {
        return validDate;
    }
}

const timeFormat = ( dateTime: string|Date )  => {
    const validDate = validateDate(dateTime);

    if (validDate instanceof Date) {
        return DateTime.fromJSDate(validDate).toLocaleString({ hour: 'numeric',  minute: '2-digit' });
    } else {
        return validDate;
    }
}

export { defaultTimeStamp, formatDate, timeFormat }
