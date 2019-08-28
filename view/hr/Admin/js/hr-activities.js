let tk = document.cookie.split(';');
let new_tk = tk[2].split('=');

let company     = document.querySelector('.company-name'),
    designation = document.querySelector('.candidate-designation'),
    about       = document.querySelector('.about-job'),
    status      = document.querySelector('.job-status'),
    num         = document.querySelector('.noof-position'),
    cities      = document.querySelector('.cities'),
    ocity       = document.querySelector('.other-city'),
    skills      = document.querySelector('.candidate-skills');
    
let postjobs = (function(){ 
    let   alert       = document.getElementById('post-your-jobs-alert');
        
          return {
              postjob:function(e) 
              {
                e.preventDefault();
                  
                  let xhr = new XMLHttpRequest(),resp;
                  if(xhr) 
                  {
                    xhr.open("POST","psyj",true);
                    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                    xhr.setRequestHeader("token", new_tk[1]);
                    xhr.onreadystatechange=function()
                    {
                      if(xhr.readyState ==4 && xhr.status ==200 ) 
                      {
                          resp = xhr.responseText;
                          alert.innerHTML = resp;
                          returnjs('app.js');
                      }
                    }
xhr.send('company='+company.value+"&designation="+designation.value+'&about='+about.value+
  '&status='+status.value+'&no='+num.value+'&city='+cities.value+
  '&ocity='+ocity.value+'&skil='+skills.value+'&tok='+new_tk[1]);
                  }
              }

            }

      })();
      let btn = document.querySelector(".btn-post-your-job");
          btn.addEventListener("click", postjobs.postjob);
      
          



(function(){


    setInterval(function(){
    todolists();
    },5000);

    todolists();

    function todolists()
    {
        let xhr = new XMLHttpRequest, resp,
            ui  = document.getElementById('to-do-list-result');
            
        if(xhr) {
            xhr.open('GET','todo?list=1', true);
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.setRequestHeader("method","GET");
            
            xhr.onreadystatechange=function() {
              if(xhr.readyState ==4 && xhr.status ==200) {
                  resp = xhr.responseText;
                  todolist(resp);
              } 
            }
            xhr.send(null);
        }
      }

    function todolist(data) {
      let ui  = document.getElementById('to-do-list-result');
      ui.innerHTML = data;
    }

})();







