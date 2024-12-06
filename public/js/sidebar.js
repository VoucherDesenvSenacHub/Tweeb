document.getElementById('open_btn').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('open-sidebar');
});
const toggle = document.querySelector('#toggle');
const submenu = document.querySelector('#submenu'); 
const arrow = document.querySelector('#arrow'); 

toggle.addEventListener('click', () => {
    
    submenu.classList.toggle('show');
    submenu.classList.toggle('hidden');
    
    arrow.classList.toggle('rotated');
});


