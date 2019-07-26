 // initializez tabelul din pagina de listare
 $(document).ready(function() {
    $('#example').DataTable();
} );
// adaug un content modalului in functie de tipul de actiune pe care o fac
$('#exampleModal').on('show.bs.modal', function(e){
  console.log($(e.relatedTarget).data('type'))
  if($(e.relatedTarget).data('type') == 'change'){
    $(this).find('.modal-body').html("Are you sure you want to change the status?");
  }else if($(e.relatedTarget).data('type') == 'delete'){
    $(this).find('.modal-body').html("Are you sure you want to delete this ticket?");
  }
    $(this).find('.yes').attr('href', $(e.relatedTarget).data('href'));
});
// verific cand schimba status
$('#status').on('change', function(e){
  $('#search-status').submit();
})
  // fortez footerul sa ramana in partea inferioara a paginii indiferent de height-ul contentului
    $(document).ready(function() {
        setInterval(function() {
            var docHeight = $(window).outerHeight();
            var footerHeight = $('#footer').outerHeight();
            var footerTop = $('#footer').position().top + footerHeight;
            var marginTop = (docHeight - footerTop + 10);

            if (footerTop < docHeight)
                $('#footer').css('margin-top', marginTop + 'px'); // padding of 30 on footer
            else
                $('#footer').css('margin-top', '0px');
            // console.log("docheight: " + docHeight + "\n" + "footerheight: " + footerHeight + "\n" + "footertop: " + footerTop + "\n" + "new docheight: " + $(window).height() + "\n" + "margintop: " + marginTop);
        }, 250);
    });