let eod =  (function(){

  let name  = document.querySelector('.hr-name');
  let email = document.querySelector('.hr-email');
  let des   = document.querySelector('.hr-describe');
  let result = document.querySelector('.eod-result');
  let conf, response;
  
 
  conf = {
    name : name.value,
    email: email.value,
    desc: des
  }

  return {

        sendReport:function(e)
        {
          e.preventDefault();
          let xhr = new XMLHttpRequest();
          if(xhr) 
          {
            xhr.open('POST','eod',true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.setRequestHeader("method","POST");
            xhr.setRequestHeader("token", new_tk[1]);
            
            xhr.onreadystatechange=function()
            {
              if(xhr.readyState==4 && xhr.status==200) 
              {
                    response = xhr.responseText;
                    result.innerHTML = response;
              }
            }
            xhr.send("name="+conf.name+"&email="+conf.email+"&desc="+conf.desc.value+"&tok="+new_tk[1]);
          }
        },
    }      
})();
let eodbtn = document.querySelector('.btn-EOD');
eodbtn.addEventListener('click', eod.sendReport );






let tracker = (function(){
  "use strict";

  let name = document.querySelector('.track-name'),
      email = document.querySelector('.track-email'),
      contact = document.querySelector('.track-tel'),
      date = document.querySelector('.track-date'),
      position = document.querySelector('.track-position'),
      resume = document.querySelector('.track-resume'),
      table = document.querySelector('#tracker'), output, response, obj = {},
      check_inputs = 0, data_length = 1;
      
  
    return {
        
        save_record:function(v)
        {
          v.preventDefault();
          
          obj.name  = name.value;
          obj.email = email.value;
          obj.contact = contact.value;
          obj.date = date.value;
          obj.position = position.value;
          obj.resume = resume.value;
          
          tracker.save_record_check_inputs();
          
          if(check_inputs == 1) {

              let array = new Array();
                  array.push(obj);
              let json_obj = JSON.stringify(obj);
              let xhr = new XMLHttpRequest();
              
              if(xhr) {
                xhr.open("POST","track", true);
                xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                xhr.setRequestHeader("method","POST");
                xhr.setRequestHeader("token", new_tk[1]);
    
                xhr.onreadystatechange=function()
                {
                  if(xhr.readyState== 4 && xhr.status== 200) 
                  {
                    response = xhr.responseText;
                    tracker.show_tracker(response);
                  }
                }
                xhr.send("candidatetracker="+json_obj+"&token="+new_tk[1]);
              }
          }
          
        },
        save_record_check_inputs:function()
        {
          // check for empty fields
          if(obj.name == 0 ) {
            check_inputs = 0;
            name.focus();
            return false;
          }else if(obj.email == 0 ) {
            check_inputs = 0;
            email.focus();
            return false;
          }else if(obj.contact == 0) {
            check_inputs = 0;
            contact.focus();
            return false;
          }else if(obj.date == 0) {
            check_inputs = 0;
            date.focus();
            return false;
          }else if(obj.position == 0) {
            check_inputs = 0;
            position.focus();
            return false;
          }else if(obj.resume == 0) {
            check_inputs = 0;
            resume.focus();
            return false;
          }else {
            check_inputs = 1;
            return;
          }
        },
        show_saved_record:function(d)
        {
          if(typeof d != "string") {
            return false;
          }
          d=JSON.parse(d);
          data_length = d;
          let tbody = document.querySelector(".tbody");
          let i = 1;
          
          d.forEach(function(d,index){
            let tr_index = tbody.insertRow(index);
            let td_1 = tr_index.insertCell(0);
            let td_2 = tr_index.insertCell(1);
            let td_3 = tr_index.insertCell(2);
            let td_4 = tr_index.insertCell(3);
            let td_5 = tr_index.insertCell(4);
            let td_6 = tr_index.insertCell(5);
            let td_7 = tr_index.insertCell(6);
            let td_8 = tr_index.insertCell(7);
            
            td_1.innerHTML = i;
            td_2.innerHTML = d.name;
            td_3.innerHTML = d.email;
            td_4.innerHTML = d.contact;
            td_5.innerHTML = d.applydate;
            td_6.innerHTML = d.position;
            td_7.innerHTML = d.resume;
            td_8.innerHTML = "pending";
            i++;
          });
          
        },
        show_tracker:function(d)
        {
          if(typeof d != "string") {
            return false;
          }
          d = JSON.parse(d);
          
          let tbody = document.querySelector(".tbody");
          // 
          let tr_index = tbody.insertRow(data_length.length);
            let td_1 = tr_index.insertCell(0);
            let td_2 = tr_index.insertCell(1);
            let td_3 = tr_index.insertCell(2);
            let td_4 = tr_index.insertCell(3);
            let td_5 = tr_index.insertCell(4);
            let td_6 = tr_index.insertCell(5);
            let td_7 = tr_index.insertCell(6);
            let td_8 = tr_index.insertCell(7);

            td_1.innerHTML = data_length.length + 1;
            td_2.innerHTML = d.name;
            td_3.innerHTML = d.email;
            td_4.innerHTML = d.contact;
            td_5.innerHTML = d.date;
            td_6.innerHTML = d.position;
            td_7.innerHTML = d.resume;
            td_8.innerHTML = "pending";
            tracker.clear_tracker();            
        },
        clear_tracker:function()
        {
          name.value = "";
          email.value = "";
          contact.value = "";
          date.value = "";
          position.value = "";
        }
    }

})();

let trackerBtn = document.querySelector('.btn-tracker-submit');
trackerBtn.addEventListener('click', tracker.save_record );
