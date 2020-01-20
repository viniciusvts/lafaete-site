/*!DNA main.js*/
/**
 * carrosseis
 */
class carousel{
    /**
     * Provê o rolamento para a direita do carrossel adicione essa função ao onclick do botão
     * @example
     * var button = document.getElementById("button");
     * button.onclick = scrollR
     * @author Vinicius de Santana
     */
    scrollR(){
        var mycarroussel = this;
        do{
            mycarroussel = mycarroussel.parentNode;
        }while( !(mycarroussel.classList.contains("bp-carousel")) );
        var innerCarrossel = mycarroussel.querySelector(".bp-carousel-inner");
        /**variável salva a posição atual do carrossel*/
        var oldScroll = innerCarrossel.scrollLeft;
        //scrola para a posição nova
        innerCarrossel.scrollLeft += innerCarrossel.offsetWidth;
        //se a posição nova é igual a antiga significa que chegamos ao final do carrossel
        var cards = mycarroussel.querySelectorAll(".bp-carousel-inner .bp-item");
        var cardWidth = cards[0].offsetWidth;
        setTimeout(function(){//set timeout pq scroll behavior atrasa a leitura de scrollLeft
            if( (innerCarrossel.scrollLeft - oldScroll) < cardWidth){
                //então coloco o carrossel no inicio
                innerCarrossel.scrollLeft = 0;
            }
        }, 500);
        //verifica se tem bullets e troca para o bullet que deve ficar ativo
        var myDots = mycarroussel.querySelectorAll(".dots");
        for(var i = 0; i < myDots.length ; i++){
            if( myDots[i].classList.contains("active") ){
                myDots[i].classList.remove("active");
                var prox = i+1;
                if(prox == myDots.length){
                    myDots[0].classList.add("active");
                }else{
                    myDots[prox].classList.add("active");
                }
                return
            }
        }
    }
    
    /**
     * Provê o rolamento para a esquerda do carrossel adicione essa função ao onclick do botão
     * @example
     * var button = document.getElementById("button");
     * button.onclick = scrollL
     * @author Vinicius de Santana
     */
    scrollL(){
        var mycarroussel = this;
        do{
            mycarroussel = mycarroussel.parentNode;
        }while( !(mycarroussel.classList.contains("bp-carousel")) );
        var innerCarrossel = mycarroussel.querySelector(".bp-carousel-inner")
        /**variável salva a posição atual do carrossel*/
        var oldScroll = innerCarrossel.scrollLeft;
        //scrola para a posição nova
        innerCarrossel.scrollLeft -= innerCarrossel.offsetWidth;
        //se a posição nova é igual a antiga significa que chegamos ao final do carrossel
        var cards = mycarroussel.querySelectorAll(".bp-carousel-inner .bp-item");
        var cardWidth = cards[0].offsetWidth;
        setTimeout(function(){//set timeout pq scroll behavior atrasa a leitura de scrollLeft
            if( (oldScroll - innerCarrossel.scrollLeft) < cardWidth ){
                //calcula o tamanho total do carrossel
                var cards = mycarroussel.querySelectorAll(".bp-carousel-inner .bp-item");
                /**Width total com todos os cards do carrousel */
                var cardsWidthTotal = 0;
                for (var j = 0; j<cards.length; j++){
                    cardsWidthTotal += cards[j].offsetWidth;
                }
                //então coloco o carrossel no final
                innerCarrossel.scrollLeft = cardsWidthTotal;
            }
        }, 500);
        //verifica se tem bullets e troca para o bullet que deve ficar ativo
        var myDots = mycarroussel.querySelectorAll(".dots");
        for(var i = myDots.length-1; i >=0 ; i--){
            if( myDots[i].classList.contains("active") ){
                myDots[i].classList.remove("active");
                var prox = i-1;
                if(prox < 0){
                    myDots[myDots.length-1].classList.add("active");
                }else{
                    myDots[prox].classList.add("active");
                }
                return;
            }
        }
    }
    
