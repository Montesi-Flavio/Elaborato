function random_function()
{
    var a = document.getElementById("input").value;

    if(a === "Abruzzo")
    {
        var arr=['Pescara', 'L Aquila', 'Teramo', 'Chieti' ];
    }
    if(a === "Basilicata")
    {
        var arr=['Potenza', 'Matera' ];
    }
    if(a === "Calabria")
    {
        var arr=['Reggio Calabria', 'Cosenza', 'Catanzaro', 'Vibo Valentia', 'Crotone' ];
    }

    if(a === "Campania")
    {
        var arr=['Caserta', 'Salerno', 'Benevento', 'Avellino', 'Napoli'];
    }

    if(a === "Emilia-Romagna")
    {
        var arr=['Piacenza', 'Parma', 'Ferrara', 'Forli-Cesena', 'Ravenna', 'Modena', 'Reggio Emilia', 'Rimini', 'Bologna'];
    }

    if(a === "Friuli-Venezia Giulia")
    {
        var arr=['Gorizia', 'Udine', 'Trieste', 'Pordenone'];
    }

    if(a==="Lazio")
    {
        var arr=[ 'Viterbo', 'Latina', 'Roma', 'Rieti', 'Frosinone' ];

    }

    if(a==="Liguria")
    {
        var arr=[ 'La Spezia', 'Imperia', 'Genova', 'Savona'];

    }

    if(a==="Lombardia")
    {
        var arr=[ 'Monza e della Brianza', 'Lodi', 'Como', 'Lecco', 'Cremona', 'Bergamo', 'Varese', 'Mantova', 'Pavia', 'Sondrio', 'Milano', 'Brescia'];

    }

    if(a==="Marche")
    {
        var arr=[ 'Macerata', 'Ancona', 'Fermo', 'Pesaro e Urbino', 'Ascoli Piceno'];

    }

    if(a==="Molise")
    {
        var arr=[ 'Isernia', 'Campobasso' ];

    }

    if(a==="Piemonte")
    {
        var arr=[ 'Torino', 'Cuneo', 'Biella', 'Novara', 'Verbano-Cusio-Ossola', 'Vercelli', 'Alessandria', 'Asti'];

    }

    if(a==="Puglia")
    {
        var arr=[ 'Foggia', 'Bari', 'Barvarta-Andria-Trani', 'Brindisi', 'Lecce', 'Taranto'];

    }

    if(a==="Sardegna")
    {
        var arr=[ 'Sassari','Cagliari','Medio Campidano','Oristano','Olbia-Tempio','Ogliastra','Nuoro','Carbonia-Iglesias'];

    }

    if(a==="Sicilia")
    {
        var arr=[ 'Siracusa', 'Trapani', 'Caltanissetta', 'Catania', 'Messina', 'Palermo', 'Enna', 'Agrigento', 'Ragusa'];

    }

    if(a==="Toscana")
    {
        var arr=[ 'Lucca', 'Arezzo', 'Massa-Carrara', 'Grosseto', 'Livorno', 'Firenze', 'Pisa', 'Siena', 'Prato', 'Pistoia'];

    }

    if(a==="Trentino-Alto Adige")
    {
        var arr=[ 'Trento', 'Bolzano' ];

    }

    if(a==="Umbria")
    {
        var arr=['Perugia', 'Terni' ];

    }

    if(a === "Valle d Aosta")
    {
        var arr=[ 'Aosta' ];
    }

    if (a === "Veneto")
    {
        var arr = ['Padova', 'Belluno', 'Rovigo', 'Verona', 'Treviso', 'Vicenza', 'Venezia'];
    }

    var string = "";

    for(var i = 0; i < arr.length; i++)
    {
        string=string+"<option name='city_start' value=" + arr[i] +">" + arr[i] + "</option>";
    }
    document.getElementById("output").innerHTML = string;

}

function random_function2()
{
    var a = document.getElementById("input1").value;

    if(a === "Abruzzo")
    {
        var arr=['Pescara', 'L-Aquila', 'Teramo', 'Chieti' ];
    }
    if(a === "Basilicata")
    {
        var arr=['Potenza', 'Matera' ];
    }
    if(a === "Calabria")
    {
        var arr=['Reggio Calabria', 'Cosenza', 'Catanzaro', 'Vibo-Valentia', 'Crotone' ];
    }

    if(a === "Campania")
    {
        var arr=['Caserta', 'Salerno', 'Benevento', 'Avellino', 'Napoli'];
    }

    if(a === "Emilia-Romagna")
    {
        var arr=['Piacenza', 'Parma', 'Ferrara', 'Forli-Cesena', 'Ravenna', 'Modena', 'Reggio-Emilia', 'Rimini', 'Bologna'];
    }

    if(a === "Friuli-Venezia Giulia")
    {
        var arr=['Gorizia', 'Udine', 'Trieste', 'Pordenone'];
    }

    if(a==="Lazio")
    {
        var arr=[ 'Viterbo', 'Latina', 'Roma', 'Rieti', 'Frosinone' ];

    }

    if(a==="Liguria")
    {
        var arr=[ 'La-Spezia', 'Imperia', 'Genova', 'Savona'];

    }

    if(a==="Lombardia")
    {
        var arr=[ 'Monza', 'Lodi', 'Como', 'Lecco', 'Cremona', 'Bergamo', 'Varese', 'Mantova', 'Pavia', 'Sondrio', 'Milano', 'Brescia'];

    }

    if(a==="Marche")
    {
        var arr=[ 'Macerata', 'Ancona', 'Fermo', 'Pesaro-e-Urbino', 'Ascoli-Piceno'];

    }

    if(a==="Molise")
    {
        var arr=[ 'Isernia', 'Campobasso' ];

    }

    if(a==="Piemonte")
    {
        var arr=[ 'Torino', 'Cuneo', 'Biella', 'Novara', 'Verbano-Cusio-Ossola', 'Vercelli', 'Alessandria', 'Asti'];

    }

    if(a==="Puglia")
    {
        var arr=[ 'Foggia', 'Bari', 'Barvarta-Andria-Trani', 'Brindisi', 'Lecce', 'Taranto'];

    }

    if(a==="Sardegna")
    {
        var arr=[ 'Sassari','Cagliari','Medio-Campidano','Oristano','Olbia-Tempio','Ogliastra','Nuoro','Carbonia-Iglesias'];

    }

    if(a==="Sicilia")
    {
        var arr=[ 'Siracusa', 'Trapani', 'Caltanissetta', 'Catania', 'Messina', 'Palermo', 'Enna', 'Agrigento', 'Ragusa'];

    }

    if(a==="Toscana")
    {
        var arr=[ 'Lucca', 'Arezzo', 'Massa-Carrara', 'Grosseto', 'Livorno', 'Firenze', 'Pisa', 'Siena', 'Prato', 'Pistoia'];

    }

    if(a==="Trentino-Alto Adige")
    {
        var arr=[ 'Trento', 'Bolzano' ];

    }

    if(a==="Umbria")
    {
        var arr=['Perugia', 'Terni' ];

    }

    if(a === "Valle d Aosta")
    {
        var arr=[ 'Aosta' ];
    }

    if (a === "Veneto")
    {
        var arr = ['Padova', 'Belluno', 'Rovigo', 'Verona', 'Treviso', 'Vicenza', 'Venezia'];
    }

    var string = "";

    for(var i = 0; i < arr.length; i++)
    {
        string=string+"<option name='city_end' value=" + arr[i] +">" + arr[i] + "</option>";
    }
    document.getElementById("output1").innerHTML = string;

}