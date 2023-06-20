<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
            
            .c{
                
                /*border:solid;*/
                color:red;
            }
            
            
        </style>
    </head>
    <body>
        <h1>Ajax JSON response </h1>
         <h2 id="imsg"> </h2>
      choisir groupe: 
      <select id="gr">
          <option value="201">TDM201</option>
          <option value="202">TDM202</option>
      </select>
      choisir stagiaire: 
      <select id="st">
      </select>
      
      
      <div id="itab">
          
          
          
      </div>
     
    <?php
        // put your code here
        ?>
          
          
            <script src="jquery-3.1.1.min.js"></script>
    <script>
    
    $(function(){
        
        
        $("#gr").change(function(){
            
            let groupe=$("#gr").val();
           // alert(groupe);
            
            //methode*********1******************* 
      /*       $.ajax({
            url:'server2.php',
            type: 'POST',
            data: 'cle1='+valparam,
            dataType: 'json'
            
           
        }).done(function(res){
            $("#ires").html(''); 
           let ch='Message :'+res.message+'<br/>';
           ch+='exemple :'+res.exemple;
           
           ch+='<br/> Liste des stagiaires:</br>';
           
           for(let i in res.list){
            ch+='nom : '+res.list[i].nom+'<br/>';  
            ch+='prenom : '+res.list[i].prenom+'<br/>';
            ch+='ville : '+res.list[i].ville+'<br/>';
           ch+='<hr>';
           
    }
            $("#ires").html(ch);
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
        })*/
         //************************************
       
      //methode*********2******************* 
            $.ajax({
            url:'server.php',
            type: 'POST',
            data: 'cgr='+groupe,
            dataType: 'json',
            success: function(res) {
                
                 $("#imsg").html(res.message);
                $("#st").html('');
                 for(let i in res.list){
                  $("#st").append("<option>"+res.list[i].nom+"</option>");
                  
        }
        // affichage dans un tableau :
        
         $("#itab").html('');
        $("#itab").append("<h3>Liste des stagiaires</h3>");
        
    // creation d'un tableau
    let tab=document.createElement('table');
    tab.setAttribute('border','2');
    
    // creation de la premiere ligne (entete du tableau)
    let tr=document.createElement('tr');
    let thnom=document.createElement('th');
   
    thnom.innerHTML='Nom';
    tr.appendChild(thnom);
    
    let thville=document.createElement('th');
    thville.innerHTML='Ville';
    tr.appendChild(thville);
    tab.appendChild(tr);
    
     for(let i in res.list){
     let trdonnees=document.createElement('tr');     
           let tddnom=document.createElement('td');
           tddnom.innerHTML=res.list[i].nom;
           trdonnees.appendChild(tddnom);
           
           let tddville=document.createElement('td');
           tddville.innerHTML=res.list[i].ville;
           trdonnees.appendChild(tddville);
           
            tab.appendChild(trdonnees);
    }
    
    
    
    
    document.getElementById('itab').appendChild(tab);
        
           },
            error: function(jqXHR, textStatus, errorThrown) { 
            console.log(errorThrown);
    }
           
        })
         //************************************
      
    
    
    
    
    })
      
        
    })
    
    
    </script>
    </body>
</html>
