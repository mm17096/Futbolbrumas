var query ={
    q: function(selector){
        return document.querySelector(selector)
    },
    qall:function(selector){
        return document.querySelectorAll(selector);
    },
    id:function(selector){
        return document.getElementById(selector);
    },
    names:function(selector){
        return document.getElementsByName(selector);
    },
    atr:function(selector, atributo){
        return selector.getAttribute(atributo);
    }
    
}
