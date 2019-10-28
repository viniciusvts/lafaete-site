<?php
/**
 * Funções relacionadas a paginação de produtos do Blog.
 *
 * @package DNA
 * @subpackage Paginate
 * @author Vinicius de Santana
 */

/**
 * Gera paginação dos post.
 *
 *
 * @param string|null $postType Tipo de post ou custom post retornado.
 * @param int $prevOrNext se quer o link anterior "0" se quer o próximo "1". Padrão = 0.
 * @param int $posPerPage o numero de post por página
 *
 * @return string Uma string conteno o link previo ou posterior da página
 */
function get_paginate( $postType=null, $prevOrNext = 0, $postsPerPage = 0){
    $paged = $_GET['sheet'];
    $category = $_GET['category'];
    $HOST_ATUAL = "http://$_SERVER[HTTP_HOST]";
    $URI_ATUAL = "$_SERVER[REQUEST_URI]";
    $count_posts = wp_count_posts($postType);//obj->publish
    $QTDposts = $count_posts->publish;
    $QTDpages = $QTDposts/$postsPerPage;//quantidade de páginas no total

    /*variável para evitar que o numero de pagina seja confundido
    com qualquer categoria que o usuário venha criar que contenha números*/
    $paramURL = "sheet=";
    //pedido de link prévio
    if($prevOrNext==0){
        if(!isset($paged) || $paged == 1) return null;
        $uri = str_replace($paramURL.$paged, $paramURL.($paged-1), $URI_ATUAL);
        return $HOST_ATUAL.$uri;
    }else if ($prevOrNext==1){
        //se tem pagina setada na url
        if(isset($paged)){
            //se é maior que quantidade total de páginas possiveis
            if($paged >= $QTDpages) return null;
            //se não
            $uri = str_replace($paramURL.$paged, $paramURL.($paged+1), $URI_ATUAL);
            return $HOST_ATUAL.$uri;
        }else if($QTDpages > 1){
            if(strpos($URI_ATUAL, "?") == false){
                return $HOST_ATUAL.$URI_ATUAL."?".$paramURL."2";
            }
            return $HOST_ATUAL.$URI_ATUAL."&".$paramURL."2";
            //se tem
        }
    }else{ return null;}//se não for anterior nem próxima, sinto muito
}

/**
 * Gera paginação dos posts, caso não seja passado o parametro irá pegar a variável global $wp_query.
 *
 * @param int $maxNumberPages numero de páginas da query
 * 
 * @return string|null Uma string conteno o link previo ou posterior da página
 * @author Vinicius de Santana
 * @example get_next_page_link( wp_query->max_num_pages);
 * @version 0.2.1 second version
 */
function get_next_page_link($maxNumberPages=null) {
    $maxNumberPages = $maxNumberPages ? $maxNumberPages : $wp_query->max_num_pages;
    $paged = $_GET['sheet'];
    $HOST_ATUAL = "http://$_SERVER[HTTP_HOST]";
    $URI_ATUAL = "$_SERVER[REQUEST_URI]";
    
    /*variável para evitar que o numero de pagina seja confundido 
    com qualquer categoria que o usuário venha criar que contenha números*/
    $paramURL = "sheet=";
    //se o máximo de páginas for 1
    if($maxNumberPages <= 1) return null;
    //se tem pagina setada na url
    if(isset($paged)){
        //se é maior que quantidade total de páginas possiveis
        if($paged >= $maxNumberPages) return null;
        //se não
        $uri = str_replace($paramURL.$paged, $paramURL.($paged+1), $URI_ATUAL);
        return $HOST_ATUAL.$uri;
    }else{
        //verifica se tem ? na url, ou seja, se já tem parametros
        if(strpos($URI_ATUAL, "?") == false){
            return $HOST_ATUAL.$URI_ATUAL."?".$paramURL."2";
        }
        return $HOST_ATUAL.$URI_ATUAL."&".$paramURL."2";
    }
}

/**
 * Gera paginação dos posts, caso não seja passado o parametro irá pegar a variável global $wp_query.
 *
 * @param int $maxNumberPages numero de páginas da query
 * 
 * @return string|null Uma string conteno o link previo ou posterior da página
 * @author Vinicius de Santana
 * @example get_prev_page_link( wp_query->max_num_pages);
 * @version 0.2.1 second version
 */
function get_prev_page_link($maxNumberPages=null) {
    $maxNumberPages = $maxNumberPages ? $maxNumberPages : $wp_query->max_num_pages;
    $paged = $_GET['sheet'];
    $HOST_ATUAL = "http://$_SERVER[HTTP_HOST]";
    $URI_ATUAL = "$_SERVER[REQUEST_URI]";
    
    /*variável para evitar que o numero de pagina seja confundido 
    com qualquer categoria que o usuário venha criar que contenha números*/
    $paramURL = "sheet=";
    //pedido de link prévio
    //se está na primeira página, nao tem pagina anterior
    if(!isset($paged) || $paged == 1) return null;
    //tome página
    $uri = str_replace($paramURL.$paged, $paramURL.($paged-1), $URI_ATUAL);
    return $HOST_ATUAL.$uri;
}