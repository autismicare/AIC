<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main_v4.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script type="text/javascript" src="js/to-top-to-btm.js"></script>

<title>Autism I Care</title>

<?php
  include('as.php');

  session_start();
  $tree = "";
  $db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
  if (isset($_REQUEST['json'])) {
    $tree = mysqli_real_escape_string($db, $_REQUEST['tree']);

  }
  
  $query1 = "SELECT F_name,F_icon, count(distinct(Tracker_ID)) as frequency from demo$uid where B_name = '$tree' group by F_name,F_icon order by frequency desc";
  $results = mysqli_query($db,$query1);
  //initialize the array to store the processed data
  $jsonArray = array();
  //check if there is any data returned by the SQL Query
  if ($results->num_rows > 0) {
    //Converting the results into an associative array
    while($row = $results->fetch_assoc()) {
      $jsonArrayItem = array();
      $jsonArrayItem['label'] = $row['F_name'];
      $jsonArrayItem['value'] = $row['frequency'];
      $jsonArrayItem['icon'] = $row['F_icon'];
      
      
      //append the above created object into the main array.
      array_push($jsonArray, $jsonArrayItem);
    }
  }
  $fp = fopen($uid, 'w');
    fwrite($fp, json_encode($jsonArray));
    fclose($fp);




  $query = "SELECT W_name,W_icon, count(distinct(Tracker_ID)) as frequency from demo$uid where B_name = '$tree' group by W_name,W_icon order by frequency desc";
  $result = mysqli_query($db,$query);
  //initialize the array to store the processed data
  $jsonArray1 = array();
  //check if there is any data returned by the SQL Query
  if ($result->num_rows > 0) {
    //Converting the results into an associative array
    while($row1 = $result->fetch_assoc()) {
      $jsonArrayItem1 = array();
      $jsonArrayItem1['label'] = $row1['W_name'];
      $jsonArrayItem1['value'] = $row1['frequency'];
      $jsonArrayItem1['icon'] = $row1['W_icon'];
      
      
      //append the above created object into the main array.
      array_push($jsonArray1, $jsonArrayItem1);
    }
  }
  $fp = fopen('a'.$uid, 'w');
    fwrite($fp, json_encode($jsonArray1));
    fclose($fp);
?>
</head>
<body>
    
<!-- Start Top Nav Bar -->
  <!-- Top Nav bar -->
<?php include ('navBar_login.php'); ?><br><br>
<!-- Top Nav bar -->

  <button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
  <button class="sticky btn btn-secondary" action="action" onclick="window.history.go(-1); return false;" id="backBtn" title="BACK">BACK</button>  
  <button onclick="bottomFunction()" id="bottomBtn" title="Go to bottom" style="background-color:red;"><i class="fas fa-arrow-down"></i></button>

<!-- End Top Nav Bar -->
  <div class="container shadow p-3 mt-5">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <br>
    <div id="containerss" align="center"></div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <br>
      <div id="containers" align="center"></div>
      <br>
    </div>
  </div>
  </div>
  <div id="Tooltip" style="display:none;">
    <div id="displayAirports">
        <div id="value" style="float:left;">
            <span id="label" style="margin-left: -5px;">Frequency:</span>
            <b style="margin-left: 5px">${value}</b>
        </div>
    </div>
</div>
<!-- style for tooltip template -->

<style class="cssStyles">
    #displayAirports {
        border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 6px;
        padding-top: 6px;
        background: #EFEFEF;
        height: 45px;
        width: 140px;
        border: 1px #919191;
        box-shadow: 0px, 2px;
    }

    #value {
        margin-top: 5px;
        color: #585C60;
        font-family: Roboto-Bold;
        font-size: 16px;
    }
</style>