    /**
     * Caucula a necessidade do cursor de seta no carrossel os eliminando se necessário
     * @author Vinicius de Santana
     */
    setasNoCarrossel(){
        for (var i = 0; i<this.carroussel.length; i++){
            var cards = this.carroussel[i].querySelectorAll(".bp-carousel-inner .bp-item");
            var cardsWidthTotal = 0;
            for (var j = 0; j<cards.length; j++){
                cardsWidthTotal += cards[j].offsetWidth;
            }
            if (cardsWidthTotal < this.carroussel[i].offsetWidth){
                this.carroussel[i].querySelector(".arrow-right").style.display = "none";
                this.carroussel[i].querySelector(".arrow-left").style.display = "none";
            }else{
                this.carroussel[i].querySelector(".arrow-right").style.display = "";
                this.carroussel[i].querySelector(".arrow-left").style.display = "";
            }
        }
    }

    /**
     * ação a ser adicionada ao onclick dos bullets de página do carrossel
     * @param {Event} e 
     */
    scrollDots(e){
        var myNumber = this.getAttribute('number');
        var mycarroussel = this.parentNode;
        var allDots = mycarroussel.querySelectorAll(".dots");
        do{
            mycarroussel = mycarroussel.parentNode;
        }while( !(mycarroussel.classList.contains("bp-carousel")) );
        var innerCarrossel = mycarroussel.querySelector(".bp-carousel-inner")
        innerCarrossel.scrollLeft = innerCarrossel.offsetWidth * myNumber;
        for (let i = 0; i < allDots.length; i++) {
            allDots[i].classList.remove('active');
        }
        this.classList.add('active');
    }

    /**
     * Adiciona um bullet na paginação do carroussel,
     * caso seja o primeiro, apaga o conteúdo interno da div
     * @param {HTMLDivElement} carroussel se é o primeiro ponto
     * @param {number} index numero de index para o bullet
     * @param {boolean} first se é o primeiro ponto
     */
    criarDotCarroussel(carroussel, index, first = false){
        var bpIndicators = carroussel.querySelector('.bp-indicators');
        if(first) bpIndicators.innerHTML = "";
        var div = document.createElement('div');
        div.classList.add('dots');
        if( first ) div.classList.add('active');
        div.setAttribute('number', index);
        div.onclick = this.scrollDots;
        bpIndicators.append(div);
    }

    /**
     * Caucula a necessidade de bullets no carrossel os eliminando se necessário
     * @author Vinicius de Santana
     */
    navsNoCarroussel(){
        for (var i = 0; i<this.carroussel.length; i++){
            var cards = this.carroussel[i].querySelectorAll(".bp-carousel-inner .bp-item");
            /**Width da parte visivel do carrousel */
            var carrousselWidth = this.carroussel[i].offsetWidth;
            /**Width total com todos os cards do carrousel */
            var cardsWidthTotal = 0;
            for (var j = 0; j<cards.length; j++){
                cardsWidthTotal += cards[j].offsetWidth;
            }
            var fator = cardsWidthTotal/carrousselWidth;
            for (let k = 0; k < fator; k++) {
                if( k == 0 ){
                    this.criarDotCarroussel(this.carroussel[i], k, true);
                }else{
                    this.criarDotCarroussel(this.carroussel[i], k);
                }
            }
            // coloca o carrossel na posição 0
            var innerCarrossel = this.carroussel[i].querySelector(".bp-carousel-inner");
            innerCarrossel.scrollLeft = 0;
        }
    }
    
    /**
     * Adiciona as funções de scroll aos butoes do carrossel
     * @author Vinicius de Santana
     */
    acaoNoBotaoDoCarrossel(){
        for (var i = 0; i<this.carroussel.length; i++){
            var buttonRight = this.carroussel[i].querySelector(".arrow-right");
            buttonRight.onclick = this.scrollR;
        //buttonRight.onmouseover = scrollR;
            var buttonLeft = this.carroussel[i].querySelector(".arrow-left");
            buttonLeft.onclick = this.scrollL;
        //buttonLeft.onmouseover = scrollL;
        }
    }
    
    /**
     * Inicia todos os carrosseis
     * @author Vinicius de Santana
     */
    initCarrossel(){
        //remove as setas do carrossel se necessário
        this.setasNoCarrossel();
        //adiciona a ação ao butoes
        this.acaoNoBotaoDoCarrossel();
        //adiciona a ação dos bullets
        this.navsNoCarroussel();
    }

