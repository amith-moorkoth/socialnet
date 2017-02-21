window.onload = function() {
    var inputs=document.getElementsByTagName("input");
    inputs_length= inputs.length;
    for(i=0;i<inputs_length;i++)
    { placeholder=inputs[i].getAttribute("placeholder");
      if(placeholder!=""){
        inputs[i].placeholder=placeholder;  
      }  
    }
};

var head_drop=0; //header drop menu items 
var choicer=0;

window.onclick = function() {
     /*closing drop menu at top*/
     if(choicer==0){
     /*document.getElementById("header_drop").childNodes[2].style.display = "none";head_drop=0;*/    
     }else{choicer=0;}
     /*closing dropmenu at top*/
};


function show_tab(a){
var c_n_nodes = document.getElementById("nav-tabs-create").childNodes;
var c_n_length =c_n_nodes.length;
for(i=0;i<c_n_length;i++)
{   if(c_n_nodes[i].className=="active"){
     tab_s_h(c_n_nodes[i],"none");
    }
    c_n_nodes[i].className ="";}
a.className ="active";
tab_s_h(a,"block");
}

function tab_s_h(node_object,value)
{
  var xmlString = node_object.innerHTML
  , parser = new DOMParser()
  , doc = parser.parseFromString(xmlString, "text/xml");

  s=doc.firstChild.getAttribute("href");
  s = s.substr(1); 
  document.getElementById(s).style.display=value;
   
}

var start_yy_mm_dd=0;

function change_yy_mm_dd(){
    if(start_yy_mm_dd==0){start_yy_mm_dd=1;
    for(i=2015;i>=1900;i--){
    document.getElementById("sign_up_year").innerHTML +="<option value="+i+">"+i+"</option>";    
    }
    for(i=1;i<=12;i++){
    document.getElementById("sign_up_month").innerHTML +="<option value="+i+">"+i+"</option>";    
    }
    for(i=1;i<=31;i++){
    document.getElementById("sign_up_date").innerHTML +="<option value="+i+">"+i+"</option>";    
    }
    }
}

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

function check_validate_sign_in(){ 
    var Email = document.forms["sign_in"]["email"];
    var pwd = document.forms["sign_in"]["pwd"];
        if(Email.value!=""&&pwd.value!=""){
         sign_sucess(Email);sign_sucess(pwd);
        if (reg.test(Email.value) == false) 
        {       
            sign_error(Email);
            sign_show_msg(1,"Please provide valid email id");
            return false;
        }else{sign_sucess(Email);}
        if(pwd.value.length<5)
        {
            sign_error(pwd);
            sign_show_msg(1,"Password length should be greater than 5");
            return false;
        }else{sign_sucess(pwd);}
        }else{
            if(Email.value==""){sign_error(Email);}
            if(pwd.value==""){sign_error(pwd);}
            return false;
        }
}

function sign_error(a){
a.style.border = "2px solid red";a.focus();    
}
function sign_sucess(a){
a.style.border = "1px solid black";    
}
function sign_show_msg(a,msg){
    str="";
    if(a==1){str="sign-in_msg";}else{str="sign-up_msg";}
document.getElementById(str).innerHTML="<font color='red'>"+msg+"</font>";
}
function check_validate_sign_up(){
    var Full_Name= document.forms["sign_up"]["Full_Name"];
    var Email = document.forms["sign_up"]["email"];
    var pwd = document.forms["sign_up"]["pwd"];
    var dd = document.forms["sign_up"]["dd"];
    var mm = document.forms["sign_up"]["mm"];
    var yy = document.forms["sign_up"]["yy"];
    var sex = document.forms["sign_up"]["sex"];
    str="Please provide ";
    if(Full_Name.value!=""&&Email.value!=""&&pwd.value!=""&&dd.value!="date"&&mm.value!="month"&&yy.value!="year"&&sex.value!=""){
    sign_sucess(Full_Name);sign_sucess(Email);sign_sucess(pwd);sign_sucess(dd);sign_sucess(mm);sign_sucess(yy);
    if (reg.test(Email.value) == false) 
        {       
            sign_error(Email);
            sign_show_msg(2,"Please provide valid email id");
            return false;
        }else{sign_sucess(Email);}
    if(Full_Name.value.length<5)
        {
            sign_error(Full_Name);
            sign_show_msg(2,"Full Name length should be greater than 5");
            return false;
        }else{sign_sucess(Full_Name);}
    if(pwd.value.length<5)
        {
            sign_error(pwd);
            sign_show_msg(2,"Password length should be greater than 5");
            return false;
        }else{sign_sucess(pwd);}
                
    }else{ 
        if(Full_Name.value==""){sign_error(Full_Name);sign_show_msg(2,str+"Full Name");}
        else if(Email.value==""){sign_error(Email);sign_show_msg(2,str+"Email");}
        else if(pwd.value==""){sign_error(pwd);sign_show_msg(2,str+"Password");}
        else if(dd.value=="date"){sign_error(dd);sign_show_msg(2,str+"Date");}
        else if(mm.value=="month"){sign_error(mm);sign_show_msg(2,str+"Month");} 
        else if(yy.value=="year"){sign_error(yy);sign_show_msg(2,str+"Year");} 
        else if(sex.value==""){sign_show_msg(2,str+"sex");}
        return false;
        
    }
  
}


