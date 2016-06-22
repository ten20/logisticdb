<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
	array('id'=>4, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
));
?>
<!--
<h3>ยินดีต้อนรับ <?php echo Yii::app()->user->name;?> เข้าสู่ระบบ <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h3>
 <?php 
echo CHtml::label('* ผู้ดูแลระบบเท่านั้นสามารถเข้าระบบโดยใช้ Username และ Password ของ อีเมล์ ทร.','checkbox-id',array('class'=>'red','hidden'=>Yii::app()->user->id));         
?>
<style>
.red{
     color: red;
}
</style>

<div class="row-fluid">
     <h3><b>ความสามารถของระบบ</b></h3>
     <ul>
      <li>
        บันทึกข้อมูลการจับกุม
      </li>
      <li>
        รายงานข้อมูลการจับกุม
      </li>
   </ul>
 </div>
 <hr/>-->
          
<?php 

$day=date('j');
$month=date('n');
$year=date('Y');
$data ="d1";
$type_id ="1";
$arrest_type = Yii::app()->db->createCommand()
->select('d.type_id,type_name')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->group('d.type_id') 
->queryAll();
//var_dump($arrest_type);
foreach ($arrest_type as $key => $value) {
        echo $type_id =$value['type_id'];
        echo $type_name =$value['type_name'];
    }

$count = Yii::app()->db->createCommand()
->select('d.type_id,type_name,day(arrest_date) as arrest_day,sum(qty) as qty')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->where("month(arrest_date)=$month and year(arrest_date)=$year  and d.type_id=$type_id")
->group('day(arrest_date)') 
->queryAll();

//var_dump($count[2]['type_id']);
$d=1;
$date=date("Y-m-d");
$enddate = date('t',strtotime($date));

for($n=1;$n<=$enddate;$n++){
    foreach ($count as $key => $value) {
        $day =$value['arrest_day'];
        $type_name =$value['type_name'];
        $qty = $value['qty'];
        if ($day == $n) {
            $vardatas .="[$day,". $qty."],\n";
            break;       
        }else{
            $qty =0;
            //$vardatas .="[$n,". $qty."],\n";
        }   
    }
}

$vardatas = substr($vardatas,0,strlen($vardatas)-2);
$vars .="var ".$data." =[".$vardatas."];";

$legend= '{ label: "'.$type_name.'", data: d1, lines: {fillColor: "#f2f7f9"}, points: {fillColor: "#88bbc8"} }';
?>
<?php 
////////หนีเข้าเมือง
$typename = Yii::app()->db->createCommand()
->select('d.type_id,type_name')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->group('t.type_id') 
->queryAll();
//var_dump($typename);

$count = Yii::app()->db->createCommand()
->select('d.type_id,type_name,day(arrest_date) as arrest_day,sum(qty) as qty')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->where("month(arrest_date)=$month and year(arrest_date)=$year  and d.type_id=10")
->group('day(arrest_date)') 
->queryAll();
//var_dump($count);
// for($n=1;$n<=$enddate;$n++){
    foreach ($count as $key => $value) {
        $day =$value['arrest_day'];
        $type_name =$value['type_name'];
        $qty = $value['qty'];
        //if ($day == $n  ) {
            $vardatas_new .="[$day,". $qty."],";
          //  break;       
        /*}else{
            $qty =0;
            $vardatas_new .="[$n,". $qty."],\n";
        } */  
    }
//}
       //var_dump($count);
  for($n=1;$n<=$enddate;$n++){
     $date='date'.$n;
     //echo "<br/>";
    $qty =0;
    $$date = $qty;
        $$date = $qty;

    //echo "<br/>";
}
foreach ($count as $key => $value) {
         $day= $value['arrest_day'];
        $date='date'.$day;
       //$type_name =$count[$n]['type_name'];
       $qty = $value['qty'];
        //$date='date'.$day;
        $$date = $qty;
        //echo $date ."=".$$date;        
        //echo "<br/>";
    }
  
 

     /*for($n=1;$n<=$enddate;$n++){
        echo $n;
        if($n==5)
            break;
     }
     */
     
$vardatas_new = substr($vardatas_new,0,strlen($vardatas_new)-1);
 $vars_new .="var d1 =[".$vardatas_new."];";
//echo $vars_new = "var d1 = [[1,$one], [2,$two ], [3,$three ], [4,$four ],[5,$five ],[6,$six],[7,$seven],[8,$eight],[9,$nine ],[10,$ten ],[11,$eleven ],[12,$twelve ],[13,$thirteen ],[14,$fourteen ],[15,$fifteen ],[16,$sixteen ],[17,$seventeen],[18,$eightteen],[19,$nineteen ],[20, $twenty],[21,$twentyone ],[22,$twentytwo ],[23,$twentythree ],[24,$twentyfour ],[25,$twentyfive ],[26,$twentysix ],[27,$twentyseven],[28,$twentyeight ],[29,$twentynine ], [30,$thirty], [31,$thirtyone]];";
 $enddate="31";
