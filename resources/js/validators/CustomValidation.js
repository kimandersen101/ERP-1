export function validPhone(value) {
    var cleaned = value.replace(/[^A-Z0-9]+/ig, '');
    return cleaned.length === 10;
}

export function validSSN(value) {
    var cleaned = value.replace(/[^A-Z0-9]+/ig, '');
    return cleaned.length === 9;
}

export function validDOB(value) {
    var current = new Date();
    var birthday = new Date(value);
    var age = Math.floor((current - birthday) / (365.25 * 24 * 60 * 60 * 1000));
    return !(birthday.getTime() >= current.getTime() || age < 18);
}