    /**
     * Verifica as necessidades de butoes ao redimensionar a janela
     * @author Vinicius de Santana
     */
    onResize(){
        //remove as setas do carrossel se necessário
        this.setasNoCarrossel();
        //adiciona a ação dos bullets
        this.navsNoCarroussel();
    }

    constructor(){
        this.carroussel = document.querySelectorAll(".bp-carousel");
        this.initCarrossel();
    }
}

/**
 * navegação do modelo de produto
 */
class modeloDeProduto{
    /**
     * a ação de clicar no link
     */
    cliqueNoLink(e){
        e.preventDefault();
        var todosOsLinks = document.querySelectorAll("ul.tabs li.tab a");
        var todasAsPaginas = document.querySelectorAll(".modeloProdutos ");
        for (let i = 0; i < todosOsLinks.length; i++) {
            todosOsLinks[i].classList.remove('active');
        }
        this.classList.add('active');
        var objetivo = this.getAttribute('objetivo');
        for (let i = 0; i < todasAsPaginas.length; i++) {
            todasAsPaginas[i].classList.remove('active');
            if(todasAsPaginas[i].id == objetivo ){
                todasAsPaginas[i].classList.add('active');
            }
        }
    }
    
    /**
     * Adiciona as funções de clique
     * @author Vinicius de Santana
     */
    acaoNosLinks(){
        for (var i = 0; i<this.modelosLinks.length; i++){
            this.modelosLinks[i].onclick = this.cliqueNoLink;
        }
    }
    
    /**
     * Inicia
     * @author Vinicius de Santana
     */
    initCarrossel(){
        //adiciona a ação ao butoes
        this.acaoNosLinks();
    }

    constructor(){
        this.modelosLinks = document.querySelectorAll("ul.tabs li.tab a");
        this.initCarrossel();
    }
}

// funcão esconder menu ao dar scroll página
$(function(){   
    var nav = $('#menu-principal'); 
    var navTop = $('#menu-topo');  
    
    $(window).scroll(function () { 
        if ($(this).scrollTop() > 90) { 
            navTop.css('display','none');
            nav.removeClass('bg-light');
            nav.addClass('bg-dark');
        } else { 
            navTop.css('display','block'); 
            nav.addClass('bg-light');
            nav.removeClass('bg-dark');
        } 
    });  
});

// Função previne que o botão da categoria (submenu) suba até o header pois é um link somente com um hash
function nolink_category() {
    try {
        var nolink = document.getElementById('nolink')
        nolink.onclick = function(e) {
            e.preventDefault();
        }
    } catch(e) {
        console.warn(e)
    }
}

function input_hidden() {
    var input = document.getElementById('hidden-input')
    var url = window.location.href
    if(input) {
        input.value = url
    }
}

//funcção do filtro pega o hash do link com nome da classe correspondente
//retira o hash para comparar com a classe do link da li com a classe no link da imagem
// tudo que não for a hash clicada ou não for todos, chama a classe para esconder
//senão remove a classe esconder
$(function(){
    $('.menu-imoveis ul li a').click(function(e) {
        e.preventDefault();
        let a = $(this).attr('href');
        a = a.substr(1);

        $('.menu-imoveis ul li').each(function(){
            $(this).removeClass('active');
        });
        
        $(this).parent('.nav-item').addClass('active');

        $('.imagemGaleria').each(function() {
            if (!$(this).hasClass(a) && a != 'todos'){
                $(this).addClass('esconder');
            }                
            else{
                $(this).removeClass('esconder');
            }                
        });
    });
});

$(function(){
    $('.dropdown').mouseover(function(){
        $(this).addClass('show');
        $(this).find('.dropdown-menu').addClass('show fadeIn animated');
    });

    $('.dropdown').mouseout(function(){
        $(this).removeClass('show');
        $(this).find('.dropdown-menu').removeClass('show fadeIn animated');
    });

    $('button').mouseover(function(){
        $(this).addClass("pulse animated");
    })
    $('button').mouseout(function(){
        $(this).removeClass("pulse animated");
    })
})

