function AtivarCoracao(coracao) {
    if (coracao.src.includes('assets/img/heart_disabled.png')) {
        coracao.src = 'assets/img/heart_enabled.png';
    } else {
        coracao.src = 'assets/img/heart_disabled.png';
    }
}