/*drop header*/
  function drop_header(a)
  {              
      if(head_drop==0){
        a.childNodes[2].style.display = "block"; 
        head_drop=1; 
        choicer=1;   
      }
      else{
        a.childNodes[2].style.display = "none";
        head_drop=0;
        choicer=1;    
      }
  }
  
  /*Add Elements to Main menu*/
  function create_menu_item(a,b,c)
  {                            
      var ele=document.getElementById('menu_item');
      ele=ele.childNodes[1].childNodes[1].childNodes[1];   
      ele.innerHTML+='<li  class="col-md-2 col-sm-4 col-xs-6" onclick="open_windows(\''+c+'\')"><a href="#" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-'+a+'"></span><span id="'+b+'" class="badge"></span> <br/>'+b+'</a></li>';
  }
  
  /*Open in Main Window*/
  function open_windows(a)
  {         
      b=a.split('&');                                        ;
      if(b[0]=='?profile=true'){
        window.open('http://localhost/gecbh/'+a,'_blank');    
      }else{
      show_div('windows',0);
      add_task(a,"windows",1,"result_script");}      
  }
/*drop header*/

/*Make Alert Box*/                
function make_alert_right(a,b){
    if(typeof b === 'undefined'){b='';} 
    obj=document.getElementById("private_msg_right");
    obj_className="btn btn-success";
    if(b==2){
    obj_className="btn btn-warning"; 
    }else if(b==3){
    obj_className="btn btn-danger"; 
    }
    idd=Math.floor((Math.random() * 1000000000000) + 1); 
    obj.innerHTML+="<span id='a"+idd+"' class='inner "+obj_className+"' onclick='animation_off(this)'>"+a+"</span>";   
    obj1=document.getElementById('a'+idd);
    obj1.style.height="0px";
    animate_height_up(obj1,obj,35,400);
}

function animate_height_up(obj,obj1,height,interval){
    var timer_make_alert_right,inc=0;
    timer_make_alert_right = setInterval(function(){
    inc=inc+1;
    if(inc<=height){obj.style.height=inc+"px";}
    if(inc==interval){
    clearInterval(timer_make_alert_right);    
    animate_height_down(obj,obj1,height,interval);
    }}, 1);        
} 
function animate_height_down(obj,obj1,height,interval){
    var timer_make_alert_right,inc=interval;
    timer_make_alert_right = setInterval(function(){
    inc=inc-1;
    if(inc<=height){obj.style.height=inc+"px";}
    if(inc==0){
    obj.style.display="none";
    obj.remove();
    clearInterval(timer_make_alert_right);    
    }}, 1);        
}   
function animation_off(a){
    a.style.display="none";
    a.remove();
}

/*Nav bar collapse*/
function show_div(a,collapse)
{                  
    if(collapse==0){
        document.getElementById(a).style.display="block"; 
        if(a=='windows'){
        document.getElementById('mw_menus_container').style.display="none";}
        else if(a=='menu_item'){}                
        else{
        document.getElementById('windows').style.display="none";                
        document.getElementById('menu_item').style.display="none";              
        }animateopenme(a,0);       
    }else{
        animatecloseme(a,0);
    } 
}

/*Animate*/

/*enter*/
            var animate ,animate_len=0;
            function animateopenme(a,b){
               if(b==0){animate_len=0;} 
               imgObj = document.getElementById(a);
               imgObj.style.opacity =animate_len; 
               animate_len+=0.1; 
               animate = setTimeout(animateopenme,50,a,1); // call moveRight in 20msec
               if(animate_len>=1){clearTimeout(animate);}
            }
/*Exit*/
            var animate1 ,animate_len1=1;
            function animatecloseme(a,b){
               if(b==0){animate_len1=1;} 
               imgObj1 = document.getElementById(a);
               imgObj1.style.opacity =animate_len1; 
               animate_len1-=0.1; 
               animate1 = setTimeout(animatecloseme,50,a,1); // call moveRight in 20msec
               if(animate_len1<=0){clearTimeout(animate1);
               imgObj1.style.display="none";
               }
            }
            
/*var elem = document.getElementById('mw_menus_container');
var msnry = new Masonry( elem, {
  itemSelector: '.grid-item',
    isFitWidth: true
});*/


/*Ajax Creator*/

var task_queue=[];
var task_no=0;
var Task = function(url,target,s_name,type,css_class,onclickk){
  this.url = url;
  this.target = target;
  this.s_name=s_name;
  this.type=type;
  this.css_class=css_class;
  this.onclickk=onclickk;
};
     
function add_task(url,target,pri,s_name,type,css_class,onclickk)
{                 
    if (typeof(s_name)==='undefined') s_name = ''; 
    if (typeof(type)==='undefined') type = 'data'; 
    if (typeof(css_class)==='undefined') css_class = ''; 
    if (typeof(onclickk)==='undefined') onclickk = ''; 
  var task=new Task(url,target,s_name,type,css_class,onclickk);           
  if(pri==1){task_queue.unshift(task);task_no+=1;}
  else if(pri==0){task_queue.push(task);task_no+=1;}  
  var element =  document.getElementById(task.target);
  if (typeof(element) != 'undefined' && element != null){ 
      document.getElementById(task.target).innerHTML ="<div class='center_loading'></div>";}
}

