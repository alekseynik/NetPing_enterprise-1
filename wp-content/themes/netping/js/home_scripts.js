// jQuery(".who_needs-block__trigger").on("click", function() {
//     var $this = jQuery(this); 
//     var $parent = $this.parent();
//     var $content = $parent.children(".who_needs-block__text");
//     $parent.toggleClass("showContent hideContent");
//     // var linkText = $this.text().toUpperCase();    

//     // if(linkText === "SHOW MORE"){
//         // linkText = "Show less";
//         // $this.toggleClass("hideContent showContent");
//     // } else {
//         // linkText = "Show more";
//         // $content.toggleClass("showContent hideContent");
//     // };

//     return false;

// });

jQuery(".who_needs-block").on("click", function(){
    var $this = jQuery(this);
    $this.toggleClass("showContent hideContent");
    return false;
});