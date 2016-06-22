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
<!--
<div class="row-fluid">
    
	<div class="span9">
      <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-picture"></span>Operations Chart',
			'titleCssClass'=>''
		));
		?>
        
        <div class="auto-update-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
        
	</div>
	<div class="span3">
		<div class="summary">
          <ul>
          	<li>
          		<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/credit.png" width="36" height="36" alt="Monthly Income">
                </span>
                <span class="summary-number">$78,245</span>
                <span class="summary-title"> Monthly Income</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/page_white_edit.png" width="36" height="36" alt="Open Invoices">
                </span>
                <span class="summary-number">125</span>
                <span class="summary-title"> Open Invoices</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/page_white_excel.png" width="36" height="36" alt="Open Quotes<">
                </span>
                <span class="summary-number">53</span>
                <span class="summary-title"> Open Quotes</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/group.png" width="36" height="36" alt="Active Members">
                </span>
                <span class="summary-number">654,321</span>
                <span class="summary-title"> Active Members</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/folder_page.png" width="36" height="36" alt="Recent Conversions">
                </span>
                <span class="summary-number">630</span>
                <span class="summary-title"> Recent Conversions</span></li>
        
          </ul>
        </div>

	</div>
</div>


-->



          
<?php 
/*$count  = Yii::app()->db->createCommand()->select('COUNT(p.photo_id) AS num')
    ->from('photo AS p')
    ->join('event_has_photo AS ehp','ehp.photo_id=p.photo_id')
    ->where('p.original_id="'.$data->id.'" AND ehp.event_id='.$event_id)
    ->queryAll();
    */
/*    
$count = Yii::app()->db->createCommand()
->select('data.type_id,type_name,SUM(qty) AS qty')
->from('arrest_data as data')
->join('arrest_type AS type','type.type_id=data.type_id')
->group('type_id') 
->queryAll();
*/
$count = Yii::app()->db->createCommand()
->select('d.type_id,type_name,day(arrest_date) as arrest_day,sum(qty) as qty')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->where('month(arrest_date)=9 and year(arrest_date)=2015  and d.type_id=1')
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
            $vardatas .="[$n,". $qty."],\n";
        }   
    }
}
$day=date('j');
$month=date('n');
$year=date('Y');
$data ="d1";
$vardatas = substr($vardatas,0,strlen($vardatas)-2);
$vars .="var ".$data." =[".$vardatas."];";

$legend= '{ label: "'.$type_name.'", data: d1, lines: {fillColor: "#f2f7f9"}, points: {fillColor: "#88bbc8"} }';
?>
<?php 
////////
$count = Yii::app()->db->createCommand()
->select('d.type_id,type_name')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->group('t.type_id') 
->queryAll();
var_dump($count);
 foreach ($count as $key => $value) {
        $type_name =$value['type_name'];
        if ($day == $n) {
            $vardatas .="[$day,". $qty."],\n";
            break;       
        }else{
            $qty =0;
            $vardatas .="[$n,". $qty."],\n";
        }   
    }
/*
$count = Yii::app()->db->createCommand()
->select('d.type_id,type_name,day(arrest_date) as arrest_day,sum(qty) as qty')
->from('arrest_data as d')
->join('arrest_type AS t','t.type_id=d.type_id')
->where('month(arrest_date)=9 and year(arrest_date)=2015  and d.type_id=1')
->group('t.type_id,day(arrest_date)') 
->queryAll();
*/
 ?>
  <div class="row-fluid">
<!--  <div class="span6">
    <div class="portlet" id="yw3">
<div class="portlet-decoration">
<div class="portlet-title"><i class='icon-repeat'></i> Bar chart</div>
</div>
<div class="portlet-content">
        <div class="horizontal-bars-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
    </div>
</div>  </div>-->

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
    if (divElement.hasClass('lines-chartxx')) {
    $(function () {
        //some data
//      var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
//      var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
    
        <?php echo $vars; ?>
        //var d1 =[[1,1.00],[2,6],[3,12],[4,5]];
        //var d2 =[[1,14.00]]; var d3 =[[1,11.00]]; var d4 =[[1,5.00]]; var d5 =[[1,30.00]]; var d6 =[[1,7.00]]; var d7 =[[1,52.00]]; 
        //define placeholder class
        var placeholder = $(".lines-chartxx");
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
        var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
        var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
        var d3 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
        <?php echo $datavisitors; ?>
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

                {
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
                , 
                {   
                    label: "Unique xxx", 
                    data: d3,
                    //lines: {fillColor: "#fff8f2"},
                    //points: {fillColor: "#ed7a53"}
                } 

            ], options);
            
    });
    }//end if 
    if (divElement.hasClass('visitors-chartx')) {
    $(function () {
        //some data
        var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
        var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
        //define placeholder class
        var placeholder = $(".visitors-chartx");
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

  <div class="span6">
    <div class="portlet" id="yw4">
        <div class="portlet-decoration">
            <div class="portlet-title"><i class='icon-share'></i> สถิติการจับกุม</div>
        </div>
    <div class="portlet-content">
        <div class="lines-chartxx" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>        
    </div>
    </div>
</div>
</div>

  /////////////
 <div class="span6">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"<i class='icon-arrow-up'></i> Data Usage Monthly",
        ));
        
    ?>
        <div class="order-bars-chartx" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>
</div>


  <div class="span12">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"<i class='icon-user'></i> ผู้หลบหนีเข้าเมือง",
        ));
        
    ?>
        <div class="visitors-chart-new" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
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