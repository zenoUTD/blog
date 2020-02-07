$(".code-inputs").keyup(function () {
if (this.value.length == this.maxLength) {
  $(this).next('.code-inputs').focus();
}
});

$('.code-input').children().last().keyup(function (){
 $(".code-inputs").blur(); 
});
