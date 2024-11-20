// Promoções dinâmicas
function updatePromotions() {
    const promoBanner = document.getElementById('promoBanner');
    const dayOfWeek = new Date().getDay();
    let promoMessage = '';

    switch (dayOfWeek) {
        case 1:
            promoMessage = 'Segunda-feira: Desconto de 10% no prato quimoia';
            break;
        case 2:
            promoMessage = 'Terça-feira: Desconto no Jantar Temático!';
            break;
        default:
            promoMessage = 'Promoção da Semana: Aproveite nossos descontos!';
    }

    promoBanner.textContent = promoMessage;
}

// Filtro de Menu
function filterMenu(category) {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        if (item.getAttribute('data-category') === category || category === 'all') {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Inicialização
window.onload = function() {
    updatePromotions();
};


    // Seleciona o botão de alternância de tema
    const themeToggleBtn = document.getElementById('theme-toggle');

    // Verifica se o tema escuro já está ativo no localStorage
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }

    // Alterna o tema quando o botão for clicado
    themeToggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        
        // Armazena a preferência de tema no localStorage
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    let currentIndex = 0;
    let images = document.getElementsByClassName("carousel-image");
    
    function changeImage(n) {
        images[currentIndex].style.display = "none";  // Esconde a imagem atual
        currentIndex = (currentIndex + n + images.length) % images.length;  // Calcula o índice da próxima imagem
        images[currentIndex].style.display = "block";  // Mostra a próxima imagem
    }
    
    // Função para rolar automaticamente
    function autoChangeImage() {
        changeImage(1);  // Muda para a próxima imagem automaticamente
    }
    
    // Chama a função a cada 3 segundos (3000 milissegundos)
    setInterval(autoChangeImage, 7000);  
    
   