if($enddate==28){
 $vars_new = "var d1 = [[1,$date1], [2,$date2 ], [3,$date3], [4,$date4],[5,$date5],[6,$date6],[7,$date7],[8,$date8],[9,$date9],[10,$date10],[11,$date11],[12,$date12],[13,$date13],[14,$date14],[15,$date15],[16,$date16],[17,$date17],[18,$date18],[19,$date19],[20, $date20],[21,$date21],[22,$date22],[23,$date23],[24,$date24],[25,$date25],[26,$date26],[27,$date27],[28,$date28]];";   
}elseif($enddate==29){
 $vars_new = "var d1 = [[1,$date1], [2,$date2 ], [3,$date3], [4,$date4],[5,$date5],[6,$date6],[7,$date7],[8,$date8],[9,$date9],[10,$date10],[11,$date11],[12,$date12],[13,$date13],[14,$date14],[15,$date15],[16,$date16],[17,$date17],[18,$date18],[19,$date19],[20, $date20],[21,$date21],[22,$date22],[23,$date23],[24,$date24],[25,$date25],[26,$date26],[27,$date27],[28,$date28],[29,$date29]];";   
}elseif($enddate==30){
 $vars_new = "var d1 = [[1,$date1], [2,$date2 ], [3,$date3], [4,$date4],[5,$date5],[6,$date6],[7,$date7],[8,$date8],[9,$date9],[10,$date10],[11,$date11],[12,$date12],[13,$date13],[14,$date14],[15,$date15],[16,$date16],[17,$date17],[18,$date18],[19,$date19],[20, $date20],[21,$date21],[22,$date22],[23,$date23],[24,$date24],[25,$date25],[26,$date26],[27,$date27],[28,$date28],[29,$date29], [30,$date30]];";   
}else{
 $vars_new = "var d1 = [[1,$date1], [2,$date2 ], [3,$date3], [4,$date4],[5,$date5],[6,$date6],[7,$date7],[8,$date8],[9,$date9],[10,$date10],[11,$date11],[12,$date12],[13,$date13],[14,$date14],[15,$date15],[16,$date16],[17,$date17],[18,$date18],[19,$date19],[20, $date20],[21,$date21],[22,$date22],[23,$date23],[24,$date24],[25,$date25],[26,$date26],[27,$date27],[28,$date28],[29,$date29], [30,$date30], [31,$date31]];";   
}

$legend_new= '{ label: "'.$type_name.'", data: d1 , lines: {fillColor: "#f2f7f9"}, points: {fillColor: "#88bbc8"}}';

 ?>

<script type="text/javascript">
//generate random number for charts
randNum = function(){
    //return Math.floor(Math.random()*101);
    return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
}

