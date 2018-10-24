var imageFolder = "/Web_Data/img/";


function $(selector) {

   var self = {};
    self.selector = selector;
    self.element = document.querySelector(self.selector);
 

 self.html = function (value) {

if(!value) {

    htmlValue = self.element.innerHTML;
    return htmlValue;
}

else {

    self.element.innerHTML = value;
return self;
}

 }

 self.text = function(value) {

    if(!value)  {

        texDoc = self.element.innerText;
        return textDoc;
    }

    else {

        self.element.innerText = value;
        return self;
    }
 }

 self.placeholder = function(value) {
    if (self.element.nodeName == "TEXTAREA" || self.element.nodeName == "INPUT") {

    if(!value) {

         place = self.element.getAttribute('placeholder');
         return place; 
    }
    else {

self.element.setAttribute('placeholder' , value);
return self;

    }
}
else {

    console.log('only input and textarea elements are allowed');
    return self;
}
 }

self.checked = function (bool){
if(bool) {
self.element.checked = bool;

return self; 
}

else {

    return self.element.checked;
}

}

self.value = function (value) {

 //   if(self.element.nodeName == "INPUT" || self.element.nodeName == "TEXTAREA"){
if(value) {

    self.element.value = value;
    return self;
}

else {

val = self.element.value;
return val;

}
//}
/*else {

        console.log('Only input andd textarea elements are allwed');
      return self;
    }

*/
    

    }
    self.attr = function(attr , value) {

        if(!value && attr) {

            var propValue = self.element.getAttribute(attr);
            return propValue;
        }

        else if(attr && value) {
self.element.setAttribute(attr , value);
return self;

        }
    }

    self.css = function (prop, value) {

        if (prop && value) {

            self.element.style[prop] = value;
            return self;
        }

        else if (!value && prop && typeof prop == "object") {
            var objLength = Object.keys(prop).length;
            for (var i = 0; i < objLength; ++i) {

                self.element.style[Object.keys(prop)[i]] = prop[Object.keys(prop)[i]];

            }
            return self;



        }

        else if (prop) {

            return self.element.style[prop];
        }
    }

self.on = function(event , func) {
if(window.addEventListener){
    self.element.addEventListener(event , func);
    return self;
}
else if(window.attachEvent){

self.element.attachEvent('on'+event , func);
return self;

}

}

return self;

}



