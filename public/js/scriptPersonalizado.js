function initMap() {    
    if(document.getElementById('tela')){
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-12.89, -50.56),
            zoom: 3,
            mapTypeId: 'terrain'
        });
        
        if(document.getElementById('tela').value == 'talhao'){
            if(document.getElementById('talhao_kml').value != ''){
                var src = APP_URL + '/upload/' + document.getElementById('talhao_kml').value;
                
                console.log(src);
                loadKmlLayer(src, map);
            }
        }else if(document.getElementById('tela').value == 'parcela'){
            if(document.getElementById('parcela_kml').value != ''){
                var src = APP_URL + '/upload/' + document.getElementById('parcela_kml').value;
                var latitude = document.getElementById('latitude').value;
                var longitude = document.getElementById('longitude').value;
                
                console.log(src);
                loadKmlLayer(src, map, latitude, longitude);   
            }
        }
    }
}

function loadKmlLayer(src, map, latitude = '', longitude = '') {
    var kmlLayer = new google.maps.KmlLayer(src, {
        suppressInfoWindows: true,
        preserveViewport: false,
        map: map
    });
    google.maps.event.addListener(kmlLayer, 'click', function(event) {
        var content = event.featureData.infoWindowHtml;
        var testimonial = document.getElementById('capture');
        testimonial.innerHTML = content;
    });
    if(latitude != '' && longitude != ''){
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
            map: map,
            title: document.getElementById('descricao').value
        });
    }
}


$("#removerKml").click(function(event){
    var ok = confirm("Deseja remover  o Kml?");
    if(!$("#removerKml").hasClass('disabled')){
        if(!ok){
            event.preventDefault();
        }
    }else{
        return false;
    }
});

var comp = 0;
var larg = 0;

$("#formato").change(function(){
    if($("#formato").val() == 'Retangular'){
        $("#comprimento").attr('placeholder', 'Comprimento');
        $("#largura").removeAttr('disabled');
        $("#lblComprimento").html('Comprimento');
    }else if($("#formato").val() == 'Circular'){
        $("#comprimento").attr('placeholder', 'Raio');
        $("#largura").attr('disabled', 'disabled');
        $("#lblComprimento").html('Raio');
    }
});

$("#comprimento").change(function(){
    comp = $("#comprimento").val();
    defineArea(comp, larg);
});
$("#largura").change(function(){
    larg = $("#largura").val();
    defineArea(comp, larg);
});

function defineArea(comp, larg){
    if($("#formato").val() == 'Retangular'){
        if(comp != 0 && larg != 0){
            $("#area").val(comp * larg);
        }
    }else if($("#formato").val() == 'Circular'){
        if(comp != 0){
            $("#area").val(Math.round(Math.pow(comp, 2) * Math.PI));
        }
    }
}

$("#estratoNovo").click(function(){
    $("#cod").removeAttr('disabled');
    $("#descricao").removeAttr('disabled');
    $("#area").removeAttr('disabled');
    $("#estratoSalvar").removeAttr('disabled');
    $("#estratoCancelar").removeAttr('disabled');
    $("#estratoNovo").attr('disabled', 'disabled');
});
$("#estratoCancelar").click(function(){
    var rota = APP_URL + '/estrato';
    window.location.replace(rota);
});

$("#talhaoNovo").click(function(){
    $("#cod").removeAttr('disabled');
    $("#descricao").removeAttr('disabled');
    $("#area").removeAttr('disabled');
    $("#data_plantio").removeAttr('disabled');
    $("#data_plantio_calendario").removeAttr('disabled');
    $("#arquivoKml").removeAttr('disabled');
    $("#talhaoSalvar").removeAttr('disabled');
    $("#talhaoCancelar").removeAttr('disabled');
    $("#talhaoNovo").attr('disabled', 'disabled');
});

$("#talhaoCancelar").click(function(){
    var rota = APP_URL + '/talhao/' + $("#estrato_id").val();
    window.location.replace(rota);
});

$("#novoEspecie").click(function(){
    $("#nome").removeAttr('disabled');
    $("#nome_cientifico").removeAttr('disabled');
    $("#salvarEspecie").removeAttr('disabled');
    $("#cancelarEspecie").removeAttr('disabled');

    $("#novoEspecie").attr('disabled', 'disabled');
});
$("#cancelarEspecie").click(function(){
    var rota = APP_URL + '/especie';
    window.location.replace(rota);
});

$("#novoParcela").click(function(){
    $("#descricao").removeAttr('disabled');
    $("#declividade").removeAttr('disabled');
    $("#formato").removeAttr('disabled');
    $("#comprimento").removeAttr('disabled');
    $("#largura").removeAttr('disabled');
    $("#latitude").removeAttr('disabled');
    $("#longitude").removeAttr('disabled');
    $("#area").removeAttr('disabled');
    $("#especie_id").removeAttr('disabled');
    $("#salvarParcela").removeAttr('disabled');
    $("#cancelarParcela").removeAttr('disabled');
    $("#novoParcela").attr('disabled', 'disabled');
});

$("#cancelarParcela").click(function(){
    var rota = APP_URL + '/parcela/' + $("#talhao_id").val();
    window.location.replace(rota);
});