<!-- source link -->
<script src="js/index.min.js"></script>
<script src="js/treemap.min.js"></script>
<script> 
!function(e){function t(t){for(var r,a,i=t[0],p=t[1],u=t[2],s=0,f=[];s<i.length;s++)a=i[s],n[a]&&f.push(n[a][0]),n[a]=0;for(r in p)Object.prototype.hasOwnProperty.call(p,r)&&(e[r]=p[r]);for(c&&c(t);f.length;)f.shift()();return l.push.apply(l,u||[]),o()}function o(){for(var e,t=0;t<l.length;t++){for(var o=l[t],r=!0,i=1;i<o.length;i++){var p=o[i];0!==n[p]&&(r=!1)}r&&(l.splice(t--,1),e=a(a.s=o[0]))}return e}var r={},n={12:0},l=[];function a(t){if(r[t])return r[t].exports;var o=r[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,a),o.l=!0,o.exports}a.m=e,a.c=r,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(a.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(o,r,function(t){return e[t]}.bind(null,r));return o},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="";var i=window.webpackJsonp=window.webpackJsonp||[],p=i.push.bind(i);i.push=t,i=i.slice();for(var u=0;u<i.length;u++)t(i[u]);var c=p;l.push([22,0]),o()}({22:function(e,t,o){var r,n;r=[o,t,o(0),o(8)],void 0===(n=function(e,t,o,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),o.enableRipple(window.ripple),r.TreeMap.Inject(r.TreeMapTooltip,r.TreeMapLegend),t.treemapload=function(e){var t=location.hash.split("/")[1];t=t||"Material",e.treemap.theme=t.charAt(0).toUpperCase()+t.slice(1)},new r.TreeMap({load:t.treemapload,tooltipSettings:{visible:!0,template:"#Tooltip"},titleSettings:{text:"The Weather related to <?php echo $tree; ?> and their frequencies are : ",textStyle:{size:"15px"}},
dataSource:new r.TreeMapAjax("<?php echo 'a'.$uid ?>"),weightValuePath:"value",equalColorValuePath:"value",legendSettings:{visible:!0,position:"Top",shape:"Rectangle"},leafItemSettings:{showLabels:!0,labelPath:"label",labelPosition:"Center",labelStyle:{size:"13px"},fill:"#6699cc",border:{width:1,color:"white"},colorMapping:[{value:30,color:"#FBFBFB"},{value:29,color:"#C5C5C5"},{value:28,color:"#FAFAFA"},{value:27,color:"#8E8E8E"},{value:26,color:"#F2F2F2"},{value:25,color:"#FFE5BC"},{value:24,color:"#95659A"},{value:23,color:"#529A86"},{value:22,color:"#FCD2AB"},{value:21,color:"#DDF909"},{value:20,color:"#F6CDE6"},{value:19,color:"#ADD9FE"},{value:18,color:"#007D75"},{value:17,color:"#EC6778"},{value:16,color:"#FA6E4F"},{value:15,color:"#F2CF59"},{value:14,color:"#FB8E7E"},{value:13,color:"#C5D7C0"},{value:12,color:"#8EC9BB"},{value:11,color:"#F8CA9D"},{value:10,color:"#DFBFBF"},{value:9,color:"#3599B8"},{value:8,color:"#A66999"},{value:7,color:"#FE9666"},{value:6,color:"#8AD4E8"},{value:5,color:"#7F898A"},{value:4,color:"#F2C80F"},{value:3,color:"#FD625E"},{value:2,color:"#374649"},{value:1,color:"#01B8AA"}],
labelTemplate: '<img src="{{:icon}}" style="width:50%;height:50%;margin-top:25%;margin-right:100%"/>'}}).appendTo("#containers")}.apply(t,r))||(e.exports=n)}});
</script>

<script> 
!function(e){function t(t){for(var r,a,i=t[0],p=t[1],u=t[2],s=0,f=[];s<i.length;s++)a=i[s],n[a]&&f.push(n[a][0]),n[a]=0;for(r in p)Object.prototype.hasOwnProperty.call(p,r)&&(e[r]=p[r]);for(c&&c(t);f.length;)f.shift()();return l.push.apply(l,u||[]),o()}function o(){for(var e,t=0;t<l.length;t++){for(var o=l[t],r=!0,i=1;i<o.length;i++){var p=o[i];0!==n[p]&&(r=!1)}r&&(l.splice(t--,1),e=a(a.s=o[0]))}return e}var r={},n={12:0},l=[];function a(t){if(r[t])return r[t].exports;var o=r[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,a),o.l=!0,o.exports}a.m=e,a.c=r,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(a.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(o,r,function(t){return e[t]}.bind(null,r));return o},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="";var i=window.webpackJsonp=window.webpackJsonp||[],p=i.push.bind(i);i.push=t,i=i.slice();for(var u=0;u<i.length;u++)t(i[u]);var c=p;l.push([22,0]),o()}({22:function(e,t,o){var r,n;r=[o,t,o(0),o(8)],void 0===(n=function(e,t,o,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),o.enableRipple(window.ripple),r.TreeMap.Inject(r.TreeMapTooltip,r.TreeMapLegend),t.treemapload=function(e){var t=location.hash.split("/")[1];t=t||"Material",e.treemap.theme=t.charAt(0).toUpperCase()+t.slice(1)},new r.TreeMap({load:t.treemapload,tooltipSettings:{visible:!0,template:"#Tooltip"},titleSettings:{text:"The Factors related to <?php echo $tree; ?> and their frequencies are : ",textStyle:{size:"15px"}},
dataSource:new r.TreeMapAjax("<?php echo $uid ?>"),weightValuePath:"value",equalColorValuePath:"value",legendSettings:{visible:!0,position:"Top",shape:"Rectangle"},leafItemSettings:{showLabels:!0,labelPath:"label",labelPosition:"Center",labelStyle:{size:"13px"},fill:"#6699cc",border:{width:1,color:"white"},colorMapping:[{value:30,color:"#FBFBFB"},{value:29,color:"#C5C5C5"},{value:28,color:"#FAFAFA"},{value:27,color:"#8E8E8E"},{value:26,color:"#F2F2F2"},{value:25,color:"#FFE5BC"},{value:24,color:"#95659A"},{value:23,color:"#529A86"},{value:22,color:"#FCD2AB"},{value:21,color:"#DDF909"},{value:20,color:"#F6CDE6"},{value:19,color:"#ADD9FE"},{value:18,color:"#007D75"},{value:17,color:"#EC6778"},{value:16,color:"#FA6E4F"},{value:15,color:"#F2CF59"},{value:14,color:"#FB8E7E"},{value:13,color:"#C5D7C0"},{value:12,color:"#8EC9BB"},{value:11,color:"#F8CA9D"},{value:10,color:"#DFBFBF"},{value:9,color:"#3599B8"},{value:8,color:"#A66999"},{value:7,color:"#FE9666"},{value:6,color:"#8AD4E8"},{value:5,color:"#7F898A"},{value:4,color:"#F2C80F"},{value:3,color:"#FD625E"},{value:2,color:"#374649"},{value:1,color:"#01B8AA"}],
labelTemplate: '<img src="{{:icon}}" style="width:50%;height:50%;margin-top:25%;margin-right:100%"/>'}}).appendTo("#containerss")}.apply(t,r))||(e.exports=n)}});
</script>

</body>
</html>
