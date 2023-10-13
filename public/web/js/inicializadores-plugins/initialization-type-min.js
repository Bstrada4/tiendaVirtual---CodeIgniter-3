$(function(){
    $(".h1_typed").typed({
        strings: ["FILMACIÓN Y FOTOGRAFÍA EMPRESARIAL"],
        typeSpeed: 50,
        backDelay: 3000,
        loop: true,
        // defaults to false for infinite loop
        loopCount: false,
        callback: function(){ foo(); }
    });
    function foo(){ console.log("Callback"); }
});