(function(win, doc){
    'use strict';

    //Funcao para Deletar
    function confirmDelPaciente(event){
        event.preventDefault();   
        //console.log(event.target.parentNode.href);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja realmente apagar?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function(){
                if (ajax.readyState === 4 && ajax.status === 200){
                    win.location.href="paciente";
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }

        //Funcao para Deletar - Curso
        function confirmDelMedico(event){
            event.preventDefault();   
            //console.log(event.target.parentNode.href);
            let token=doc.getElementsByName("_token")[0].value;
            if(confirm("Deseja realmente apagar?")){
                let ajax=new XMLHttpRequest();
                ajax.open("DELETE", event.target.parentNode.href);
                ajax.setRequestHeader('X-CSRF-TOKEN', token);
                ajax.onreadystatechange=function(){
                    if (ajax.readyState === 4 && ajax.status === 200){
                        win.location.href="medico";
                    }
                }
                ajax.send();
            }else{
                return false;
            }
        }

       //Funcao para Deletar - Instrutor
       function confirmDelEspecialidade(event){
        event.preventDefault();   
        //console.log(event.target.parentNode.href);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja realmente apagar?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function(){
                if (ajax.readyState === 4 && ajax.status === 200){
                    win.location.href="especialidade";
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }

       //Funcao para Deletar - Instrutor
       function confirmDelConsulta(event){
        event.preventDefault();   
        //console.log(event.target.parentNode.href);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja realmente apagar?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function(){
                if (ajax.readyState === 4 && ajax.status === 200){
                    win.location.href="consulta";
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }
    
    if (doc.querySelector('.js-del-medico')){
        let btn = doc.querySelectorAll('.js-del-medico');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDelMedico, false);
        }
    }

    if (doc.querySelector('.js-del-paciente')){
        let btn = doc.querySelectorAll('.js-del-paciente');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDelPaciente, false);
        }
    }

    if (doc.querySelector('.js-del-especialidade')){
        let btn = doc.querySelectorAll('.js-del-especialidade');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDelEspecialidade, false);
        }
    }

    if (doc.querySelector('.js-del-consulta')){
        let btn = doc.querySelectorAll('.js-del-consulta');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDelConsulta, false);
        }
    }
})(window, document)