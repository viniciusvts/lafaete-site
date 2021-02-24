/**
 * define a url do site, seja local ou web
 * @returns {siteUrl:string}
 * @author Vinicius de Santana
 */
function getSiteUrl(){
    var siteUrl = window.location.protocol+"//"+window.location.hostname;
    if(window.location.hostname == "localhost"){ //dev
      siteUrl += "/lafaete";
    }
    return siteUrl;
}
function logoLink(){
    var siteUrl = getSiteUrl();
    var logo = document.querySelector(".login h1 a");
    logo.href = siteUrl;
}
window.onload = logoLink();