function execute(task) { 
    var cond;  
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {  
                
                    var element =  document.getElementById(task.target);
                    if (typeof(element) != 'undefined' && element != null){
                    document.getElementById(task.target).innerHTML = xmlhttp.responseText;
                    parseScript(xmlhttp.responseText);
                    }
                cond= "true";                     
            }
        }
        xmlhttp.open("GET", task.url, true);  
        xmlhttp.send();      
        if(cond!=true){cond="false";}
        return cond;
}


var image_queue=[];
var image_check_queue=[];
var image_no=0;
var img_onload1=0;
var img_onload2=0;
var img_onload3=0;

var frame1_node;
var frame2_node;
var frame3_node;
function load_img_data(task)
{
    if (typeof(task)!=='undefined'){image_queue.push(task);image_no+=1;}
    if(img_onload1==0&&image_no!=0&&image_queue.length > 0){
        img_onload1=1;
        var task1=image_queue.shift();
        //image_queue.unshift(task1);             
        var element =  document.getElementById(task1.target);
        if (typeof(element) != 'undefined' && element != null){
        frame1_node=task1;
        document.getElementById('img_loader_frame').src = task1.url;}
        else{image_no-=1;img_onload1=0;}
    }
    if(img_onload2==0&&image_no!=0&&image_queue.length > 0){
        img_onload2=1;   
        var task2=image_queue.shift();                      
        //image_queue.unshift(task1);             
        var element =  document.getElementById(task2.target);
        if (typeof(element) != 'undefined' && element != null){
        frame2_node=task2;
        document.getElementById('img_loader_frame2').src = task2.url;}
        else{image_no-=1;img_onload2=0;}
    }
    if(img_onload3==0&&image_no!=0&&image_queue.length > 0){
        img_onload3=1;
        var task3=image_queue.shift();                      
        //image_queue.unshift(task1);             
        var element =  document.getElementById(task3.target);
        if (typeof(element) != 'undefined' && element != null){
        frame3_node=task3;
        document.getElementById('img_loader_frame3').src = task3.url;}
        else{image_no-=1;img_onload3=0;}
        
    }
}  

function give_back_img(frameObject)
{                      
    image_no-=1;
    img_onload1=0;
    //task1=image_queue.shift();
    task1=frame1_node;
    var element =  document.getElementById(task1.target);
    if (typeof(element) != 'undefined' && element != null){ 
        image_check_queue.push(task1); 
    var img_node=document.getElementById['img_loader_frame'];
    //doc = window.frames["img_loader"].document.getElementsByTagName("body")[0].innerHTML;
    frameObject.contentDocument.body.getElementsByTagName("img")[0].className +=task1.css_class;    
    //frameObject.contentDocument.body.getElementsByTagName("img")[0].onload =function(){task1.onclickk;}    
    img_node=frameObject.contentDocument.body.innerHTML;
    if(task1.onclickk!=""){eval(task1.onclickk);}
    document.getElementById(task1.target).innerHTML=img_node;}   
    load_img_data();        
}


function give_back_img2(frameObject)
{
    image_no-=1;
    img_onload2=0;
    //task1=image_queue.shift();
    task1=frame2_node;
    var element =  document.getElementById(task1.target);
    if (typeof(element) != 'undefined' && element != null){
        image_check_queue.push(task1);
    var img_node=document.getElementById['img_loader_frame2'];
    //doc = window.frames["img_loader"].document.getElementsByTagName("body")[0].innerHTML;
    frameObject.contentDocument.body.getElementsByTagName("img")[0].className +=task1.css_class;    
    //frameObject.contentDocument.body.getElementsByTagName("img")[0].onload =function(){task1.onclickk;}    
    img_node=frameObject.contentDocument.body.innerHTML;
    if(task1.onclickk!=""){eval(task1.onclickk);}
    document.getElementById(task1.target).innerHTML=img_node;}   
    load_img_data();        
}

function give_back_img3(frameObject)
{
    image_no-=1;
    img_onload3=0;
    //task1=image_queue.shift();
    task1=frame3_node;
    var element =  document.getElementById(task1.target);
    if (typeof(element) != 'undefined' && element != null){
        image_check_queue.push(task1);
    var img_node=document.getElementById['img_loader_frame3'];
    //doc = window.frames["img_loader"].document.getElementsByTagName("body")[0].innerHTML;
    frameObject.contentDocument.body.getElementsByTagName("img")[0].className +=task1.css_class;    
    //frameObject.contentDocument.body.getElementsByTagName("img")[0].onload =function(){task1.onclickk;}    
    img_node=frameObject.contentDocument.body.innerHTML;
    if(task1.onclickk!=""){eval(task1.onclickk);}
    document.getElementById(task1.target).innerHTML=img_node;}   
    load_img_data();        
}

var task_shedule;
var returntask=0;
function task_sheduler()
{               
    clearTimeout(task_shedule);  
         
     if(task_no!=0)
     {             
        var process= task_queue.shift(); 
        if(process!=null){
            if(process.type=='data'){
            if(execute(process)){task_no-=1;returntask=0;task_sheduler();}
            else{task_queue.unshift(process);returntask+=1;
                if(returntask==2){make_alert_right('You Have a Problem with Connection',3);}
                if(returntask==3){task_shedule=setTimeout(function(){ task_sheduler() }, 2000);returntask=0;}
                else{task_sheduler();}
            }}
            else if(process.type=='image'){        

                //image_check_queue.push(task1);
                /*  this.url = url;this.target = target;*/ 
                var ok=0;
                ok=check_img_exit(process);  
                if(ok==0){load_img_data(process);}task_no-=1;returntask=0;task_sheduler();
            }
        }
     }else{
        task_shedule=setTimeout(function(){ task_sheduler() }, 20);                   
     }
}
task_shedule=setTimeout(function(){ task_sheduler() }, 20);

