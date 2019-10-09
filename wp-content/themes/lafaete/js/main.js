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
let sizeImage =  document.querySelector('#slider_images img').offsetWidth;

let numberOfImages = document.querySelectorAll('#slider_images img').length;
let sliderContainer = 'width:' + sizeImage * numberOfImages + 'px';
let sizeContainer = document.getElementById('slider_images').setAttribute('style', sliderContainer);

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
// fim slider draggable

