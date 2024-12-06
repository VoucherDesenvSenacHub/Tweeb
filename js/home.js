function AtivarCoracao(coracao) {
    if (coracao.src.includes('assets/img/heart_disabled.png')) {
        coracao.src = 'assets/img/heart_enabled.png';
    } else {
        coracao.src = 'assets/img/heart_disabled.png';
    }
}

let radio = document.querySelector('.manual-btn');
let cont = 1;
document.getElementById('radio1').checked = true;

setInterval(() => {
    proximaImagem()
}, 5000)

function proximaImagem(){
    cont++
    if(cont>3){
        cont = 1
    }

    document.getElementById('radio'+cont).checked = true
}