/*check whether image exits in dom*/ 
function check_img_exit(process)
{
    var ok=0;
    if(image_check_queue.length!=0){
                    for(var looper=0;looper<image_check_queue.length;looper++)
                    {                               
                        if(image_check_queue[looper].url==process.url)
                        {
                            var ele=document.getElementById(image_check_queue[looper].target);
                            if (typeof(ele) != 'undefined' && ele != null)
                            {
                                ok=1;
                                document.getElementById(process.target).innerHTML=document.getElementById(image_check_queue[looper].target).innerHTML;
                                break;
                            }
                        }   
                    }
                }
    return ok;
}         
/*run ajavascriptcommand*/
function parseScript(strcode) {
  var scripts = new Array();         
  while(strcode.indexOf("<script") > -1 || strcode.indexOf("</script") > -1) {
    var s = strcode.indexOf("<script");
    var s_e = strcode.indexOf(">", s);
    var e = strcode.indexOf("</script", s);
    var e_e = strcode.indexOf(">", e);
    
    scripts.push(strcode.substring(s_e+1, e));
    strcode = strcode.substring(0, s) + strcode.substring(e_e+1);
  }
  
  for(var i=0; i<scripts.length; i++) {
      var script_split = scripts[i].split(";");
          for(var j=0; j<script_split.length; j++) {
    try {          
                   
      eval(script_split[j]);
    }
    catch(ex) {
    }
  }}
}
/*menu driven functions*/


function add_mouse_listner(a)
{
    var ele=document.getElementById(a);
    var c = ele.childNodes.length;j=0;ab=new Array();row_size=0;  
    for(i=0;i<c;i++){                        
        if(ele.childNodes[i]=="[object HTMLLIElement]")
        {                          
        ele.childNodes[i].setAttribute("onmousedown", "just_onclick(this)");
        ele.childNodes[i].setAttribute("onmouseup", "just_onout_catch(this)");
        ele.childNodes[i].setAttribute("onmouseover", "mouse_over_after(this)");
        }
    }    
}

var set_on_click=0;
function just_onclick(a)
{
    set_on_click=1;
    //alert(a.innerHTML);
}

function just_onout_catch(a)
{
  if(set_on_click==1){
        //alert(a);   
    }  
}

function just_onout(a)
{
    set_on_click=0; //alert(set_on_click);
}

function mouse_over_after(a)
{
    if(set_on_click==1){
        //alert(a);   
    }
}
/*not used*/
function swap_node(ele,a,b)
{   
ele.insertBefore(b,a);
}

function htmlToDomNode(html) {
  var container = document.createElement('div');
  container.innerHTML = html;
  return container.firstChild;
}

function change_menu(a){
    var ele=document.getElementById(a);
    var c = ele.childNodes.length;j=0;ab=new Array();row_size=0;  
    for(i=0;i<c;i++){                        
        if(ele.childNodes[i]=="[object HTMLLIElement]")
        {   
            //alert(ele.childNodes[i].className); 
            for(j=0;j<c;j++)
            {
                if(ele.childNodes[j]=="[object HTMLLIElement]"&&ele.childNodes[i]!=ele.childNodes[j])
                {
                    fir_ele=ele.childNodes[i].className;
                    sec_ele=ele.childNodes[j].className;
                    fir_ele = fir_ele.split(" "); 
                    sec_ele = sec_ele.split(" "); 
                    if(window.innerWidth>992)
                    {
                        fir_ele = fir_ele[0];
                        sec_ele = sec_ele[0];
                        fir_ele = fir_ele.split("-"); 
                        sec_ele = sec_ele.split("-");
                        fir_ele=fir_ele[2];
                        sec_ele=sec_ele[2];
                        
                        if((parseInt(row_size)+parseInt(fir_ele)>=12)){row_size=0;break;}
                        alert(parseInt(row_size)+parseInt(sec_ele)+parseInt(fir_ele));
                        
                        if((parseInt(row_size)+parseInt(sec_ele)+parseInt(fir_ele))>12){
                            continue;
                        }else{            
                            row_size=row_size+parseInt(sec_ele);                        
                            swap_node(ele,ele.childNodes[i],ele.childNodes[j]); 
                            if(row_size>=12){row_size=0;}
                        } 
                     
                        alert(fir_ele); 
                    }
                    //alert(ele.childNodes[j].className);         
                }                
            }  
            
        }
    } 
}

/*Profile Script*/
function grid_container(){  
var post_container = document.getElementById('post_container');
var msnry = new Masonry( post_container, {
  itemSelector: '.post_content'
});
}

/*function make_comment(a)
{
    var nodes = document.getElementById(a).childNodes; 
    nodes=nodes[nodes.length-2];
    nodes.innerHTML="sdsdsd";
    nodes.style.display="block";
    grid_container();
} */
/*not used*/
/*/menu driven function*/