$(function(){
    $('.blog-categorias, .submenu-categorias').mouseover(function(){
        $('.submenu-categorias').removeClass('esconder');
    });

    $('.blog-categorias, .submenu-categorias').mouseout(function(){
        $('.submenu-categorias').addClass('esconder');
    })
});


(function($){
    "use strict";
    $('.next').click(function(){ $('.carousel').carousel('next');return false; });
    $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });
})	
(jQuery);



/**
 * Slider que responsivo e arrastável
 * @author Filipe Oliveira
 */
let sliderControl = document.querySelectorAll('#slider_controls span');
let sliderImages = document.querySelector('#slider_images');
let sliderImage = document.querySelectorAll('#slider_images img');

try {
    let sizeImage =  document.querySelector('#slider_images img').offsetWidth;
} catch(e) {
    console.warn(e);
}

try {
    let numberOfImages = document.querySelectorAll('#slider_images img').length;
    let sliderContainer = 'width:' + sizeImage * numberOfImages + 'px';
    let sizeContainer = document.getElementById('slider_images').setAttribute('style', sliderContainer);
} catch(e) {
    // statements
    console.warn(e);
}

const slider = document.querySelector('#slider_container');
let isDown = false;
let startX;
let scrollLeft;

for(let indexSliderControl = 0; indexSliderControl < sliderControl.length; indexSliderControl++){
    sliderControl[indexSliderControl].onclick = function(){ 
        //remove todos as classes selected
        for(let indexSelected = 0; indexSelected < sliderControl.length; indexSelected++){
            sliderControl[indexSelected].classList.remove('selected');
            this.classList.add('selected');
            // pega o index da classe que está com selected e multiplica o translate o íncice x tamanho negativo da imagem, para as imagens passarem para esquerda
            /*
            if(sliderControl[indexSelected].getAttribute('class') == 'selected'){
                let sliderImages = document.getElementById('slider_images');    
                let sliderTransform = "transform:translateX(" + indexSelected * -sizeImage + "px)";
                sliderImages.setAttribute('style', sliderTransform);
            }
            */

            if(sliderControl[indexSelected].getAttribute('class') == 'selected'){
                slider.scrollLeft = indexSelected * sizeImage;
                let imagePosition = ((indexSelected * sizeImage) - sliderImages.offsetWidth) + sliderImages.offsetWidth;
                console.log( imagePosition * -1);
            }

        }       
    }
}
if(slider){
    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      slider.classList.add('active');
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
      if(!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 1; // quantas casas o sroll vai andar
      let scrollMatch = slider.scrollLeft = scrollLeft - walk;
      let positionBulletActive = Math.floor(scrollMatch/100)/3;
      
        if(Math.floor(scrollMatch/100) * 100 % 300 == 0){
            console.log(positionBulletActive);
            if(!sliderControl[positionBulletActive].classList.contains('selected')){        
                sliderControl[positionBulletActive].classList.add('selected');
            }
        }
    });

}
// fim slider draggable

/**
 * Cria em todos os forms um campo hidden com a url atual
 * @example
 * setTimeout(addUrlToForms, 2000); 
 * @author Vinicius de Santana
 */
function addUrlToForms(){
    //cria input com a url atual como valor para identificação no RD
    input01 = document.createElement("input");
    input01.setAttribute("type", "hidden")
    input01.setAttribute("name", "urlOrigem")
    input01.value = window.location.href;
    forms = document.querySelectorAll("form");
    for (var i = 0; i < forms.length; i++) {
        forms[i].appendChild( input01.cloneNode(true) );
    }
}

window.addEventListener('load', function(e){
    addUrlToForms();// setTimeout(addUrlToForms, 2000);
    // footer_floater();
    bpCarrousel = new carousel();//initCarrossel();
    bpModeloDeProduto = new modeloDeProduto();
    nolink_category()
    input_hidden()
    let img = document.getElementsByTagName('img')
    try {
        for (let i in img) {
            if(img[i].getAttribute('alt') == '') {
                img[i].setAttribute('alt', 'img - Lafaete');
            }
        }
    }catch(e) {
        // do nothing
    }
});

window.addEventListener('resize', function(e){
    console.log("resize");
    bpCarrousel.onResize();
});