var chartColours = ['#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];

// document ready function
$(document).ready(function() {
    var divElement = $('div'); //log all div elements
    

    //Lines chart without points
    if (divElement.hasClass('lines-chart-new')) {
    $(function () {
        //some data
//      var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
//      var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
    
        <?php echo $vars; ?>
        //var d1 =[[1,1.00],[2,6],[3,12],[4,5]];
        //var d2 =[[1,14.00]]; var d3 =[[1,11.00]]; var d4 =[[1,5.00]]; var d5 =[[1,30.00]]; var d6 =[[1,7.00]]; var d7 =[[1,52.00]]; 
        //define placeholder class
        var placeholder = $(".lines-chart-new");
        //graph options
        var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f" ,
                    labelMargin: 5,
                    axisMargin: 0, 
                    borderWidth: 0,
                    borderColor:null,
                    minBorderMargin: 5 ,
                    clickable: true, 
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 20
                },
                series: {
                    grow: {active:false},
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 2,
                        steps: false
                        },
                    points: {show:true}
                },
                legend: { position: "se" },
                yaxis: { min: 0 },
                xaxis: {ticks:11, tickDecimals: 0},
                colors: chartColours,
                shadowSize:1,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.0",
                    shifts: {
                        x: -30,
                        y: -50
                    }
                }
            };   
    
            $.plot(placeholder, [ 
                <?php echo $legend ?>
               /* {
                    label: "ยาบ้า", 
                    data: d1,
                    lines: {fillColor: "#f2f7f9"},
                    points: {fillColor: "#88bbc8"}
                }, 
                {   
                    label: "ยาไอซ์", 
                    data: d2,
                    lines: {fillColor: "#fff8f2"},
                    points: {fillColor: "#ed7a53"}
                } */

            ], options);

    });
    }//end if

    //Ordered bars chart
    if (divElement.hasClass('order-bars-chartx')) {
    $(function () {
        //some data
        var d1 = [];
        for (var i = 0; i <= 10; i += 1)
            d1.push([i, parseInt(Math.random() * 30)]);
        var d1 =[[1,10.00],[2,6],[3,12]];
     
        var ds = new Array();
     
         ds.push({
            label: "ยาบ้า",
            data:d1,
            bars: {order: 1}
        });
       /* ds.push({
            label: "Data Two",
            data:d2,
            bars: {order: 2}
        });
        ds.push({
            label: "Data Three",
            data:d3,
            bars: {order: 3}
        });
*/
        var options = {
                bars: {
                    show:true,
                    barWidth: 0.2,
                    fill:1
                },
                grid: {
                    show: true,
                    aboveData: false,
                    color: "#3f3f3f" ,
                    labelMargin: 5,
                    axisMargin: 0, 
                    borderWidth: 0,
                    borderColor:null,
                    minBorderMargin: 5 ,
                    clickable: true, 
                    hoverable: true,
                    autoHighlight: false,
                    mouseActiveRadius: 20
                },
                series: {
                    grow: {active:false}
                },
                legend: { position: "ne" },
                colors: chartColours,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.0",
                    shifts: {
                        x: -30,
                        y: -50
                    }
                }
        };

        $.plot($(".order-bars-chartx"), ds, options);
    });
    }//end if

    //------------- Visitor chart -------------//
    if (divElement.hasClass('visitors-chart-new')) {
    $(function () {
        //some data
        //var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
        //var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
       // var d3 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
        <?php echo $vars_new; ?>
        //define placeholder class
        var placeholder = $(".visitors-chart-new");
        //graph options
        var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f" ,
                    labelMargin: 5,
                    axisMargin: 0, 
                    borderWidth: 0,
                    borderColor:null,
                    minBorderMargin: 5 ,
                    clickable: true, 
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 20
                },
                series: {
                    grow: {
                        active: false,
                        stepMode: "linear",
                        steps: 50,
                        stepDelay: true
                    },
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 4,
                        steps: false
                        },
                    points: {
                        show:true,
                        radius: 5,
                        symbol: "circle",
                        fill: true,
                        borderColor: "#fff"
                    }
                },
                legend: { 
                    position: "ne", 
                    margin: [0,-25], 
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function(label, series) {
                        // just add some space to labes
                        return label+'&nbsp;&nbsp;';
                     }
                },
                yaxis: { min: 0 },
                xaxis: {ticks:11, tickDecimals: 0},
                colors: chartColours,
                shadowSize:1,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.0",
                    shifts: {
                        x: -30,
                        y: -50
                    }
                }
            };   
    
            $.plot(placeholder, [ 
                <?php echo $legend_new; ?>

                /*{
                    label: "Visits", 
                    data: d1,
                   // lines: {fillColor: "#f2f7f9"},
                    //points: {fillColor: "#88bbc8"}
                }, 
                {   
                    label: "Unique Visits", 
                    data: d2,
                    //lines: {fillColor: "#fff8f2"},
                    //points: {fillColor: "#ed7a53"}
                } 
          */

            ], options);
            
    });
    }//end if 
    if (divElement.hasClass('visitors-chart-x')) {
    $(function () {
        //some data
        var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
        var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
        //define placeholder class
        var placeholder = $(".visitors-chart-x");
        //graph options
        var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f" ,
                    labelMargin: 5,
                    axisMargin: 0, 
                    borderWidth: 0,
                    borderColor:null,
                    minBorderMargin: 5 ,
                    clickable: true, 
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 20
                },
                series: {
                    grow: {
                        active: false,
                        stepMode: "linear",
                        steps: 50,
                        stepDelay: true
                    },
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 4,
                        steps: false
                        },
                    points: {
                        show:true,
                        radius: 5,
                        symbol: "circle",
                        fill: true,
                        borderColor: "#fff"
                    }
                },
                legend: { 
                    position: "ne", 
                    margin: [0,-25], 
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function(label, series) {
                        // just add some space to labes
                        return label+'&nbsp;&nbsp;';
                     }
                },
                yaxis: { min: 0 },
                xaxis: {ticks:11, tickDecimals: 0},
                colors: chartColours,
                shadowSize:1,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s : %y.0",
                    shifts: {
                        x: -30,
                        y: -50
                    }
                }
            };   
    
            $.plot(placeholder, [ 

                {
                    label: "Visits", 
                    data: d1,
                    lines: {fillColor: "#f2f7f9"},
                    points: {fillColor: "#88bbc8"}
                }, 
                {   
                    label: "Unique Visits", 
                    data: d2,
                    lines: {fillColor: "#fff8f2"},
                    points: {fillColor: "#ed7a53"}
                } 

            ], options);
            
    });
    }//end if    
    });
    </script>
  <div class="row-fluid">
  <div class="span6">
    <div class="portlet" id="yw4">
        <div class="portlet-decoration">
            <div class="portlet-title"><i class='icon-share'></i> สถิติการจับกุม</div>
        </div>
    <div class="portlet-content">
        <div class="lines-chart-new" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>        
    </div>
  </div>
</div>
</div>

<div class="span12">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"<i class='icon-user'></i> ผู้หลบหนีเข้าเมือง : ".Globals::setDateFormat(date('Y-m-d'),4),
        ));
        
    ?>
        <div class="visitors-chart-new" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>

  <div class="span12">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"<i class='icon-user'></i> ผู้หลบหนีเข้าเมือง",
        ));
        
    ?>
        <div class="visitors-chart-x" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>

  <div class="span6">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"<i class='icon-share'></i> Returning Visitors",
        ));
        
    ?>
        <div class="lines-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>
</div>