
  $(document).ready(function() {
 
    "use strict";
    $.ajax({
      url:'dashboardTomonth',
      cache:false,
      dataType:"json",
      success : function(data){
        
    //alert(data[2]);
      function readBar(){
        var ret = [];

        for(var i=0;i<data.length;i++){

          ret.push({
            y:data[i]['month'],
            a:data[i]['value']
          });
        }

        return ret;
      }            

       
      //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-example',
      resize: true,
      data: 
        readBar(),

      barColors: ['#00a65a'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['ยอดขาย',''],
      hideHover: 'auto'
    });





      }
    });

 
   
    

Morris.Donut({
  element: 'donut-example',
  resize: true,
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ]
});

Morris.Donut({
  element: 'donut-example1',
  resize: true,
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ]
});


  });
