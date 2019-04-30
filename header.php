<!doctype html>
<html lang="en">
  <head>
    <title>DMS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <link rel="stylesheet" href="jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="datatable/datatables.min.css"/>
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2969779362648179",
    enable_page_level_ads: true
  });


  $( function() {
    $( "#dateFrompicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $( "#dateTopicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });



function initiateTable(){

   $('#Mytable').DataTable( {
                    
   });
}


$(document).ready(function(){ 
        


        
}); //end of document


  //message alertbox
function successMsg(msg){
  $(".msg").fadeIn(1000).html(msg).fadeOut(7000);
 // $(".msg").html(msg);
}
</script>


</head>
<body>
