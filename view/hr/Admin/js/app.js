let ynbtn = document.getElementById('post-your-jobs-alert');

let jobbtns = (function(){

    let response;
    let y = document.querySelector('.btn-yes');
    let n = document.querySelector('.btn-no');
    let alert = document.getElementById('post-your-jobs-alert');
    
            return{
                target:function(e)
                {
                    e = e || window.event;
                    return e.target || e.srcElement;
                },
                postjob:function(d)
                {
                    let xhr = new XMLHttpRequest;
                    if(xhr) {
                        xhr.open("POST", 'psyjc', true);
                        xhr.setRequestHeader('method','POST');
                        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
                        xhr.setRequestHeader("token", new_tk[1]);
                        xhr.onreadystatechange=function()
                        {
                            if(xhr.readyState==4 && xhr.status==200) {
                                response = xhr.responseText;
                                alert.innerHTML = response;
                            }
                        }
                        xhr.send('value='+d.value+'&company='+company.value+"&designation="+designation.value+'&about='+about.value+
                        '&status='+status.value+'&no='+num.value+'&city='+cities.value+
                        '&ocity='+ocity.value+'&skil='+skills.value+'&tok='+new_tk[1]);
                    }
                },
                btns:function(e)
                {
                    e.preventDefault();
                    let t = jobbtns.target(e);
                    if(t.matches('.btn-yes')) {
                        jobbtns.postjob(y);
                    }else if(t.matches('.btn-no')) {
                        jobbtns.postjob(n);
                    }
                },
                
            }

})();

ynbtn.addEventListener("click", jobbtns.btns );


