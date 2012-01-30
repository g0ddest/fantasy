/**
 *
 * @title jQuery Fantasy Worlds API Core v0.1
 * @author Vitaliy Velikodniy, 2012
 * 
 * This is a core script to manage all requests
 * and controlling all view.
 * Here is defining all main making functions.
 * 
 * Need for actual jQuery framework. Tested on
 * versions: 1.7, 1.7.1
 *
 */

/*
 *   Global Vars Block.
 * Use this vars to configure your api usage.
 * 
 */

/*
 *  Timeout of making ajax request in ms.
 *  Origin value is 5000
 */
var requesttimeout = 5000;

/*
 *  URL Path to api.
 *  Origin value is "/api"
 */
var pathToAPI = "api";

/*
 * API Domain name.
 * Origin value is "" for local server.
 */

var domainName = "";

/*
 * Ajax return data.
 * Origin is "json". Use "jsonp" for
 * crossdomain requests.
 */

var ajaxreturn = "json";

/*
 * Asyncing requests.
 * Origin value is true. Use false for
 * crossdomian requests.
 */

var ajaxasync = true;

/*
 * Enable/disable cahe of requests. Use for
 * jsonp data.
 * Origin value is true;
 */

var jsonpcaching = true;

var ajaxcontenttype = "application/x-www-form-urlencoded";

/*
 *   End of Global Vars Block.
 */

/**
 * Makes an request to server. There are params:
 * 
 * @param request This is type of HTTP request.
 * Supporting GET, POST, PUT, DELETE requests.
 * 
 * @param urlparams Params to make URL. See
 * more in constructURL help.
 * 
 * @param requestObject Must be key-value array, or
 * valid string.
 * 
 */

function doRequest(request, urlparams, requestObject){

    var json;
    apiurl = "";

    try{
         apiurl = constructURL(urlparams);
    }
    catch(e){
        throw e;
    }

    $.ajax({

        async: ajaxasync,
        cache: jsonpcaching,
        contentType: ajaxcontenttype,
        data: requestObject,
        dataType: ajaxreturn,
        type: request,
        //username: user, // 
        //password: pass, // UNCOOMENT FOR HTTP AUTHENTICATION === NUCLEAR WAR
        url: apiurl,
        success: function( data ) { json = data; },
        statusCode: {
            400: function(){ throw { code: "400", message: "Неверный запрос" }; },
            401: function(){ throw { code: "401", message: "Авторизируйтесь, пожалуйста" }; },
            402: function(){ throw { code: "402", message: "Это - платная услуга" }; },
            403: function(){ throw { code: "403", message: "Запрещено" }; },
            404: function(){ throw { code: "404", message: "Ничего не найдено" }; },
            409: function(){ throw { code: "409", message: "Такой объект уже существует" }; },
            410: function(){ throw { code: "410", message: "Объект удален" }; },
            425: function(){ throw { code: "425", message: "Объект заблокирован" }; }
        }

    });

    return json;

}

/**
 * Function to make url for request.
 * 
 * @param params Associative array, that must
 * contain:
 * 
 * * * module This is name of module you are
 * requesting. E.g. blog, users.
 * 
 * * * datatype of responding materials.
 * E.g. id, page. Nullable.
 * 
 * * * id Contains ID of material. Nullable.
 * 
 */

function constructURL(params){
    
    delimiter = '/';
    
    url = new Array(domainName, pathToAPI);

    if(params.module){
        
        url.push(params.module);

        if(params.id && params.datatype){
            
            url.push(params.datatype + params.id);
            
        }

    }else throw {code: 400, message: "No module name"};
    url.push("");
    return url.join(delimiter);
    
}