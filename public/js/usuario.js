$(function(){
   $("button[id='plus']").click(function(){
        var tabPanel = $(this).parents().get(1);
        var divNovoRegistro = $(tabPanel).find("div#novo-registro");
        
        var divRow = $("<div />",{ class: 'row' });

        //INPUT CIDADE
        var divGroup = $("<div />",{ class: 'form-group col-md-4' }).appendTo(divRow);
        
        $("<label>").text("Cidade").appendTo(divGroup);
        
        $('<input>').attr({
            type: 'text',
            name: 'cidade',
            id : 'cidade_',
            class: 'form-control'
        }).appendTo(divGroup);


        //INPUT RU
        var divGroup = $("<div />",{ class: 'form-group col-md-5' }).appendTo(divRow);
        
        $("<label>").text("Rua").appendTo(divGroup);
        
        $('<input>').attr({
            type: 'text',
            name: 'rua',
            id : 'rua_',
            class: 'form-control'
        }).appendTo(divGroup);

         //INPUT UF
         var divGroup = $("<div />",{ class: 'form-group col-md-3' }).appendTo(divRow);
        
         $("<label>").text("Rua").appendTo(divGroup);
         
         $('<input>').attr({
             type: 'text',
             name: 'uf',
             id : 'uf_',
             class: 'form-control'
         }).appendTo(divGroup);

        $(divNovoRegistro).append(divRow);
   });
});