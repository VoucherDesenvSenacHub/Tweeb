// Seleciona todas as divisões de departamento
const departments = document.querySelectorAll('.department');

// Para cada departamento, adiciona um evento de clique
departments.forEach(department => {
    department.addEventListener('click', (event) => {
        // Impede que o clique no departamento feche o submenu imediatamente
        event.stopPropagation();

        // Alterna a classe 'open' no departamento, o que controlará a visibilidade do submenu
        department.classList.toggle('open');
        
        // Fecha todos os outros submenus (opcional, dependendo do comportamento desejado)
        departments.forEach(dep => {
            if (dep !== department) {
                dep.classList.remove('open');
            }
        });
    });
});

// Fecha os submenus se o usuário clicar fora do menu
document.addEventListener('click', () => {
    const openDepartments = document.querySelectorAll('.department.open');
    openDepartments.forEach(department => {
        department.classList.remove('open');
    });
});
