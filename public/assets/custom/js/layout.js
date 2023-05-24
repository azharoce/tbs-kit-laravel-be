function menu(data){
    $.ajax({
        type: "GET",
        url: "http://localhost:8000/api/dashboard",
        dataType:"json",
        success: function(response){
            if(typeof response['css'] !== 'undefined') {
                css ="";
                response['css'].forEach(element => {
                    css +='<link href="'+element+'" rel="stylesheet" type="text/css" />';
                });
                $( ".append_css" ).replaceWith(css);
            }
            
            if(typeof response['js'] !== 'undefined') {
                alert('ada');
            }

        }
    });
}