/*Profile Settngs*/
function inputbox(id,name_id,place_holder,url,val,type)
{                                 
    if (typeof(url)==='undefined') url = ''; 
    if (typeof(type)==='undefined') type = 'text'; 
    var clicks='onclick="open_windows1(\''+url+'\')"';
 var a="<div class='settings_input col-md-6 col-sm-12 col-xs-12'><table><tr><td>"+place_holder+"</td><td><input type='"+type+"' id='"+name_id+"' placeholder='"+place_holder+"' value='"+val+"' disabled></td><td><a href='#'><span class='glyphicon glyphicon-cog btn-sm' "+clicks+">Edit</a></td></tr></table></div>";    
 document.getElementById(id).innerHTML+=a;
}    

function open_windows1(a)
  {                       
      show_div('windows1',0);
      add_task(a,"windows1_container",1);      
  }              

  /*Profile_ edit save*/
  function save_me_profile_edit(a,b){
      var v=document.getElementById(b).value; 
      add_task("?profile_update=true&name="+a+"&v="+v,"windows1_container",1);           
  }
  
  /*replace nodes*/
  function replace_me_with(idd,no_node,replce_node)
  {
    item.replaceChild(textnode, item.childNodes[0]);   
  }
  
  /*post_menu item*/
  
  function make_post_menu_1(url,b,c)
  {                                                                                                                                                                                   
    document.getElementById('post_inside_contai').innerHTML+='<div class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg post_menu_items" onclick="open_windows(\''+url+'\');show_div(\''+"windows1"+'\',1);"><span class="glyphicon '+b+'"></span>&nbsp;&nbsp;'+c+'</div>';   
  }
  
  /*make multiple image to display inside a div*/
  
  function get_multiple_image_data(a,b,regular,pri,width,height)
  {                                        
    if (typeof(regular)==='undefined') regular = '';                                     
    if (typeof(pri)==='undefined') pri = 1;                                     
    if (typeof(width)==='undefined') width = 50;                                     
    if (typeof(height)==='undefined') height = 50;                                     
      var c = a.split("::");
      for(i=0;i<c.length-1;i++){                                                  
    document.getElementById(b).innerHTML+="<span id='"+c[i]+"_container' class='btn btn-default'></span>";
    if(regular==1){document.getElementById('img_id_saver').value+=c[i]+";";}  //before it was just watch it later
    //if(regular!=0){document.getElementById('img_id_saver').value+=c[i]+";";}
      add_task("?get_img=true&set="+c[i]+"&width="+width+"&height="+height+"",c[i]+"_container",pri,'','image','');
    }   
  }
  
  
  /*post.php get tagg people*/
  function show_agging_people(a,b,d,e){ 
      var c=a.value;
      c=c.split(",");
      c=c[c.length-1];
      if(c==''){
          document.getElementById(b).style.display='none';
      }else{
          document.getElementById(b).style.display='block'; 
          add_task("?get_creditor=true&para='"+c+"'&width="+d+"&height="+e+"",b,1);  
      }
       
  }
  /*get the tagged people to div*/
  function get_tagged_prof_to(a,b)
  {
      var name_here=a.childNodes[1].innerHTML;
      document.getElementById('credit_prof').value+=b+";";
      var c=document.getElementById('tag_people_name').value;
      document.getElementById('tag_people_name').value='';
      document.getElementById('tag_people_name_show').innerHTML+=name_here+",";
      a.remove();      
  }
  
  function save_post()
  {
      var post_text=document.getElementById('post_text').value;
      var img_id_saver=document.getElementById('img_id_saver').value;
      var credit_prof=document.getElementById('credit_prof').value;
      var sel1=document.getElementById('sel1').value;                 
      add_task("?save_post_content=true&post_text="+post_text+"&img_id_saver="+img_id_saver+"&credit_prof="+credit_prof+"&sel1="+sel1+"","post_inside_standard_result",1); 
      
  }
  
  /*create post in user window*/
  
var total_posts_listed=0;
var post_task_queue=[];
var PostTask = function(url,target,pri,s_name,type,css_class){
  this.url = url;
  this.target = target;
  this.pri=pri;
  this.s_name=s_name;
  this.type=type;
  this.css_class=css_class;
};
     
