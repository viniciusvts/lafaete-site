$(window).on('load', function() {
    var imagens  = $("#imagens").children('li'),
        dot        = $("#dots").children('span'),
        numImagens = imagens.length,
        tempo      = 4000,
        rodar      = setInterval(autoPlay, tempo),
        i            = 0,
        a;

    function imagemSeguinte() {
        imagens.eq(i).removeClass('active');
        dot.eq(i).removeClass('active');
        i = ++i === numImagens ? 0 : i;
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
    };
    
    function imagemAnterior() {
        imagens.eq(i).removeClass('active');
        dot.eq(i).removeClass('active');
        i = --i === -1 ? numImagens -1 : i;
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
    };
    
    function mudarImagem( i, a ) {
        clearInterval(rodar);

        // remover
        imagens.eq(a).removeClass('active');
        dot.eq(a).removeClass('active');

        // adicionar
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
        
        rodar = setInterval(autoPlay, tempo);       
    };
    
    /*
    $('.conteudo').hover(function(){
        $('#botoes').fadeIn(100);
        clearInterval(rodar);
    }, function(){
        $('#botoes').fadeOut(100);
        rodar = setInterval(autoPlay, tempo);
    }); */
    
    $('#anterior, #seguinte').on('click', function (e) {
        e.preventDefault();
        if( this.id === 'seguinte' ) {
            imagemSeguinte();
        } else {
            imagemAnterior();
        }
    });
    
    $('.dot, .imagem, .image-box a').on('click', function (e) {
        e.preventDefault();

        i = $(this).index();
        a = $('#dots').children('span.active').index();

        mudarImagem( i, a );
        $('#galeria').css('display','block');
    });
    
    function autoPlay() {
        $('#seguinte').click();
    }

    $('.fecharBotao').on('click', function(){
        $('#galeria').css('display', 'none');   
    });

    $(document).on('keyup',function(pressEsc) {
        if (pressEsc.keyCode == 27) {
            $('#galeria').css('display', 'none'); 
        }
    });

}); 


/*

// funcão lightbox
$(function(){
    $('.galeria-img a img').click(function(e) {
        $('#carousel').css('display','block');
        e.preventDefault();

        let imagemGaleria = $(this).attr('src');        
        

        $('.lightBox #itens ul li img').addClass('active');
        $('.lightBox').removeClass('esconder');
        $('.lightBox').addClass('fadeIn animated');         
    });

    $('.fecharBotao').click(function(){
        $('.lightBox #itens ul').removeClass('active');
        $('.lightBox').removeClass('fadeIn animated');  
        $('.lightBox').addClass('esconder');       
    });

    $(document).on('keyup',function(pressEsc) {
        if (pressEsc.keyCode == 27) {
            $('.lightBox').removeClass('fadeIn animated');  
            $('.lightBox').addClass('esconder');  
        }
    });
});


//carousel inner lightbox

var speed = 8000;
var run = setInterval('rotate()', speed);

var item_width = $('#itens li').outerWidth();
var left_value = item_width * (-1);

$('#itens li:first').before($('#itens li:last'));

$('#itens ul').css({'left':left_value});

$('#prev').click(function(){
    var left_intend = parseInt($('#itens ul').css('left')) + item_width;
    $('#itens ul').animate({'left':left_intend}, 200, function(){
        $('#itens li:first').after($('#itens li:last'));
        $('#itens ul').css({'left':left_value});
    });

    clearInterval(run);
    run = setInterval('rotate()', speed);
});


$('#next').click(function(){
    var left_intend = parseInt($('#itens ul').css('left')) - item_width;
    $('#itens ul').animate({'left':left_intend}, 200, function(){
        $('#itens li:first').after($('#itens li:last'));
        $('#itens ul').css({'left':left_value});
    });

    clearInterval(run);
    run = setInterval('rotate()', speed);
});


$('#itens').hover(
    function(){
        clearInterval(run);
    },

    function(){
        clearInterval(run);
        run = setInterval('rotate()', speed);
    }
);

function rotate(){
    $('#next').click();
}

function preventDefault(e){
    e = e || window.event;
    if(e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}


var keys = {37:1, 38:1, 39:1, 40:1};

function preventDefaultScrollKeys(e){
    if(keys[e.keyCode]){
        preventDefault(e);
        return false;
    }
}

function disableScroll(){
    window.onwheel = preventDefault; // quando rolar o mouse, chama a funcao preventDefault
    window.ontouchmove = preventDefault; // quando tocar na tela e arrastar...
    document.onkeydown = preventDefaultScrollKeys; // quando pressionar a seta para baixo
}

function enableScroll(){
    window.onwheel = null;
    window.onmousemove = null;
    document.onkeydown = null;
}

$('#carousel').css('display','none');*/