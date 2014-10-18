
// Load blockui library
$.getScript( "themes/"+__configTheme+"/js/blockui.js");


// Load spin  loader library
$.getScript( "themes/"+__configTheme+"/js/spin.min.js");

/**
 * Generate ajax loader
 * @param elem
 */
function ajaxLoad(elem)
{

    elem.block({
        message: '<div id="ajax-loader" ></div>',
        css: {
            padding: 0,

            width: '70px',
            height:'70px',
            top: '10%',
            marginTop:'-35px',
            marginLeft:'35px',
            left: '50%',
            textAlign: 'center',
            color: '#000',
            border: '',
            backgroundColor: '',
            cursor: 'wait'
        },
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.6,
            cursor: 'wait'
        }

    });

    var opts = {
        lines: 9, // The number of lines to draw
        length: 0, // The length of each line
        width: 10, // The line thickness
        radius: 20, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 51, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#333', // #rgb or #rrggbb or array of colors
        speed: 1.3, // Rounds per second
        trail: 51, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: '0', // Top position relative to parent
        left: '0' // Left position relative to parent
    };
    var target = document.getElementById('ajax-loader');
    var spinner = new Spinner(opts).spin(target);

}

/**
 * Generate alert message
 * @param title Message title
 * @param type Message type: success|error|info|notice
 * @param text Additional text
 */
function boAlert(title,type)
{
var options = {
    'icon':'',
    'class':'',
    'title':"<h5>"+title+"</h5>",
    'text':""
};

    var text = arguments[2]||'';

    if(text && text!='')
    {
        options.text = "<p>"+text+"</p>";
    }


switch (type)
{
    case 'success':{
        options.class = 'msg-success' ;
        options.icon = 'fa-check-square-o'
        break;
    }
    case 'error':{
        options.class = 'msg-error' ;
        options.icon = 'fa-exclamation-triangle'
        break;
    }

    case 'notice':{
        options.class = 'msg-notice' ;
        options.icon = 'fa-exclamation'
        break;
    }
    case 'info':{
        options.class = 'msg-info' ;
        options.icon = 'fa-info'
        break;
    }
}


    var $grow = $("<div/>",{
        'class':'boAlert '+options.class
    });

    var html = '<span class="close-boAlert" onclick="hideBoAlert()"><i class="fa fa-times fa-lg"></i></span>' +
        '<table class="boAlert-table">' +
        '<tr>' +
        '<td class="boAlert-icon "><i class="fa '+options.icon+'"></i></td>' +
        '<td class="boAlert-message">'+options.title+options.text+'</td></tr></table> ';

$grow.html(html);

;
    $.blockUI({
        message: $grow,
        fadeIn: 700,
        fadeOut: 700,
        timeout: 2000,
        showOverlay: false,
        centerY: false,
        baseZ: 9999999999999,
        css: {
            width: '',
            top: '0',
            left: '0',
            right: '0',
            border: 'none',
            padding: '0',
            backgroundColor:'none',
            cursor:         'default'


        },
        growlCSS:{
            opacity:0.85
        }
    });

}

function hideBoAlert()
{
    $('.blockUI').fadeOut(700).remove();
}

