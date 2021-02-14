const snakeToCamel = str => str.replace(/([-_]\w)/g, g => g[1].toUpperCase());
const camelToKebab = str => {
    return str.split('').map((letter, idx) => {
        return letter.toUpperCase() === letter
            ? `${idx !== 0 ? '-' : ''}${letter.toLowerCase()}`
            : letter;
    }).join('');
}

