$(document).ready(function(){
    
    cat();
    brand();
    product();
    function cat(){
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {category:1},
            success : function(data){
        
                $("#get_category").html(data);
            
        }
        })
    }
    
    function brand(){
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {brand:1},
            success : function(data){
        
                $("#get_brand").html(data);
            
        }
        })
    }
    
    

    
     $("body").delegate(".selectbrand","click",function(event){
        
        event.preventDefault();
        var bid = $(this).attr('bid');
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {selectbrand:1, brand_id:bid},
            success : function(data){
        
                $("#get_product").html(data);
            
        }
        })
        
        
    })
    
    $("#search_btn").click(function(){
        var keyword = $("#search").val()
        if(keyword != ""){
            
            $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {search:1, keyword:keyword},
            success : function(data){
        
                $("#get_product").html(data);
            
        }
        })
        }
    })
    
    $("#sign_up_btn").click(function(event){
        event.preventDefault();
        $.ajax({
            url     : "register.php",
            method  : "POST",
            data    : $("form").serialize(),
            success : function(data){
        
               $("#signup_msg").html(data);
            
            
        }
        })
    })
    
    $("#login").click(function(event){
        event.preventDefault();
        var email = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
            url     : "log_in.php",
            method  : "POST",
            data    : {userLogin:1, userEmail:email, userPassword:pass},
            success : function(data){
                if(data == "true"){
                    window.location.href = "profile.php";
                }            
        }
        })
    })
  

    

    
    $("body").delegate(".remove","click",function(event){
        event.preventDefault();
        var pid = $(this).attr("remove_id");
         $.ajax({
            url : "action.php",
            method : "POST",
            data : {removeFromCart:1, removeId:pid},
            success: function(data){
                 $("#cartmsg").html(data);  
                cart_checkout();
               
            }
        })
    })
    
    $("body").delegate(".update","click",function(event){
        event.preventDefault();
        var pid = $(this).attr("update_id");
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = $("#total-"+pid).val();
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {updateProduct:1, updateId:pid,qty:qty,price:price,total:total},
            success: function(data){
                 $("#cartmsg").html(data);  
                cart_checkout();
                
               
            }
        })
    })
    page();
    function page(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {page:1},
            success : function(data){
            $("#pageno").html(data);
        }
        })
    }
    

})