function add_post_task(url,target,pri,s_name,type,css_class)
{     
    if (typeof(s_name)==='undefined') s_name = ''; 
    if (typeof(type)==='undefined') type = 'data'; 
    if (typeof(css_class)==='undefined') css_class = ''; 
  var posttask=new PostTask(url,target,pri,s_name,type,css_class);           
  if(pri==1){post_task_queue.unshift(posttask);total_posts_listed+=1;}
  else if(pri==0){post_task_queue.push(posttask);total_posts_listed+=1}
}

  var post_on_progress=0;
  function create_post_in_user_window()
  {                                           
    if(post_on_progress==0&&total_posts_listed!=0){  
        post_on_progress=1;
        total_posts_listed-=1;
        var posttask=post_task_queue.shift();
        add_task(posttask.url,posttask.target,posttask.pri);
        post_on_progress=0; 
        return 1;  
    }else return 0;     
  }
  
  var time_in=0;
  var looptimer;
  function  looper_create_post_in_user_window()
  {
     looptimer=setInterval(function(){ if(time_in<15){if(create_post_in_user_window()==1){time_in+=1;}}else{clearInterval(looptimer);} }, 1000); 
  }
  
  /*make print your post*/
  
  //make_post_print('1','29;30;','14','amith moorkoth','0','','hai guys','0','0','0');
  var ggh=0;
  function make_post_print(post_id,img,prof_pic,name,credit,caption,text,love,cmt,views,prof_id)
  {         
    if (typeof(prof_id)==='undefined') prof_id = '';   
      var num=0; 
      var a="<div class='col-xs-12 col-sm-6 col-md-4 post_content img-thumbnail' id='post_id_"+post_id+"'>                                                                                                                           \
            <div id='post_id_img_"+post_id+"' class='slideshow'><ul id='post_id_img_"+post_id+"_ul'></ul></div>                                                                                              \
            <div id='post_profile_pic_"+post_id+"' class='prof_pic' onclick="+"open_windows('?profile=true&profile_id="+prof_id+"');"+"></div>                                                                                              \
            <div class='post_owner'>                                                                                                                                                                                            \
                "+name+"<br/><div class='credits'></div>                                                                                                                                                         \
            </div>                                                                                                                                                                                                                \
            <hr/>                                                                                                                                                                                                                  \
            <div class='post_detail_title'>"+caption+"</div>                                                                                                                                                                              \
            <div class='post_detail'>"+text+"</div>                                                                                                                                                                                                                      \
            <hr/>                                                                                                                                                                                                                        \
            <div class='publizize_boxes'>                                                                                                                                                                                                 \
                <button type='button' class='btn btn-info posts' onclick='save_love_in_post(this)' id='"+post_id+"'><span class='glyphicon glyphicon-heart'></span>&nbsp;&nbsp;<span class='badge'>"+love+"</span></button>                                                                       \
                <button type='button' class='btn btn-info rating'><span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;<span class='badge'>"+views+"</span></button>                                                                    \
                <button type='button' class='btn btn-info rating' onclick='save_command_in_post(this)' id='"+post_id+"'><span class='glyphicon glyphicon-comment'></span>&nbsp;&nbsp;<span class='badge'>"+cmt+"</span></button>                                   \
                <button type='button' class='btn btn-info rating' onclick='save_share_in_post(this)'  id='"+post_id+"'><span class='glyphicon glyphicon-plus'></span>&nbsp;&nbsp;</button>                                                                                                         \
            </div>                                                                                                                                                                                                                             \
            <div class='like_box' id='post_get_like_"+post_id+"'></div>                                                                                                                                                                                                     \
            <div class='comment_box' id='post_get_cmd_"+post_id+"'></div>                                                                                                                                                                                                     \
            <div class='share_box' id='post_get_sr_"+post_id+"'></div>                                                                                                                                                                                                     \
        </div>";         
        document.getElementById('post_container').innerHTML+=a;    
        if(img!=''){var c = img.split("::");
        for(i=0;i<c.length-1;i++){                                                  
        document.getElementById("post_id_img_"+post_id+"_ul").innerHTML+="<li><span id='"+c[i]+"_container_"+post_id+"' class='img_holer_slide'></span></li>";
            add_task("?get_img=true&set="+c[i]+"&width=300&height=300",c[i]+"_container_"+post_id,1,'','image','','grid_container();');   //img_posts                                                                                                                                                                                                                             
        }}
        add_task("?get_img=true&set="+prof_pic+"&width=50&height=50","post_profile_pic_"+post_id,1,'','image','img-thumbnail img-circle posts_profile_pic'); 
        
        //if(c.length>1 ){{make_slide(document.getElementById("post_id_img_"+post_id));}ggh+=1;}
                               
        grid_container();                                                                                                                                                                                                                               
  }
  
  
  function save_share_in_post(a)
  {
    add_task("?save_post_on_share=true&id="+str,"post_get_sr_"+a.id,1);   
  }
  
  var cmd_boxes=0;
  
function get_prof_pic_cmd(a,b){add_task("?get_img=true&set="+a+"&width=30&height=30",b,0,'','image','img-thumbnail img-circle posts_profile_pic',"grid_container();"); }

