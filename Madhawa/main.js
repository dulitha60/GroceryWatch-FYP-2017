$(document).ready(function(){
    
    
    product();

    
    function product(){
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {getProduct:1},
            success : function(data){
        
                $("#get_product").html(data);
            
        }
        })
    }
    
   $("body").delegate(".category","click",function(event){
        
        event.preventDefault();
        var cid = $(this).attr('cid');
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {get_selected_Category:1, Cat_id:cid},
            success : function(data){
        
                $("#get_product").html(data);
            
        }
        })
        
        
    })
    

        
        
    })

    cart_count(); 
    $("body").delegate("#product","click",function(event){
        event.preventDefault();
        var p_id = $(this).attr('pid');
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {addToCart:1, proId:p_id},
            success : function(data){
                          $("#product_msg").html(data);
                
        cart_count(); 
               
        }
        })
    })
    cart_container();
    function cart_container(){
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {getCartProduct:1},
            success : function(data){
               $("#cart_product").html(data);           
        }
     })
    };
    
    function cart_count(){
          $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {cart_count:1},
            success : function(data){
               $(".badge").html(data);           
        }
          })
    }
    
    $("#cart_container").click(function(event){
        event.preventDefault();
        $.ajax({
            url     : "action.php",
            method  : "POST",
            data    : {getCartProduct:1},
            success : function(data){
               $("#cart_product").html(data);           
        }
     })
    
    });
     cart_checkout();
    function cart_checkout(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {cart_checkout:1},
            success: function(data){
                 $("#cart_checkout").html(data);                     
            }
        })
    }
     
    $("body").delegate(".qty","keyup",function(){
        var pid = $(this).attr("pid");
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = qty * price;
        $("#total-"+pid).val(total);
    
    })
    

    
    $("body").delegate("#page","click",function(){
        var pn = $(this).attr("page");
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {getProduct:1, setPage:1, pageNumber:pn},
            success : function(data){
            $("#get_product").html(data);
        }
        })
    })
})

