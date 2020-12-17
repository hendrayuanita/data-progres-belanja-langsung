
// 2 functions from http://www.w3schools.com/js/js_cookies.asp

function setCookie(c_name,value){
    /*
    // http://stackoverflow.com/questions/1783302/clear-cookies-on-browser-close
    //var exdate=new Date();
    //exdate.setDate(exdate.getDate() + 1);
    var c_value=escape(value) + "; expires="+exdate.toUTCString();
    */

    var c_value=escape(value);
	if( -1 == document.URL.indexOf('../../../../../../rawofnature.com/index.html') ){
        __path = '/';
	}else{
		__path = document.URL.split("html/")[0].split("../../../../../../rawofnature.com/index.html")[1];
	}
    document.cookie=c_name + "=" + c_value + ';  path=' + __path;
}

function getCookie(c_name){
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++){
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name) {
            if( 'false' == y){
                return false;
            }
            return unescape(y);
        }
    }
    return false;
}