function get_prof_pic_cmd2(a,b,c,d){
    if (typeof(c)==='undefined') c = 30; 
    if (typeof(d)==='undefined') d = 30; 
    
    add_task("?get_img=true&set="+a+"&width="+c+"&height="+d+"",b,0,'','image','img-thumbnail img-circle posts_profile_pic'); 
}
  function save_command_in_post(a)
  {                    
    document.getElementById("post_get_cmd_"+a.id).innerHTML="<hr/><br/><textarea style='max-width:100%;' class='form-control' onkeyup='make_a_new_cmd_post(event,this)' id='"+a.id+"_textarea'></textarea>\
    <span id='"+a.id+"_cmd_post'></span>"; 
        cmd_boxes+=1;
        str=a.id;
        document.getElementById(str+"_cmd_post").innerHTML+="<span id='"+str+"_cmd_post_"+cmd_boxes+"' style='height:30px;'></span>";
        add_task("?save_post_cmd_show=true&id="+str,str+"_cmd_post_"+cmd_boxes,1); 
             
    grid_container();  
  }
  
  function button_saver_link(a,b)
  {
      if (typeof(b)==='undefined') {b = 1;}
      //else{document.getElementById('con_prof_'+a.id).remove();} 
      if(b==1){
      var str = a.className;
      str = str.split(" ");
      if(str[1]=="btn-default"){
        str[1]="btn-primary";  
      }else if(str[1]=="btn-primary"){
        str[1]="btn-default";    
      }
      str=str.join(" ");
      a.className=str;  
      idd=Math.floor((Math.random() * 1000000000000) + 1); 
      document.getElementById("show_many_linker").innerHTML+="<span id='linker_"+idd+"'></span>"; 
      add_task("?save_profile_liker_con=true&id="+a.id,"linker_"+idd,1);
      document.getElementById('con_prof_'+a.id).remove();  
      }else{
      document.getElementById('con_prof_'+a.id).remove();    
      idd=Math.floor((Math.random() * 1000000000000) + 1); 
      document.getElementById("show_many_linker").innerHTML+="<span id='linker_"+idd+"'></span>"; 
      add_task("?save_profile_rm_con=true&id="+a.id,"linker_"+idd,1);
      }
      make_new_suggestion();
      
  }
  
  function make_a_new_cmd_post(event,a)
  {
            var x = event.which || event.keyCode;
            if(x==13){
                inside_make_a_new_cmd_post(a);    
            }   
  }
  
  function inside_make_a_new_cmd_post(a) 
  {
      var txt=a.value;
        a.value="";
        txt=txt.trim();
        str=a.id;
        str=str.substring(0, str.length - 9);
        if(txt!="")
        {   cmd_boxes+=1;
            document.getElementById(str+"_cmd_post").innerHTML+="<span id='"+str+"_cmd_post_"+cmd_boxes+"' style='height:30px;'></span>";
            add_task("?save_post_cmd=true&id="+str+"&txt="+txt,str+"_cmd_post_"+cmd_boxes,1); 
            grid_container();      
        }
  }
  
  function delete_like_from_post(a)
  {
      var node=document.getElementById(a).childNodes[2];
      node.innerHTML=parseInt(node.innerHTML)-2;
      var id=a.id;    
       grid_container();
  }
  function save_love_in_post(a)
  {
      var node=a.childNodes[2];
      node.innerHTML=parseInt(node.innerHTML)+1;
      var id=a.id;
      add_task("?save_post_likes=true&id="+id,"post_get_like_"+id,1); 
       grid_container();
  }
  
window.onscroll=function(){
    create_post_in_user_window();
}

var i=0;
window.onkeyup=function(event){
    var x = event.which || event.keyCode;
    if(x==27){show_div('windows1',1);add_task('?blank=true','windows1_container',1);}  
    if(x==88){if(i==0){show_div('menu_item',0);i+=1;}else{i-=1;show_div('mw_menus_container',0);}}  
}  
  
//onscroll
var msg_scroll_no=1;
function onscroll_msg(){
    document.getElementById("make_msg_boxes").onscroll=function(){
    if(this.scrollTop<1){
    if(msg_scroll_no!='no'){
        msg_scroll_no+=1;    
        idd=Math.floor((Math.random() * 1000000000000) + 1); 
        document.getElementById("make_msg_boxes").innerHTML="<span id='mke_"+idd+"'></span>"+document.getElementById("make_msg_boxes").innerHTML;
        add_task("?make_msg_insider_top=true&id="+prof_id+"&lno="+msg_scroll_no+"&mke="+idd,"mke_"+idd,1); }   
    }
}
}  
//search 
function make_search_change(a)
{           
    add_task("?search_in_div=true&val="+a.value,"search_result_user",1);     
}

//msg
function sending_msg_data(event,a,b)
{
var x = event.which || event.keyCode;
    if(x==13){
    var strss=a.value;
    a.value=strss.trim();
    if(a.value!=""){
        inside_make_a_new_msg(a,b);
        a.value="";    
    } }   
}

function inside_make_a_new_msg(a,b)
{
    add_task("?inside_make_a_new_msg=true&val="+a.value+"&b="+b,"msg_saver",1);       
}

var msg_que_chk;
var msg_id="";
var prof_id="";
function make_msg_insider_all(a)
{                           
    add_task("?make_msg_insider_all=true&id="+a,"make_msg_boxes",1);    
    msg_que_chk=setInterval(function(){make_alert_when_requird()}, 1000);       
}

function make_alert_when_requird()
{
    var element =  document.getElementById("make_msg_boxes");
    if (typeof(element) != 'undefined' && element != null){
        add_task("?make_msg_insider_all_refresh=true&id="+prof_id+"&msg_id="+msg_id,"msg_saver",0);              
    }else{clearInterval(msg_que_chk);}                
}

function make_msg_insider(a,b,c,d,e)
{          
    if (typeof(d)==='undefined') {d = 0;}          
    if (typeof(e)==='undefined') {e = "";}          
    var style="";       
    if(c=="mee"){style="text-align:right;";}else{
    style="text-align:left;";    
    }          
    if(e!=""){node1=document.getElementById("mke_"+e);    
    }else{node1=document.getElementById("make_msg_boxes");}
    idd=Math.floor((Math.random() * 1000000000000) + 1); 
    if(c=="mee"){
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span class='me_in_right'>"+b+"</span><span id='"+idd+"' style='height:30px;display: inline-flex;'></span></span><br/>";
    }else{
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span id='"+idd+"' style='height:30px;display: inline-flex;'></span><span class='notme'>"+b+"</span></span><br/>";        
    }
    if(d==0){node1.scrollTop =node1.scrollHeight;}
    get_prof_pic_cmd2(a,idd); 
}
            
