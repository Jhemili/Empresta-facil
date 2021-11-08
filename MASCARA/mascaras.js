const masks = {
    celular(value){
        return value
        .replace(/\D/g,'')
        .replace(/(\d{0})(\d)/,'$1($2')  //2 GRUPOS DE CAPTURA
        .replace(/(\d{2})(\d)/, '$1)$2') 
        .replace(/(\d{5})(\d)/, '$1-$2')
    }
}

document.querySelectorAll('input').forEach(($input) => {
    const field = $input.dataset.js

    $input.addEventListener('input', (e) => {
        e.target.value = masks[field](e.target.value)
    }, false)
})

//(43)99107-8556