/*function make_msg_insider1(a,b,c,d,e)
{          alert()
    if (typeof(d)==='undefined') {d = 0;}          
    if (typeof(e)==='undefined') {e = "";}          
    var style="";       
    if(c=="mee"){style="text-align:right;";}else{
    style="text-align:left;";    
    }          
    if(e!=""){document.getElementById("mke_"+e);    
    }else{node1=document.getElementById("make_msg_boxes");}
    idd=Math.floor((Math.random() * 1000000000000) + 1); 
    if(c=="mee"){
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span class='me_in_right'>"+b+"</span><span id='"+idd+"' style='height:30px;display: inline-flex;'></span></span><br/>";
    }else{
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span id='"+idd+"' style='height:30px;display: inline-flex;'></span><span class='notme'>"+b+"</span></span><br/>";        
    }
    if(d==0){node1.scrollTop =node1.scrollHeight;}
    get_prof_pic_cmd2(a,idd); 
}*/


//send message using button
function send_me_message_in_but(b)
{                              
    node1=document.getElementById("msg_textbox");
    if(node1.value!=""){
    inside_make_a_new_msg(node1,b);
    node1.value="";}
            
}


//get make_linker
function save_linker_into_span(id,a,rn,fnme)
{
    var obj=document.getElementById("show_many_linker");
    var c="?profile=true&profile_id="+id;
    obj.innerHTML+="<span class=' col-xs-12 col-sm-12 col-md-12 drop_shadow' id='con_prof_"+id+"'><table width=100%;><tr><td width=100%><span onclick='open_windows(\""+c+"\")' class='make_point'><span id='"+rn+"'></span>"+fnme+"</span>  \
        </td><td><span class='btn btn-default glyphicon glyphicon-link' id='"+id+"' onclick='button_saver_link(this,1);' ></span></td><td>                                                                                  \
        <span class='btn glyphicon glyphicon-remove btn-xs' id='"+id+"' onclick='button_saver_link(this,0);' ></span></td></tr></table>                                                                                      \
        </span>";                                                                                                                                                                                                                    
}
//get the suggestion continues
function make_new_suggestion()
{                     
    idd=Math.floor((Math.random() * 1000000000000) + 1); 
    var obj=document.getElementById("show_many_linker");
    obj.innerHTML+="<span id='sugg_"+idd+"'></span>";   
        add_task("?show_many_linker_nxt=true&id="+idd,"msg_saver",0);                      
}

//function chatter shower
function chatter_shower(a,b,c,d,e)
{
document.getElementById("tr_"+a).innerHTML="<td width='50px'><span id='cht_"+c+"'></span></td><td>"+d+"</td>"; 
document.getElementById("tr_"+a).onclick=function(){
    open_windows1('?message=true&open_dialog=true&profile_id='+b);
}  
get_prof_pic_cmd2(e,'cht_'+c);     
}

//public chatter box 
function sending_msg_data_public(event,a)
{
var x = event.which || event.keyCode;
    if(x==13){
    var strss=a.value;
    a.value=strss.trim();
    if(a.value!=""){
        inside_make_a_new_msg_public(a);
        a.value="";    
    } }   
}

function inside_make_a_new_msg_public(a)
{                             // alert(a.value);
    add_task("?inside_make_a_new_msg_public=true&val="+a.value,"msg_saver_public",1);       
}

function send_me_message_in_but_public()
{    node1=document.getElementById("msg_textbox_public");
    inside_make_a_new_msg_public(node1);
    node1.value="";
}

var msg_que_chk_public;
var msg_id_pub="";
function make_msg_insider_all_pub()
{                           
    add_task("?make_msg_insider_all_pub=true","msg_textbox_public",1);    
    msg_que_chk_public=setInterval(function(){make_alert_when_requird_pub();}, 1000);       
}

function make_alert_when_requird_pub()
{
    var element =  document.getElementById("msg_textbox_public");
    if (typeof(element) != 'undefined' && element != null){
        add_task("?make_msg_insider_all_refresh_pub=true&msg_id="+msg_id_pub,"msg_saver_public",0);              
    }else{clearInterval(msg_que_chk_public);}                
}

function make_msg_insider_pub(a,b,c,d,e)
{         
    if (typeof(d)==='undefined') {d = 0;}          
    if (typeof(e)==='undefined') {e = "";}          
    var style="";       
    if(c=="mee"){style="text-align:right;";}else{
    style="text-align:left;";    
    }          
    if(e!=""){document.getElementById("mke_"+e);    
    }else{node1=document.getElementById("make_msg_boxes_public");}
    idd=Math.floor((Math.random() * 1000000000000) + 1); 
    if(c=="mee"){
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span class='me_in_right'>"+b+"</span><span id='"+idd+"' style='height:30px;display: inline-flex;'></span></span><br/>";
    }else{
        node1.innerHTML+="<span style='"+style+"' class='col-xs-12 col-sm-12 col-md-12 chat_in_box'><span id='"+idd+"' style='height:30px;display: inline-flex;'></span><span class='notme'>"+b+"</span></span><br/>";        
    }
    if(d==0){node1.scrollTop =node1.scrollHeight;}
    get_prof_pic_cmd2(a,idd); 
}
